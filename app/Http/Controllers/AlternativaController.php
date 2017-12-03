<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternativa;
use App\Questao;

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
        $this->validate($data, [
            'descricao' => 'required'
        ]);
        $alternativa = new Alternativa();
        if ($data->has('correta'))
            $alternativa->correta = 0;
        else
            $alternativa->correta = 1;

        $alternativa->descricao = $data->descricao;
        $alternativa->questao_id = $data->questao_id;
        $alternativa->traduzida = 1;
        $alternativa->save();
        return redirect()->route('alterar.questao', ['id' => $data->questao_id]);
        
    }

    public function alterarAlternativaCorreta($id)
    {
        $alternativas = Questao::find($id)->alternativas()->get();
        return view('questao.alterar_correta')->withAlternativas($alternativas)->withId($id);
    }

    public function salvarAlternativaCorreta(Request $data)
    {
        $alternativaNova = Alternativa::find($data->alternativas);
        $alternativaAntiga = Questao::find($data->questao_id)->where('correta', 0);
        $alternativaNova->correta = 0;
        $alternativaAntiga->correta = 1;
        $alternativaNova->save();
        $alternativaAntiga->save();
        return redirect()->route('alterar.questao', ['id' => $data->questao_id]);

    }

}
