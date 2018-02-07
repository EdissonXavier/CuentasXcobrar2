@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
	<h3>Editar Persona: {{$persona->nombrepersona}}</h3>
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
	
	{!!Form::model($persona,['method'=>'PATCH','route'=>['cuentasCobrar.persona.update',$persona->idpersona]])!!}
	{{Form::token()}}
	
	<div class="form-group">
		<label>Nombre y Apellido</label>
		<input type="text" name="nombrepersona" class="form-control" value="{{$persona->nombrepersona}}" placeholder="Nombre y Apellido...">
	</div>
	<div class="form-group">
		<label>Fecha Nac.</label>
		<input type="date" name="fechanacimiento" class="form-control" value="{{$persona->fechanacimiento}}" placeholder="Fecha Nac.">
	</div>
	<div class="form-group">
		<label>Ciudad Nac.</label>
		<input type="text" name="ciudadnacimiento" class="form-control" value="{{$persona->ciudadnacimiento}}" placeholder="Ciudad Nacimiento...">
	</div>
	<div class="form-group">
		<label>Direccion</label>
		<input type="text" name="direccion" class="form-control" value="{{$persona->direccion}}" placeholder="Direccion...">
	</div>
	<div class="form-group">
		<label>Telefono</label>
		<input type="number" name="telefono" class="form-control" value="{{$persona->telefono}}" placeholder="Telefono...">
	</div>
	<div class="form-group">
		<label>e-mail</label>
		<input type="email" name="email" class="form-control" value="{{$persona->email}}" placeholder="email...">
	</div>
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>

	{!!Form::close()!!}
	</div>
</div>
@endsection