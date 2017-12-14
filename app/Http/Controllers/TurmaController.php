<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Turma;
use Illuminate\Support\Facades\Auth;
use App\Resposta;
use App\Agendamento;
use App\Prova;
use App\Questao;

class TurmaController extends Controller
{
    public function gerenciarTurma()
    {
        $materias = Materia::all()->where('ativo', 0);
        $turmas = Turma::all()->where('ativo', 0);
        return view('turma.gerenciador_turma')->withMaterias($materias)->withTurmas($turmas);
    }

    public function criarTurma()
    {
        $materias = Materia::all()->where('ativo', 0);
       
        return view('turma.criar_turma')->withMaterias($materias);
    }

    public function salvarTurma(Request $data)
    {
        $this->validate($data, array(
            'nome' => 'required|max:255',
            'descricao' => 'required|max:255',
            'materia_id' => 'required|integer|max:255'  
        ));
        $turma = new Turma();
        $turma->nome = $data->nome;
        $turma->descricao = $data->descricao;
        $turma->materia_id = $data->materia_id;
        $turma->user_id = Auth::user()->id;
        $turma->ativo = 0;
        $turma->save();
        return redirect('/gerenciar/turma');
    }

    public function excluirTurma($id)
    {
        Turma::where('id', $id)->update(array('ativo' => 1));
        return redirect('/gerenciar/turma');
    }

    public function desempenhoTurma($id)
    {
        $respostas = Resposta::where('agendamento_id', $id);
        $agendamento = Agendamento::find($id);
        $users = collect([]);
        $corretas = collect([]);
        $prova = Prova::find($agendamento->prova_id);
        $turma = Turma::find($agendamento->turma_id);
        $total = count($prova->questoes());
        foreach ($respostas as $resposta)
        {
            $users->push(User::find($resposta->user_id));
            $corretas->push(count(Resposta::where('agendamento_id', $id)->where('user_id', $resposta->user_id)->where('correta', 0)->get()));
        } 
        return view('turma.desempenho_turma')->withUsers($users)->withCorretas($corretas)
        ->withTotal($total)->withProva($prova)->withTurma($turma);
    }

}
