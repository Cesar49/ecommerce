@extends('admin.layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Editar Categoria</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<form action="" method="post">
							{{ csrf_field() }}
							<div class="card-body">
								<div class="form-group">
									<label>Nombre de Categorias <span style="color: red;">*</span> </label>
									<input type="text" class="form-control" name="name" required value="{{ old('name', $getRecord->name) }}" placeholder="Ingrese Nombre de Categoria">
								</div>
								<div class="form-group">
									<label>Url <span style="color: red;">*</span></label>
									<input type="text" class="form-control" name="slug" required value="{{ old('slug', $getRecord->slug) }}" placeholder="Ingrese Ruta de Categoria">
									<div style="color: red;">{{ $errors->first('slug') }}</div>
								</div>
								<div class="form-group">
									<label>Status <span style="color: red;">*</span></label>
									<select class="form-control" name="status" required>
										<option {{ (old('status', $getRecord->status) == 0) ? 'selected' : '' }} value="0">Activo</option>
										<option {{ (old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactivo</option>									
									</select>
								</div>
								<hr>
								<div class="form-group">
									<label>Meta Titulo <span style="color: red;">*</span></label>
									<input type="text" class="form-control" name="meta_title" required value="{{ old('meta_title', $getRecord->meta_title) }}" placeholder="Ingrese Meta Titulo">
								</div>
								<div class="form-group">
									<label>Meta Descripcion</label>
									<textarea class="form-control" name="meta_description" placeholder="Ingrese Meta Descripcion">{{ old('meta_description', $getRecord->meta_description) }}</textarea>
								</div>
								<div class="form-group">
									<label>Meta Keywords</label>
									<input type="text" class="form-control" name="meta_keywords" value="{{ old('meta_keywords', $getRecord->meta_keywords) }}" placeholder="Ingrese Meta Keywords">
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Actualizar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

@endsection

@section('script')

@endsection