		 @extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Tipos de pago<a href="tipopago/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('cuentasCobrar.tipopago.search')

		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Opciones</th>
					<th>Id tipo de pago</th>
					<th>Nombre tipo de pago</th>
					<th>Referencias</th>
					<th>Descripción</th>
				</thead>
				@foreach($tipopagos as $ti)
				<tr>
				<td>
						<a href="{{URL::action('TipopagoController@edit',$ti->idtipopago)}}"><button class="btn btn-info">Editar</button></a>
						<a href="{{URL::action('TipopagoController@destroy',$ti->idtipopago)}}"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					<td>{{$ti->idtipopago}}</td>
					<td>{{$ti->nombretipopago}}</td>
					<td>{{$ti->referencias}}</td>
					<td>{{$ti->descripcion}}</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$tipopagos->render()}}
	</div>	
</div>

@endsection