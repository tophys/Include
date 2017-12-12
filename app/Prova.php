<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    public function questoes()
    {
        return $this->belongsToMany('App\Questao');
    }

    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }

    public function agendamentos()
    {
        return $this->hasMany('App\Agendamento');
    }
}
