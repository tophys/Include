<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;

class ProvaController extends Controller
{
    public function gerenciarProva()
    {
        $materias = Materia::all()->where('ativo', 0);
        return view('home.gerenciador_prova')->withMaterias($materias);
    }
}
