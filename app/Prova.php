<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    public function questoes()
    {
        return $this->belongsToMany('App\Questao');
    }
}
