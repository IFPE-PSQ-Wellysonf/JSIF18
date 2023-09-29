<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Inscricao;
use App\Inscricaofinal;
use App\Modalidades;
use App\Campus;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','can:admin']);
    }

    public function home(){
        $pre = TRUE;
        $inscricoes = DB::table('inscricoes')
                            ->select('modalidade_id', DB::raw('count(user_id) as qtd'))
                            ->groupBy('modalidade_id')
                            ->get();
        $modalidades = Modalidades::orderBy('modalidade')->get();
        $campi = Campus::all();
        $rmr = $this->rmr;
        $insc_group = Inscricao::with('user')
                    ->groupBy('user_id')
                    ->get();
        return view('admin.home', compact('inscricoes','modalidades','insc_group','rmr','campi','pre'));
    }
    public function detalhe_esporte($id)
    {
        $pre = TRUE;
        $rmr = $this->rmr;
        $modalidade = Modalidades::find($id);
        $inscricoes = Inscricao::where('modalidade_id',$id)
                                ->with('user.campus')
                                ->get();
        return view('admin.esporte', compact('inscricoes','modalidade','rmr','pre'));
    }
    public function detalhe_campus($id)
    {
        $pre = TRUE;
        $rmr = $this->rmr;
        $campus = Campus::findOrFail($id);
        $inscricoes = Inscricao::whereHas('user',function ($query) use ($campus){ $query->where('campus_id', $campus->id); })
                                ->with('user.campus')
                                ->groupBy('user_id')
                                ->get();
        return view('admin.campus', compact('inscricoes','campus','rmr','pre'));
    }
    public function home_inscricao(){
        $pre = FALSE;
        $inscricoes = DB::table('inscricoesfinais')
                            ->select('modalidade_id', DB::raw('count(user_id) as qtd'))
                            ->groupBy('modalidade_id')
                            ->get();
        $modalidades = Modalidades::where('confirmado',TRUE)->orderBy('modalidade')->get();
        $campi = Campus::all();
        $rmr = $this->rmr;
        $insc_group = Inscricaofinal::with('user')
                    ->groupBy('user_id')
                    ->get();
        return view('admin.home', compact('inscricoes','modalidades','insc_group','rmr','campi','pre'));
    }
    public function detalhe_esporte_inscricao($id)
    {
        $pre = FALSE;
        $rmr = $this->rmr;
        $modalidade = Modalidades::find($id);
        $inscricoes = Inscricaofinal::where('modalidade_id',$id)
                                ->with('user.campus')
                                ->get();
        return view('admin.esporte', compact('inscricoes','modalidade','rmr','pre'));
    }
    public function detalhe_campus_inscricao($id)
    {
        $pre = FALSE;
        $rmr = $this->rmr;
        $campus = Campus::findOrFail($id);
        $inscricoes = Inscricaofinal::whereHas('user',function ($query) use ($campus){ $query->where('campus_id', $campus->id); })
                                ->with('user.campus')
                                ->groupBy('user_id')
                                ->get();
        return view('admin.campus', compact('inscricoes','campus','rmr','pre'));
    }

    public function enviar_emails()
    {
        $insc_group = Inscricao::with('user')
                    ->groupBy('user_id')
                    ->get();
        $msg =  array();
        $msgError = array();
        $cont = 1;
        $contError = 1;
        foreach ($insc_group as $insc){
            if(!is_null($insc->user->email)){
                try{
                    \Mail::to($insc->user)->queue(new \App\Mail\ChamadaInscricao($insc->user));
                    $msg[$cont]= "$cont - Email para:" . $insc->user->name . " (" . $insc->user->email . ")";
                    $cont++;
                }catch (Exception $e){
                    $msgError[$cont]= "Erro $cont - Email para:" . $insc->user->name . " (" . $insc->user->email . ") ". $e->getMessage();
                    $contError++;
                }catch (\Swift_RfcComplianceException $e){
                    $msgError[$cont]= "Erro $cont - Email para:" . $insc->user->name . " (" . $insc->user->email . ") ". $e->getMessage();
                    $contError++;
                }
                
            }
        }
        $wfns = User::find(2222);
        \Mail::to($wfns)->queue(new \App\Mail\ChamadaInscricao($wfns));
        dd($msg, $msgError); 
    }

    public function relatorios_home()
    {
        return view('admin.relatorios');
    }

    public function relatorios_campus()
    {
        $campi = Campus::all();
        $inscritos = Inscricaofinal::with('user')
                                ->groupBy('user_id')
                                ->get();
        $view = \View::make('admin.relat.campus', compact('campi','inscritos'));
        $contents = $view->render();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($contents);
        return $mpdf->Output();
    }
    public function relatorios_logistica()
    {
        $campi = Campus::all();
        $inscritos = Inscricaofinal::with('user')
                                ->groupBy('user_id')
                                ->get();
        $inscricoes = Inscricaofinal::with('modalidade')->get();
        $view = \View::make('admin.relat.logistica', compact('campi','inscritos','inscricoes'));
        $contents = $view->render();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($contents);
        return $mpdf->Output();
    }
    public function relatorios_por_dia_sexo()
    {
        
        $campi = Campus::all();
        $inscritos = Inscricaofinal::with('user')
                                ->get();
        $datas = $this->modalidadesData();
        /* return view('admin.relat.hospedagem', compact('campi','inscritos','datas')); */
        $view = \View::make('admin.relat.hospedagem', compact('campi','inscritos','datas'));
        $contents = $view->render();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($contents);
        return $mpdf->Output();
    }
    public function relatorios_alimentacao()
    {
        
        $campi = Campus::all();
        $inscritos = Inscricaofinal::with('user')
                                ->get();
        $datas = $this->modalidadesData();
        /* return view('admin.relat.hospedagem', compact('campi','inscritos','datas')); */
        $view = \View::make('admin.relat.alimentacao', compact('campi','inscritos','datas'));
        $contents = $view->render();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($contents);
        return $mpdf->Output();
    }
    public function relatorios_hospedagem()
    {
        
        $campi = Campus::all();
        $inscritos = Inscricaofinal::with('user')
                                ->get();
        $datas = $this->modalidadesData();
        /* return view('admin.relat.hospedagem', compact('campi','inscritos','datas')); */
        $view = \View::make('admin.relat.hospedagem', compact('campi','inscritos','datas'));
        $contents = $view->render();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($contents);
        return $mpdf->Output();
    }
    public function modalidadesData()
    {
        $dia = [];
		$dia[7]  = [1,14,10,5,6,7,8];
		$dia[8]  = [11,16,4];
		$dia[9]  = [11,17,13,18];
		$dia[10] = [3,9,17,2,15,12];
       /* $dia[2]= [2,12,14];
		$dia[3]= [2,4,11,13,9];
        $dia[4] = [1,6,10,25];
        $dia[5] = [5,6,8];
        $dia[8] = [9,11,13];
        $dia[9] = [2.4,7,26];
        $dia[10] = [2,10,25];*/
        return $dia;
    }

    public $rmr = [ 'RECIFE',
            'JABOATÃO DOS GUARARAPES',
            'OLINDA',
            'PAULISTA',
            'CABO DE SANTO AGOSTINHO',
            'CAMARAGIBE',
            'SÃO LOURENÇO DA MATA',
            'IGARASSU',
            'ABREU E LIMA',
            'IPOJUCA',
            'GOIANA',
            'ESCADA',
            'MORENO',
            'SIRINHAÉM',
            'ITAPISSUMA',
            'ILHA DE ITAMARACÁ',
            'ARAÇOIABA',
        ];
}