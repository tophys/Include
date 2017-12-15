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

    public function alterarAlternativa($id, $idQuestao)
    {
        $alternativa = Alternativa::find($id);
        return view('alternativa.alterar_alternativa')->withAlternativa($alternativa)->withIdQuestao($idQuestao);
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
        $alternativa->src = '';
        $alternativa->ativo = 0;
        $alternativa->save();
        return redirect()->route('alterar.questao', ['id' => $data->questao_id]);
        
    }

    public function salvarAlteracaoAlternativa(Request $data)
    {
        Alternativa::where('id', $data->alternativa_id)->update([
            'descricao' => $data->descricao
        ]);
        return redirect()->route('alterar.questao', ['id' => $data->questao_id]);
    }

    public function alterarAlternativaCorreta($id)
    {
        $alternativas = Questao::find($id)->alternativas()->get();
        return view('questao.alterar_correta')->withAlternativas($alternativas)->withId($id);
    }

    public function salvarAlternativaCorreta(Request $data)
    {
        Questao::find($data->questao_id)->alternativas()->update(array('correta' => 1));
        Alternativa::where('id', $data->alternativas)->update(array('correta' => 0));
        return redirect()->route('alterar.questao', ['id' => $data->questao_id]);
    }

    public function excluirAlternativa($idQuestao, $idAlternativa)
    {
        Alternativa::where('id', $idAlternativa)->update(array('ativo' => 1));
        return redirect()->route('alterar.questao', ['id' => $idQuestao]);
    }

}
