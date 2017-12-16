<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agendamento;
use App\Prova;
use App\Questao;
use App\Realizada;
use App\Resposta;
use Illuminate\Support\Facades\Auth;

class ExecutarController extends Controller
{
    
    public function executarProva($idAgendamento, $questaoAtual, $questoes)
    {
        $agendamento = Agendamento::find($idAgendamento);
        $prova = Prova::find($agendamento->prova_id);
        if ($questaoAtual == 0) $questoes = collect($prova->questoes());

        /*$count = count($prova->questoes()->get());
        $validate = $questaoAtual +1;
        if ($count == $validate)*/
        if (count($questoes) == 0 && $questaoAtual != 0)
        {
            //PROVA CONCLUÍDA
            $this->finalizarProva();
        }

        //prova não concluída
        $this->apresentarQuestao($idAgendamento, $questaoAtual, $questoes);

    }

    public function apresentarQuestao($idAgendamento, $questaoAtual, $questoes)
    {   
        $questao = $questoes->pop();
        return view('prova.executar_prova')->withQuestao($questao)->withIdAgendamento($idAgendamento)
        ->withQuestaoAtual($questaoAtual)->withQuestoes($questoes);
    }

    public function salvarResposta(Request $data)
    {
        //retorno dos dados de checagem da página
        $questaoAtual = $data->$questaoAtual;
        $questaoAtual++;
        $idAgendamento = $data->$idAgendamento;
        $questoes = $data->$questoes;
        $questaoRealizada = $data->questao_id;
        $alternativa = $data->alternativa_id;
        //se for a primeira resposta, atualiza que a questão foi realizada e atualiza o executado do agendamento
        if($questaoAtual == 1) {
            $realizada = new Realizada();
            $realizada->user_id = Auth::user()->id;
            $realizada->agendamento_id = $idAgendamento;
            $realizada->save();

            Agendamento::where('id', $idAgendamento)->update(array(
                'executada', 0
            ));
        }
        $respondida = new Respondida();
        $respondida->agendamento_id = $idAgendamento;
        $agendamento->user_id = Auth::user()->id;
        $respondida->questao_id = $questaoRealizada->id;
        $respondida->alternativa_id = $alternativa;
        $alternativaCorreta = $questao->alternativas()->where('correta', 0)->get();
        $respondida->correta = ($alternativaCorreta->id == $alternativa->id) ? 0 : 1;
        $respondida->save();

        $this->executarProva($idAgendamento, $questaoAtual, $questoes);
    }

    public function finalizarProva()
    {
        return 'Realizado!!!';
    }

}
