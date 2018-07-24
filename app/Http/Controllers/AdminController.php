<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Inscricao;
use App\Modalidades;

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
        return view('admin.home', compact('inscricoes','modalidades'));
    }
}
