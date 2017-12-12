<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    public function turma()
    {
        return $this->belongsTo('App\Turma');
    }
    public function prova()
    {
        return $this->belongsTo('App\Prova');
    }

}
