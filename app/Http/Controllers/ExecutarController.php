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
    
    public function executarProva(Request $data)
    {
        $idAgendamento = $data->idAgendamento;
        $questaoAtual = $data->questaoAtual;
        
        $agendamento = Agendamento::find($idAgendamento);
        $prova = Prova::find($agendamento->prova_id);
        $questoes = [];
        $objQuestoes = $prova->questoes;
        if ($questaoAtual == 0) {
            for ($i = 0; $i < count($objQuestoes) ; $i++)
            {
                $questoes[$i] = $objQuestoes[$i]->id;
            }
        }
        else
        {
            $questoes = unserialize($data->questoes);
        }
        if ($questaoAtual != 0)
        {
            //retorno dos dados de checagem da página
            $questaoAtual++;
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
        }

        /*$count = count($prova->questoes()->get());
        $validate = $questaoAtual +1;
        if ($count == $validate)*/
        if (count($questoes) == 0 && $questaoAtual != 0)
        {
            //PROVA CONCLUÍDA
            $this->finalizarProva();
        }
        $questao = Questao::find($questoes[$questaoAtual]);
        $questoes = array_pop($questoes);
        $questoes = serialize($questoes);
        $questaoAtual++;
        

        return view('prova.executar_prova')->withQuestao($questao)->withIdAgendamento($idAgendamento)
        ->withQuestaoAtual($questaoAtual)->withQuestoes($questoes)->withProva($prova);

        //$this->apresentarQuestao($idAgendamento, $questaoAtual, $serialQuestoes, $prova);

    }

    public function apresentarProvas()
    {
        $agendamentos = Agendamento::where('ativo', 0)->where('data_liberada', \Carbon\Carbon::today())->get();
        $provas = collect([]);
        foreach ($agendamentos as $agendamento)
        {
            $provas->push(Prova::find($agendamento->prova_id));
        }
        return view('prova.selecionar_prova')->withProvas($provas)->withAgendamentos($agendamentos);
    }

    public function apresentarQuestao($idAgendamento, $questaoAtual, $questoes, $prova)
    {   
        return $questoes;
        //$obj = unserialize($questoes);
        
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
        return view('prova.finalizar_prova');
    }

}
