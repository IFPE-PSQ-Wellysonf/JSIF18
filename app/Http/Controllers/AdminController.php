<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Inscricao;
use App\Modalidades;
use App\Campus;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','can:admin']);
    }

    public function home(){

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
        return view('admin.home', compact('inscricoes','modalidades','insc_group','rmr','campi'));
    }
    public function detalhe_esporte($id)
    {
        $rmr = $this->rmr;
        $modalidade = Modalidades::find($id);
        $inscricoes = Inscricao::where('modalidade_id',$id)
                                ->with('user')
                                ->get();
        return view('admin.esporte', compact('inscricoes','modalidade','rmr'));
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
