<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    public function questao()
    {
        return $this->belongsTo('App\Questao');
    }
}
