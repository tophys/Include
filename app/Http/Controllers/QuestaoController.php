<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestaoController extends Controller
{
    public function gerenciarQuestao()
    {
        $materias = Materia::all()->where('ativo', 0);
        $questoes = Questao::all();
        return view('questao.gerenciador_questao')->withMaterias($materias)->withQuestoes($questoes);
    }
    public function criarQuestao()
    {

        $materias = Materia::all()->where('ativo', 0);
        return view('questao.criar_questao')->withMaterias($materias);
    }
}
