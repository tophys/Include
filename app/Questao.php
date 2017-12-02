<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected $table = 'questoes';

    public function materia()
    {
        $this->belongsTo('App\Materia');
    }

    public function provas()
    {
        $this->belongsToMany('App\Prova');
    }
}
