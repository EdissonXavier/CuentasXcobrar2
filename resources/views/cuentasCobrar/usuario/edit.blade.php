@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
	<h3>Editar Usuario: {{$usuario->user}}</h3>
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
	{!!Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->idusuario]])!!}	
	{{Form::token()}}
				
		<div class="form-group">
			<label>Rol</label>
			<select name="idrol" class="form-control">
				@<?php foreach ($roles as $ro): ?>
					@<?php if ($ro->idrol==$usuario->idrol): ?>
					<option value="{{$ro->idrol}}" selected="">{{$ro->nombrerol}}</option>	
					@<?php else: ?>
					<option value="{{$ro->idrol}}">{{$ro->nombrerol}}</option>
					<?php endif ?>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<label for="user">User</label>
			<input type="text" name="user" required value="{{$usuario->user}}" class="form-control">	
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" required value="{{$usuario->password}}" class="form-control">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="usuario/index"><button class="btn btn-danger" type="submit">Cancelar</button></a>
		</div>

	{!!Form::close()!!}
@endsection