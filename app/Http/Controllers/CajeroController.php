<?php

namespace cuentasCobrar\Http\Controllers;

use Illuminate\Http\Request;
use cuentasCobrar\Http\Requests;
use cuentasCobrar\Cajero;
use Illuminate\Support\Facades\Redirect;
use cuentasCobrar\Http\Requests\CajeroFormRequest;
use DB;

class CajeroController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
		if($request)
		{
			$query=trim($request->get('searchText'));
			$cajeros=DB::table('cajero as ca')
            ->join('usuario as us','us.idusuario','=','ca.idusuario')
            ->select('ca.idcajero','ca.nombrecajero','ca.fechanacimiento','ca.ciudadnacimiento','ca.direccion','ca.telefono','ca.email','us.user')
            ->where('nombrecajero','LIKE','%'.$query.'%')
			->where('ca.estado','=','1')
			->paginate(7);
			return view('cuentasCobrar.cajero.index',["cajeros"=>$cajeros,"searchText"=>$query]);
		}

    }

    public function create()
    {
        $usuarios=DB::table('usuario')->where('estado','=','1')->get();
    	return view("cuentasCobrar.cajero.create",["usuarios"=>$usuarios]);
    }
    public function store(CajeroFormRequest $request)
    {
    	$cajero=new Cajero;
    	$cajero->idcajero=$request->get('idcajero');
    	$cajero->nombrecajero=$request->get('nombrecajero');
    	$cajero->fechanacimiento=$request->get('fechanacimiento');
    	$cajero->ciudadnacimiento=$request->get('ciudadnacimiento');
    	$cajero->direccion=$request->get('direccion');
    	$cajero->telefono=$request->get('telefono');
    	$cajero->email=$request->get('email');
        $cajero->idusuario=$request->get('idusuario');
    	$cajero->estado='1';
    	$cajero->save();
    	return Redirect::to('cuentasCobrar/cajero');
    }
     public function show($id)
    {
    	return view("cuentasCobrar.cajero.show",["cajero"=>Cajero::findOrFail($id)]);
    }
    public function edit($id)
    {
    $cajero=Cajero::find($id);
    $usuarios=DB::table('usuario')->orderBy('idusuario')->get();
    return view("cuentasCobrar.cajero.edit",compact('cajero','usuarios'));
    }
     public function update(CajeroFormRequest $request, $id)
    {
    	$cajero=Cajero::findOrFail($id);
    	$cajero->nombrecajero=$request->get('nombrecajero');
    	$cajero->fechanacimiento=$request->get('fechanacimiento');
    	$cajero->ciudadnacimiento=$request->get('ciudadnacimiento');
    	$cajero->direccion=$request->get('direccion');
    	$cajero->telefono=$request->get('telefono');
    	$cajero->email=$request->get('email');
    	$cajero->update();
    	return Redirect::to('cuentasCobrar/cajero');
    }
    public function destroy($id)
    {
    	$cajero=Cajero::findOrFail($id);
    	$cajero->estado='0';
    	$cajero->update();
    	return Redirect::to('cuentasCobrar/cajero');
    }

//MI CODIGO AGREGADO


//FIN DE MI CODIGO


}
