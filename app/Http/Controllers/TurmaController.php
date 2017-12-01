<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Turma;

class TurmaController extends Controller
{
    public function gerenciarTurma()
    {
        $materias = Materia::all()->where('ativo', 0);
        $turmas = Turma::all();
        return view('turma.gerenciador_turma')->withMaterias($materias)->withTurmas($turmas);
    }

    public function criarTurma()
    {
        $materias = Materia::all()->where('ativo', 0);
       
        return view('turma.criar_turma')->withMaterias($materias);
    }

    public function salvarTurma($data)
    {
        $turma = new Turma();
        $turma->nome = $data['nome'];
        $turma->descricao = $data['descricao'];
        $turma->materia_id = $data['materia_id'];
        $turma.save();
        return 'Turma Salva com êxito!';
    }
}