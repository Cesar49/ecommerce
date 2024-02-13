@extends('admin.layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">  
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Lista de Marcas</h1>
				</div>
				<div class="col-sm-6"  style="text-align: right;">
					<a href="{{ url('admin/brand/add')}}" class="btn btn-primary">Agregar Nueva Marca</a>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					@include('admin.layouts._message')
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Listado de Marcas</h3>
						</div>
						<div class="card-body p-0">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre</th>
										<th>Slug</th>
										<th>Meta Titulo</th>
										<th>Meta Descripcion</th>
										<th>Meta Keywords</th>
										<th>Creada por</th>
										<th>Status</th>
										<th>F Creacion</th>
										<th>Accion</th>
									</tr>
								</thead>
								<tbody>
									@foreach($getRecord as $value)
									<tr>
										<td>{{ $value->id}}</td>
										<td>{{ $value->name}}</td>
										<td>{{ $value->slug}}</td>
										<td>{{ $value->meta_title}}</td>
										<td>{{ $value->meta_description}}</td>
										<td>{{ $value->meta_keywords}}</td>
										<td>{{ $value->created_by_name}}</td>
										<td>{{ ($value->status == 0) ? 'Activo' : 'Inactivo' }}</td>
										<td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
										<td>
											<a href="{{ url('admin/brand/edit/'.$value->id)}}" class="btn btn-primary">Editar</a>
											<a href="{{ url('admin/brand/delete/'.$value->id)}}" class="btn btn-danger">Borrar</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
</div>

@endsection

@section('script')

@endsection
