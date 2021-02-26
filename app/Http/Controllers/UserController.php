<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
class UserController extends Controller
{

    //Listado de usuarios
    public function list(){
        $data['users'] = Usuario::paginate(3); //Arreglo llamado users y paginacion de 3
        return view('usuarios.list',$data);  //servira para mandar la lista al controlador
    }
	//Formulario de usuarios
    public function userform(){
    	return view('usuarios.userform');
    }

    //Guardar Usuarios
    public function save(Request $request){
        $validator=$this->validate($request,[
            'nombre'=>'required|string|max:255',
            'email'=>'required|string|max:255|email|unique:usuarios']);   //Validamos los campos.

    	$userdata = request()->except('_token'); //Almacenamos todos los datos del formulario menos el token de seguridad
    	Usuario::insert($userdata); //modelo usuario

    	return back()->with('usuarioGuardado', 'Usuario Guardado');
    }


    //Eliminar Usuarios
    public function delete($id){
        Usuario::destroy($id);

        return back()->with('usuarioEliminado','Usuario Eliminado');

    }


    //Formulario para editar usuarios
     public function editform($id){
        $usuario = Usuario::findOrFail($id); // encontrar todos los campos relacionados con el id del usuario
        return view('usuarios.editform',compact('usuario'));

     }

     public function edit(Request $request, $id){
        $datosUsuario = request()->except((['_token', '_method']));
        Usuario::where('id','=',$id)->update($datosUsuario);

        return back()->with('usuarioModificado','Usuario Modificado');

     }
}
