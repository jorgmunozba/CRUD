<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class UserController extends Controller
{
    
    //Listado de usuarios
    public function list(){

        $users = Usuario::paginate(5);
        return view('usuarios.list', compact('users'));


    }


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

    //Eliminar usuarios
    public function delete($id){
        Usuario::destroy($id);

        return back()->with('usuarioEliminado', 'Usuario eliminado');
    }


}
