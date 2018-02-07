@extends('layouts.admin')
@section('contenido')
<div class="row">

		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Cajeros<a href="cajero/create"><button class="btn btn-success">Nuevo</button></a>


             <b href="cajero/imprimir"><button class="btn btn-success">REPORTE DE CAJEROS</button></b></h3>
			


			@include('cuentasCobrar.cajero.search')

		</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Opciones</th>
					<th>Id</th>
					<th>Nombre</th>
					<th>FechaNac.</th>
					<th>Ciudad</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>Usuario asignado</th>
				</thead>
				@foreach($cajeros as $ca)
				<tr>
					<td>	
						<a href="{{URL::action('CajeroController@edit',$ca->idcajero)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$ca->idcajero}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					<td>{{$ca->idcajero}}</td>
					<td>{{$ca->nombrecajero}}</td>
					<td>{{$ca->fechanacimiento}}</td>
					<td>{{$ca->ciudadnacimiento}}</td>
					<td>{{$ca->direccion}}</td>
					<td>{{$ca->telefono}}</td>
					<td>{{$ca->email}}</td>
					<td>{{$ca->user}}</td>
				</tr>
				@include('cuentasCobrar.cajero.modal')
				@endforeach
			</table>
		</div>
		{{$cajeros->render()}}
	</div>	
</div>

@endsection