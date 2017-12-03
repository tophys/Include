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

    public function adicionarAlternativaQuestao($id)
    {
        $materias = Materia::all()->where('ativo', 0);
        $questao = Questao::find($id);
        $alternativas = $questao->alternativas()->get();
        return view('questao.criar_questao')->withMaterias($materias)->withAlternativas($alternativas)->withQuestao($questao);
    }

    public function salvarQuestao(Request $data)
    {
        $this->validate($data, array(
            'descricao' => 'required',
            'materia_id' => 'required|integer'
        ));
        $questao = new Questao();
        $questao->descricao = $data->descricao;
        $questao->user_id = Auth::user()->id;
        $questao->materia_id = $data->materia_id;
        $questao->ativo = 0;
        $questao->traduzida = 1;
        $questao->save();
        return redirect()->route('nova.alternativa', ['id' => $questao->id]);
    }

    public function selecionarQuestaoProva($id)
    {
        $prova = Prova::find($id);
        $materias = Materia::take(10)->get();
        $questoes = Questao::take(10)->get();

        return view('questao.selecionar_questao')->withMaterias($materias)->withProva($prova)->withQuestoes($questoes);
    }

    public function alterarQuestao($id)
    {
        $questao = Questao::find($id);
        $alternativas = $questao->alternativas()->get();
        $materias = Materia::all();
        return view('questao.adicionar_questao')->withQuestao($questao)->withAlternativas($alternativas)->withMaterias($materias);
    }
}
