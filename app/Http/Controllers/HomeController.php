<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscricao;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $inscricoes = Inscricao::where('user_id', \Auth::user()->id)->get();
        return view('home', compact('inscricoes','rmr'));
    }
}
