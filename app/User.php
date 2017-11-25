<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tipoUsuario', 'cpf', 'ativo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Aluno()
    {
        if ($this->tipoUsuario == 1)
        return true;

        return false;
    }

    public function Professor()
    {
        if ($this->tipoUsuario == 2)
        return true;

        return false;
    }

    public function Interprete()
    {
        if ($this->tipoUsuario == 3)
        return true;

        return false;
    }


}
