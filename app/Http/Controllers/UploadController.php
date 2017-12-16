<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternativa;
use App\Questao;
use App\Materia;
use App\Prova;
use Image;
use Illuminate\Http\File;

class UploadController extends Controller
{
    public function showQuestoesProva($id)
    {
        $materias = Materia::all();
        $prova = Prova::find($id);
        $questoes = $prova->questoes;
        return view('traduzir.traduzir_selecionar_questao')
        ->withMaterias($materias)->withQuestoes($questoes)->withProva($prova);
    }

    public function showProvas()
    {
        $materias = Materia::all();
        $provas = Prova::where('ativo', 0)->get();
        return view('traduzir.traduzir_prova')->withMaterias($materias)->withProvas($provas);
    }
    public function showAlternativa($id)
    {
        $questao = Questao::find($id);
        return view('traduzir.traduzir_alternativa')->withQuestao($questao);
    }

    public function uploadAlternativa(Request $data)
    {
        if ($data->hasFile('alternativa'))
        {
            $alternativa = Alternativa::find($data->alternativa_id);
            $alternativaFile = $data->file('alternativa');
            if ($alternativa->src != "") 
            {
                $path = '/uploads/alternativas/';
                $lastpath= $alternativa->src;
                \File::Delete(public_path( $path . $lastpath) );
            }
            $filename = $alternativa->id . '.' . $alternativaFile->getClientOriginalExtension();
            $path = public_path() . '/uploads/alternativas/';
            $alternativaFile->move($path,$filename);
            //Image::make($alternativaFile)->save(public_path("/uploads/alternativas/" . $filename));
            Alternativa::where('id', $data->alternativa_id)->update(array(
                'src' => $filename,
                'traduzida' => 0
            ));
        }
        return redirect()->route('show.alternativa', ['id' => $data->questao_id, 'alternativa' => $data->alternativa_id]);
    }

    public function showQuestao($id)
    {
        $questao = Questao::find($id);
        $materias = Materia::all();
        return view('traduzir.traduzir_questao')->withQuestao($questao)->withMaterias($materias);
    }

    public function selecionarQuestao()
    {
        $materias = Materia::all();
        $questoes = Questao::where('ativo', 0)->get();
        return view('traduzir.selecionar_questao')->withMaterias($materias)->withQuestoes($questoes);
    }

    public function uploadQuestao(Request $data)
    {
        if ($data->hasFile('questao'))
        {
            $questao = Questao::find($data->questao_id);
            $questaoFile = $data->file('questao');
            if ($questao->src != "") 
            {
                $path = '/uploads/questoes/';
                $lastpath= $questao->src;
                \File::Delete(public_path( $path . $lastpath) );
            }
            $filename = $questao->id . '.' . $questaoFile->getClientOriginalExtension();
            $path = public_path() . '/uploads/questoes/';
            $questaoFile->move($path,$filename);
            //Image::make($questaoFile)->save(public_path("/uploads/alternativas/" . $filename));
            Questao::where('id', $data->questao_id)->update(array(
                'src' => $filename,
                'traduzida' => 0
            ));
        }

        return redirect()->route('show.questao', ['id' => $data->questao_id]);
    }

    public function showTrazudirQuestao($id)
    {
        $questao = Questao::find($id);
        return view('traduzir.upload_traducao')->withQuestao($questao);
    }

    public function showTrazudirAlternativa($id, $idAlternativa)
    {
        $alternativa = Alternativa::find($idAlternativa);
        return view('traduzir.upload_traducao_alternativa')->withAlternativa($alternativa)->withId($id);
    }

}
