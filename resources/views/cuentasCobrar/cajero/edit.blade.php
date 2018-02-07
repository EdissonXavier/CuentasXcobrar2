@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
	<h3>Editar Cajero: {{$cajero->nombrecajero}}</h3>
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
	
	{!!Form::model($cajero,['method'=>'PATCH','route'=>['cajero.update',$cajero->idcajero]])!!}	
	{{Form::token()}}
	
	<div class="form-group">
		<label>Nombre y Apellido</label>
		<input type="text" name="nombrecajero" class="form-control" value="{{$cajero->nombrecajero}}" placeholder="Nombre y Apellido...">
	</div>
	<div class="form-group">
		<label>Fecha Nac.</label>
		<input type="date" name="fechanacimiento" class="form-control" value="{{$cajero->fechanacimiento}}" placeholder="Fecha Nac.">
	</div>
	<div class="form-group">
		<label>Ciudad Nac.</label>
		<input type="text" name="ciudadnacimiento" class="form-control" value="{{$cajero->ciudadnacimiento}}" placeholder="Ciudad Nacimiento...">
	</div>
	<div class="form-group">
		<label>Direccion</label>
		<input type="text" name="direccion" class="form-control" value="{{$cajero->direccion}}" placeholder="Direccion...">
	</div>
	<div class="form-group">
		<label>Telefono</label>
		<input type="number" name="telefono" class="form-control" value="{{$cajero->telefono}}" placeholder="Telefono...">
	</div>
	<div class="form-group">
		<label>e-mail</label>
		<input type="email" name="email" class="form-control" value="{{$cajero->email}}" placeholder="email...">
	</div>
	<div class="form-group">
			<label>Usuario</label>
			<select name="idusuario" class="form-control">
				@<?php foreach ($usuarios as $us): ?>
					@<?php if ($us->idusuario==$cajero->idusuario): ?>
					<option value="{{$us->idusuario}}" selected="">{{$us->user}}</option>	
					@<?php else: ?>
					<option value="{{$us->idusuario}}">{{$us->user}}</option>
					<?php endif ?>
				<?php endforeach ?>
			</select>
		</div>
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<a href="cajero/index"><button class="btn btn-danger" type="submit">Cancelar</button></a>
	</div>

	{!!Form::close()!!}
	</div>
</div>
@endsection