@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Usuario</h3>
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
	</div>
</div>
	{!!Form::open(array('url'=>'cuentasCobrar/usuario','method'=>'POST','autocomplete'=>'off' ))!!}
	{{Form::token()}}
		<div class="form-group">
			<label for="rol">Rol</label>
			<select name="idrol" class="form-control">
				<?php foreach ($roles as $ro): ?>
					><option  value="{{$ro->idrol}}">{{$ro->nombrerol}}</option>
				<?php endforeach ?>
			</select>
		</div>

		<div class="form-group">
			<label for="user">User</label>
			<input type="text" name="user" required value="{{old('user')}}" class="form-control" placeholder="Nombre de usuario para inicio de sesión...">	
		</div>
			
		<div class="form-group">
			<label for="user">Password</label>
			<input type="password" name="password" required class="form-control" placeholder="Contraseña de inicio de sesión">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="usuario/index"><button class="btn btn-danger" type="submit">Cancelar</button></a>
		</div>
	{!!Form::close()!!}
@endsection