@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
	<h3>Nueva Persona</h3>
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
			@<?php foreach ($errors->all() as $error): ?>
				<li>
					{{$error}}
				</li>
			<?php endforeach ?>
				
			</ul>
		</div>

	@endif
	
	{{!!Form::open(array('url'=>'cuentasCobrar/persona','method'=>'POST','autocomplete'=>'off'))!!}}	
	{{Form::token()}}
	<div class="form-group">
		<label>Identificacion</label>
		<input type="number" name="idpersona" class="form-control" placeholder="Cédula,RUC,pasaporte...">
	</div>
	<div class="form-group">
		<label>Nombre y Apellido</label>
		<input type="" name="nombrepersona" class="form-control" placeholder="Nombre y Apellido...">
	</div>
	<div class="form-group">
		<label>Fecha Nac.</label>
		<input type="date" name="fechanacimiento" class="form-control" placeholder="Fecha Nac.">
	</div>
	<div class="form-group">
		<label>Ciudad Nac.</label>
		<input type="text" name="ciudadnacimiento" class="form-control" placeholder="Ciudad Nacimiento...">
	</div>
	<div class="form-group">
		<label>Direccion</label>
		<input type="text" name="direccion" class="form-control" placeholder="Direccion...">
	</div>
	<div class="form-group">
		<label>Telefono</label>
		<input type="number" name="telefono" class="form-control" placeholder="Telefono...">
	</div>
	<div class="form-group">
		<label>e-mail</label>
		<input type="email" name="email" class="form-control" placeholder="email...">
	</div>
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>

	{{!!Form::close()!!}}
	</div>
</div>
@endsection