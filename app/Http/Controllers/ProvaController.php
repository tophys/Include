<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Prova;
use Illuminate\Support\Facades\Auth;
use App\Questao;

class ProvaController extends Controller
{
    public function gerenciarProva()
    {
        $materias = Materia::all()->where('ativo', 0);
        $provas = Prova::all();
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
        $prova->save();
        return 'Prova salva com êxito!';
    }

    public function alterarProva($id)
    {
        $prova = Prova::find($id);
        $questoes = $prova->questoes()->get();
        $materias = Materia::all();
        return view('prova.alterar_prova')->withProva($prova)->withQuestoes($questoes)->withMaterias($materias);
    }

    public function salvarAlteracaoProva(Request $data)
    {

    }

}
