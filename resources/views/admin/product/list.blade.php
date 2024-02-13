@extends('admin.layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">  
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Lista de Productos</h1>
				</div>
				<div class="col-sm-6"  style="text-align: right;">
					<a href="{{ url('admin/product/add')}}" class="btn btn-primary">Agregar Nuevo Producto</a>
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
							<h3 class="card-title">Listado de Productos</h3>
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
