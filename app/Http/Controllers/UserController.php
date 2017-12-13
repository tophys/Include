<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use App\User;
use Illuminate\Http\File;

class UserController extends Controller
{
    public function perfilUsuario()
    {
        return view('perfil.perfil')->withUser(Auth::user());
    }

    public function atualizarFotoUsuario(Request $data)
    {
        if ($data->hasFile('avatar'))
        {
            $avatar = $data->file('avatar');
            if (Auth::user()->avatar != "default.jpg") 
            {
                $path = '/uploads/avatars/';
                $lastpath= Auth::user()->avatar;
                \File::Delete(public_path( $path . $lastpath) );
            }
            $filename = Auth::user()->cpf . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(300,300)->save(public_path("/uploads/avatars/" . $filename));
            User::where('id', Auth::user()->id)->update(array(
                'avatar' => $filename
            ));
        }
        return redirect('/perfil');
        
    }
}
