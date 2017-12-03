<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Turma;
use Illuminate\Support\Facades\Auth;

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
        return 'Turma Salva com êxito!';
    }

    public function excluirTurma($id)
    {
        return 'Aqui com o id: ' . $id;
        Turma::where('id', $id)->update(array('ativo' => 1));
        return redirect('/gerenciar/turma');
    }
}
