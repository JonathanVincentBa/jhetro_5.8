@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Ciudades <a href="ciudad/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('mantenimiento.ciudad.search')
		</div>	
	</div>
	<div class="row">
		<div class="col-lg-12 col-md.12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed able-hover">
					<thead>
						<th>Id</th>
						<th>Descripción</th>
						<th>Opciones</th>
					</thead>		
					@foreach ($ciudades as $ciu)
						<tr>
							<td>{{ $ciu->id_ciudad}}</td>
							<td>{{ $ciu->descripcion}}</td>
							<td>
								<a href="{{URL::action('CiudadController@edit',$ciu->id_ciudad)}}"><button class="btn btn-info">Editar</button></a>
								<a href="" data-target="#modal-delete-{{$ciu->id_ciudad}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
						</tr>
						@include('mantenimiento.ciudad.modal')
					@endforeach	
				</table>
			</div>
			{{$ciudades->render()}}
		</div>
	</div>
@endsection