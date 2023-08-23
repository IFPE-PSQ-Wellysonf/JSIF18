<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Modalidades;
use App\Inscricao;
use App\Inscricaofinal;

class ServidorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function endereco_index(){
        return view('endereco');
    }
    public function atualizar_endereco(Request $request){
        /* Valida se está no periodo de inscrições */
        $data_inicial_insc = Carbon::createFromFormat('Y-m-d H:i:s', env('DT_INICIO_PREINSC', '2018-08-20 00:00:00'));
        $data_final_insc = Carbon::createFromFormat('Y-m-d H:i:s', env('DT_TERMINO_PREINSC', '2018-08-24 23:59:59'));
        $agora = Carbon::now();
        if ($agora->lt($data_inicial_insc)){
            $msg_erro = 'As inscrições ainda não estão abertas.';
            return redirect()->route('form_endereco')->withErrors([$msg_erro]);
        }
        if ($agora->gt($data_final_insc)){
            $msg_erro = 'As inscrições estão encerradas.';
            return redirect()->route('form_endereco')->withErrors([$msg_erro]);
        }
        \Auth::user()->update($request->all());
        \Auth::user()->endereco_confirmado = TRUE;
        \Auth::user()->save();
        return redirect()->route('form_endereco')->with('sucesso','Seus enderço foi atualizado e confirmado.');
    }
    public function inscricao1_index(){
        $rmr = [ 'RECIFE',
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
        $modalidades = Modalidades::orderBy('modalidade')->get();
        $inscricoes = Inscricao::where('user_id', \Auth::user()->id)->get();
        return view('inscricao1', compact('modalidades','inscricoes','rmr'));
    }
    public function inscricao1_store(Request $request){
        /* Valida se está no periodo de inscrições */
        $data_inicial_insc = Carbon::createFromFormat('Y-m-d H:i:s', env('DT_INICIO_PREINSC', '2018-08-20 00:00:00'));
        $data_final_insc = Carbon::createFromFormat('Y-m-d H:i:s', env('DT_TERMINO_PREINSC', '2018-08-24 23:59:59'));
        $agora = Carbon::now();
        if ($agora->lt($data_inicial_insc)){
            $msg_erro = 'As inscrições ainda não estão abertas.';
            return redirect()->route('preinscricao')->withErrors([$msg_erro]);
        }
        if ($agora->gt($data_final_insc)){
            $msg_erro = 'As inscrições estão encerradas.';
            return redirect()->route('preinscricao')->withErrors([$msg_erro]);
        }
        DB::beginTransaction();
        try{
            Inscricao::where('user_id', \Auth::user()->id)->delete();
            if(count($request->modalidade)>0){
                foreach($request->modalidade as $modalidade){
                    Inscricao::create([
                        'user_id' => \Auth::user()->id,
                        'modalidade_id' => $modalidade
                    ]);
                }
            } 
            if(isset($request->diarias) && $request->diarias == 'sim'){
                \Auth::user()->solicitou_diarias = 1;
                \Auth::user()->save();
            }else{
                \Auth::user()->solicitou_diarias = 0;
                \Auth::user()->save();
            }
            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('preinscricao')->withErrors(['Falha na inserção das modalidades. Favor entrar em contato com a comissão.']);
        }
        return redirect()->route('home')->with('sucesso','As modalidades foram atualizadas e confirmadas.');
    }
    public function perfil_index(){
        return view('perfil');
    }
    public function atualizar_perfil(Request $request){
        /* Valida se está no periodo de inscrições */
        $data_inicial_insc = Carbon::createFromFormat('Y-m-d H:i:s', env('DT_INICIO_PREINSC', '2018-08-20 00:00:00'));
        $data_final_insc = Carbon::createFromFormat('Y-m-d H:i:s', env('DT_TERMINO_PREINSC', '2018-08-24 23:59:59'));
        $agora = Carbon::now();
        if ($agora->lt($data_inicial_insc)){
            $msg_erro = 'As alterações ainda não estão abertas.';
            return redirect()->route('form_endereco')->withErrors([$msg_erro]);
        }
        if ($agora->gt($data_final_insc)){
            $msg_erro = 'As alterações estão encerradas.';
            return redirect()->route('form_endereco')->withErrors([$msg_erro]);
        }
        $email_backup = \Auth::user()->email;
        \Auth::user()->update($request->all());
        \Auth::user()->endereco_confirmado = TRUE;
        \Auth::user()->save();
        /*if(\Auth::user()->email != $email_backup){
            if(!is_null(\Auth::user()->email)){
                \Mail::to(\Auth::user())->queue(new \App\Mail\EmailUpdated(\Auth::user()));
            }
        }*/
        return redirect()->route('home')->with('sucesso','Seus enderço foi atualizado e confirmado.');
    }
    public function inscricao_final()
    {
        /* Valida se o servidor fez a pré-inscricao */
        if (\Gate::denies('preinscricao')) {
            return redirect()->route('home')->withErrors(['Apenas atletas que realizaram a pré-inscrição estão aptos a confirmar a inscrição nesta etapa.']);
        }
        $modalidades = Modalidades::where('confirmado',TRUE)->orderBy('modalidade')->get();
        $inscricoes = Inscricao::where('user_id', \Auth::user()->id)->get();
        $inscricoesfinais = Inscricaofinal::where('user_id', \Auth::user()->id)->get();
        return view('inscricaofinal', compact('modalidades','inscricoes','inscricoesfinais','rmr'));
    }
    public function inscricao_final_store(Request $request)
    {
        /* Valida se o servidor fez a pré-inscricao */
        if (\Gate::denies('preinscricao')) {
            return redirect()->route('home')->withErrors(['Apenas atletas que realizaram a pré-inscrição estão aptos a confirmar a inscrição nesta etapa.']);
        }
        /* Valida se está no periodo de inscrições */
        $data_inicial_insc = Carbon::createFromFormat('Y-m-d H:i:s', env('DT_INICIO_INSC', '2018-08-20 00:00:00'));
        $data_final_insc = Carbon::createFromFormat('Y-m-d H:i:s', env('DT_TERMINO_INSC', '2018-08-24 23:59:59'));
        $agora = Carbon::now();
        if ($agora->lt($data_inicial_insc)){
            $msg_erro = 'As inscrições ainda não estão abertas.';
            return redirect()->route('inscricao1')->withErrors([$msg_erro]);
        }
        if ($agora->gt($data_final_insc)){
            $msg_erro = 'As inscrições estão encerradas.';
            return redirect()->route('inscricao1')->withErrors([$msg_erro]);
        }
        DB::beginTransaction();
        try{
            Inscricaofinal::where('user_id', \Auth::user()->id)->delete();
            if(count($request->modalidade)>0){
                foreach($request->modalidade as $modalidade){
                    Inscricaofinal::create([
                        'user_id' => \Auth::user()->id,
                        'modalidade_id' => $modalidade
                    ]);
                }
            }
            /* if(isset($request->diarias) && $request->diarias == 'sim'){
                \Auth::user()->solicitou_diarias = 1;
                \Auth::user()->save();
            }else{
                \Auth::user()->solicitou_diarias = 0;
                \Auth::user()->save();
            } */
            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('inscricao1')->withErrors(['Falha na inserção das modalidades. Favor entrar em contato com a comissão.']);
        }
        return redirect()->route('home')->with('sucesso','As modalidades foram atualizadas e confirmadas.');
    }

}
