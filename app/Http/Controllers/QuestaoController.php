<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Questao;
use App\Prova;
use Illuminate\Support\Facades\Auth;

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

    public function salvarQuestao(Request $data)
    {
        $this->validade($data, array(
            'descricao' => 'required',
            'materia_id' => 'required|integer'
        ));
        $questao = new Questao();
        $questao->descricao = $data->descricao;
        $questao->user_id = Auth::user()->id;
        $questao->materia_id = $data->materia_id;
        $questao->ativo = 0;
        $questao->salve();
        return 'Questão salva com êxito';
    }

    public function selecionarQuestaoProva($id)
    {
        $prova = Prova::find($id);
        $materias = Materia::take(10)->get();
        $questoes = Questao::take(10)->get();
        return view('questao.selecionar_questao')->withMaterias($materias)->withProva($prova)->withQuestoes($questoes);
    }
}
