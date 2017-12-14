<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Turma;
use App\Prova;
use App\Agendamento;
use Illuminate\Support\Facades\Auth;
use App\Questao;

class ProvaController extends Controller
{
    public function gerenciarProva()
    {
        $materias = Materia::all()->where('ativo', 0);
        $provas = Prova::all()->where('ativo', 0);
        return view('prova.gerenciador_prova')->withMaterias($materias)->withProvas($provas);
    }

    public function criarProva()
    {
        $materias = Materia::all()->where('ativo', 0);
        return view('prova.criar_prova')->withMaterias($materias);   
    }

    public function salvarProva(Request $data)
    {
        $this->validate($data,array(
            'nome' => 'required|max:255',
            'materia_id' => 'required|integer'
        ));
        $prova = new Prova();
        $prova->nome = $data->nome;
        $prova->user_id = Auth::user()->id;
        $prova->materia_id = $data->materia_id;
        $prova->ativo = 0;
        $prova->save();
        return redirect()->route('selecionar.questao', ['id' => $prova->id]);
    }

    public function alterarProva($id)
    {
        $prova = Prova::find($id);
        if (count(Agendamento::where('executado', 0)->where('prova_id', $id)->get()) != 0)
            return redirect()->route('detalhar.prova', ['id' => $id]);
            
        $questoes = $prova->questoes()->where('ativo', 0)->get();
        $materias = Materia::all();
        return view('prova.alterar_prova')->withProva($prova)->withQuestoes($questoes)->withMaterias($materias);
    }

    public function buscarProvaGerenciar(Request $data)
    {
        $query->DB::table('provas');
        if ($data->nome != '')
        {
            $query->where('nome','like', '%' . $data->nome . '%');
        }
        if ($data->data_criacao != '')
        {
            $dataCriacao = strtotime($data->data_criacao);
            $query->where('created_at', $dataCriacao);
        }
        if ($data->data_agendamento != '')
        {

        }
        $provas = $query->get();
            
    }

    public function excluirProva($id)
    {
        Prova::where('id', $id)->update(array('ativo' => 1));
        return redirect('/gerenciar/prova');
    }

    public function salvarAlteracaoProva(Request $data)
    {
        Prova::where('id', $data->id)->update(array(
            'nome' => $data->nome,
            'materia_id' => $data->materia_id
        ));
        return redirect()->route('alterar.prova', ['id' => $data->id]);
    }

    public function selecionarLiberacaoProva($id)
    {
        $turmas = Turma::all()->where('ativo',0)->where('user_id', Auth::user()->id);
        //$materias = Materia::all()->where('ativo', 0);
        //$provas = Prova::all()->where('ativo', 0)->where('user_id', Auth::user()->id);
        //$agendamentos = $provas->agendamentos()->all()->where('ativo',0);
        $agendamentos = Agendamento::all()->where('ativo', 0)->where('professor_id', Auth::user()->id);
        return view('prova.liberar_prova')->withTurmas($turmas)->withAgendamentos($agendamentos)->withId($id);
    }

    public function liberarAgendamentoProva(Request $data)
    {
        $agendamento = new Agendamento();
        $agendamento->turma_id = $data->turma_id;
        $agendamento->prova_id = $data->prova_id;
        $agendamento->professor_id = Auth::user()->id;
        $dataAgendada = \Carbon\Carbon::parse($data->data_liberada);
        $agendamento->data_liberada = $dataAgendada->format('Y-m-d');
        $agendamento->ativo = 0;
        $agendamento->executado = 1;
        $agendamento->save();
        return redirect('liberar.agendamento', ['id' => $data->prova_id]);
    }

    public function desativarAgendamentoProva($idProva, $idAgendamento)
    {
        Agendamento::where('id', $idAgendamento)->update(array(
            'ativo' => 1
        ));
        return redirect('liberar.prova', $idProva);
    }

    public function detalharProva($id)
    {
        $prova = Prova::find($id);
        $questoes = $prova->questoes()->where('ativo', 0)->get();
        return view('prova.detalhar_prova')->withProva($prova)->withQuestoes($questoes);
    }
    public function desempenhoProva($id)
    {
        $agendamentos = Agendamento::where('ativo', 0)->where('executado', 0)->where('turma_id', $id)->get();
        $provas = collect([]);
        foreach ($agendamentos as $agendamento)
        {
            $provas->push(Prova::find($agendamento->prova_id));
        }
        $turma = Turma::find($id);
        return view('prova.desempenho_prova')->withAgendamentos($agendamentos)
        ->withProvas($provas)->withTurma($turma);
    }

}
