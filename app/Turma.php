<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    //
    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }
}
