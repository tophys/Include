<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function gerenciarTurma()
    {
        return view('home.gerenciador_turma');
    }
}
