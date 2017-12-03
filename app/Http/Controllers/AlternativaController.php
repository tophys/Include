<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternativa;

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
        $alternativa = new Alternativa();
        if ($data->has('correta'))
            $alternativa->correta = 0;
        else
        $alternativa->descricao = $data->descricao;
        $alternativa->correta = 1;
        $alternativa->questao_id = $data->questao_id;
        $alternativa->traduzida = 1;
        $alternativa->save();
        return redirect()->route('alterar.questao', ['id' => $questao_id]);
        
    }

}
