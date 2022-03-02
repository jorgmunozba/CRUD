<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //Formulario usuario
    public function userform(){
        return view('usuarios.userform');
    }

    //Guardar usuario

    public function save(Request $request){


        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:225',
            'email' => 'required|string|max:255|email|unique:usuarios'

        ]);
        $userdata = request()->except('_token');
        Usuario::insert($userdata);

        return back()->with('usuarioGuardado','Usuario guardado');
    }


}
