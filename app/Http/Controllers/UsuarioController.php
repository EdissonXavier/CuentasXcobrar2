<?php

namespace cuentasCobrar\Http\Controllers;

use Illuminate\Http\Request;
use cuentasCobrar\Http\Requests;
use cuentasCobrar\Usuario;
use Illuminate\Support\Facades\Redirect;
use cuentasCobrar\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
		if($request)
		{
			$query=trim($request->get('searchText'));
			$usuarios=DB::table('usuario as u')
			->join ('rol as r','u.idrol','=','r.idrol')
			->select('u.idusuario','r.nombrerol as nombrerol','u.user','u.password','u.estado','r.idrol')
			->where('u.user','LIKE','%'.$query.'%')
            ->where('u.estado','=','1')
			->orderBy('u.idusuario','desc')
			->paginate(7);
			return view('cuentasCobrar.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);
		}

    }

    public function create()
    {
    	$roles=DB::table('rol')->where('estado','=','1')->get();
    	return view("cuentasCobrar.usuario.create",["roles"=>$roles]);
    }
    public function store(UsuarioFormRequest $request)
    {
    	$usuario=new Usuario;
    	$usuario->idusuario=$request->get('idusuario');
    	$usuario->idrol=$request->get('idrol');
        $usuario->user=$request->get('user');
        $usuario->password=$request->get('password');
    	$usuario->estado='1';
    	$usuario->save();
    	return Redirect::to('cuentasCobrar/usuario');
    }
     public function show($id)
    {
    	return view("cuentasCobrar.usuario.show",["usuario"=>Usuario::findOrFail($id)]);
    }
    public function edit($id)
    {

     $usuario=Usuario::find($id);
      $roles=DB::table('rol')->orderBy('idrol')->get();
       return view ('cuentasCobrar.usuario.edit',compact('usuario','roles'));	
    }
     public function update(UsuarioFormRequest $request, $id)
    {
    	$usuario=Usuario::findOrFail($id);
        $usuario->idrol=$request->get('idrol');
        $usuario->user=$request->get('user');
        $usuario->password=$request->get('password');
    	$usuario->update();
    	return Redirect::to('cuentasCobrar/usuario');
    }
    public function destroy($id)
    {
    	$usuario=Usuario::findOrFail($id);
    	$usuario->estado='0';
    	$usuario->update();
    	return Redirect::to('cuentasCobrar/usuario');
    }
}
