@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
	<h3>Nuevo Tipo de pago</h3>
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
	
	{!!Form::open(array('url'=>'cuentasCobrar/tipopago','method'=>'POST','autocomplete'=>'off'))!!}
	{{Form::token()}}
	<div class="form-group">
		<label>Id tipo de pago</label>
		<input type="text" name="idtipopago" class="form-control" placeholder="Ingrese ID de 8 caracteres">
	</div>
	<div class="form-group">
		<label>Denominación</label>
		<input type="text" name="nombretipopago" class="form-control" placeholder="Nombre del tipo de pago">
	</div>
	<div class="form-group">
		<label>Referencias</label>
		<input type="text" name="referencias" class="form-control" placeholder="Referencias">
	</div>
	<div class="form-group">
		<label>Descripción</label>
		<input type="text" name="descripcion" class="form-control" placeholder="Breve descripción del tipo de pago">
	</div>
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>

	{!!Form::close()!!}
	</div>
</div>
@endsection