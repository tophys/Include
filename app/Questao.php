<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected $table = 'questoes';

    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }

    public function provas()
    {
        return $this->belongsToMany('App\Prova');
    }

    public function alternativas()
    {
        return $this->hasMany('App\Alternativa');
    }
}
