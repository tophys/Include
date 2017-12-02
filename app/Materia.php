<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    public function turmas()
    {
        return $this->hasMany('App\Turma');
    }

    public function questoes()
    {
        return $this->hasMany('App\Questao');
    }
}
