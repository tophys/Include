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
        $questoes = Questao::all()->where('ativo',0);
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
        $questao->src = '';
        $questao->save();
        return redirect()->route('nova.alternativa', ['id' => $questao->id]);
    }

    public function selecionarQuestaoProva($id)
    {
        $prova = Prova::find($id);
        $materias = Materia::all();
        $questoes = Questao::whereDoesntHave('provas', function($q) use ($id){
            $q->where('prova_id', $id);
        })->get();
        return view('questao.selecionar_questao')->withMaterias($materias)->withProva($prova)->withQuestoes($questoes);
    }

    public function detalharQuestao($id)
    {
        $questao = Questao::find($id);
        return view('questao.detalhar_questao')->withQuestao($questao);
    }

    public function salvarQuestaoSelecionada(Request $data)
    {
        $prova = Prova::find($data->prova_id);
        $prova->questoes()->attach($data->questao_id);
        return redirect()->route('selecionar.questao.professor', ['id' => $data->prova_id]);
    }

    public function deselecionarQuestao($idProva, $idQuestao)
    {
        $prova = Prova::find($idProva);
        $prova->questoes()->detach($idQuestao);
        return redirect()->route('alterar.prova', ['id' => $idProva]);
    }

    public function alterarQuestao($id)
    {
        $questao = Questao::find($id);
        $alternativas = $questao->alternativas()->get();
        $materias = Materia::all();
        return view('questao.adicionar_questao')->withQuestao($questao)->withAlternativas($alternativas)->withMaterias($materias);
    }

    public function excluirQuestao($id)
    {
        Questao::where('id',$id)->update(array('ativo' => 1));
        return redirect('/gerenciar/questao');
    }
}
