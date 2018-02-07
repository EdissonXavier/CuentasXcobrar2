<?php

namespace cuentasCobrar\Http\Controllers;

use Illuminate\Http\Request;
use cuentasCobrar\Http\Requests;
use cuentasCobrar\Tipopago;
use Illuminate\Support\Facades\Redirect;
use cuentasCobrar\Http\Requests\TipoFormRequest;
use DB;

class TipopagoController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
if($request)
{
	$query=trim($request->get('searchText'));
	$tipopagos=DB::table('tipodepago')->where('nombretipopago','LIKE','%'.$query.'%')
	->where('estado','=','1')
	->paginate(7);
	return view('cuentasCobrar.tipopago.index',["tipopagos"=>$tipopagos,"searchText"=>$query]);
}
    }
    public function create()
    {
    	return view("cuentasCobrar.tipopago.create");
    }
    public function store(TipoFormRequest $request)
    {
    	$tipopago=new Tipopago;
    	$tipopago->idtipopago=$request->get('idtipopago');
    	$tipopago->nombretipopago=$request->get('nombretipopago');
    	$tipopago->referencias=$request->get('referencias');
    	$tipopago->descripcion=$request->get('descripcion');
    	$tipopago->estado='1';
    	$tipopago->save();
    	return Redirect::to('cuentasCobrar/tipopago');
    }
    public function show($id)
    {
    	return view("cuentasCobrar.tipopago.show",["tipopago"=>Tipopago::findOrFail($id)]);
    }
    public function edit(TipoFormRequest $request, $id)
    {
        return view("cuentasCobrar.tipopago.edit",["tipopago"=>Tipopago::findOrFail($id)]); 
    }
    public function update(TipoFormRequest $request, $id)
    {
    	$tipopago=Tipopago::findOrFail($id);
    	$tipopago->idtipopago=$request->get('idtipopago');
    	$tipopago->nombretipopago=$request->get('nombretipopago');
    	$tipopago->referencias=$request->get('referencias');
    	$tipopago->descripcion=$request->get('descripcion');
    	$tipopago->update();
    	return Redirect::to('cuentasCobrar/tipopago');
    }
    public function destroy($id)
    {
    	$tipopago=Tipopago::findOrFail($id);
    	$tipopago->estado='0';
    	$tipopago->update();
    	return Redirect::to('cuentasCobrar/tipopago');
    }
}
