<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternativa;
use App\Questao;

class UploadController extends Controller
{
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
            Image::make($alternativaFile)->save(public_path("/uploads/alternativas/" . $filename));
            Alternativa::where('id', $data->alternativa_id)->update(array(
                'src' => $filename
            ));
        }
        return '';
    }

    public function showQuestao($id)
    {

    }

    public function uploadQuestao()
    {

    }
}
