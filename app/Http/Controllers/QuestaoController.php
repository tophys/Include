<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestaoController extends Controller
{
    public function gerenciarQuestao()
    {
        $materias = Materia::all()->where('ativo', 0);
        return view('home.gerenciador_questao')->withMaterias($materias);
    }
}
