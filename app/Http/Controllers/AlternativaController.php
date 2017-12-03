<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlternativaController extends Controller
{
    public function criarAlternativa($id)
    {
        return view('alternativa.criar_alternativa')->withId($id);
    }

    public function alterarAlternativa()
    {
        return view('alternativa.alterar_alternativa');
    }

    public function salvarAlternativa(Request $data)
    {
        $this->validade($data, [
            'descricao' => 'required'
        ]);
    }

}
