@extends('admin.layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Agregar Nuevo Color</h1>
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
								<label>Nombre de Color <span style="color: red;">*</span> </label>
								<input type="text" class="form-control" name="name" required value="{{ old('name') }}" placeholder="Ingrese Nombre de Color">
							</div>
							<div class="form-group">
								<label>Codigo <span style="color: red;">*</span></label>
								<input type="color" class="form-control" name="code" required value="{{ old('code') }}" placeholder="Ingrese Codigo del color">
								<div style="color: red;">{{ $errors->first('code') }}</div>
							</div>
							<div class="form-group">
								<label>Status <span style="color: red;">*</span></label>
								<select class="form-control" name="status" required>
									<option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Activo</option>
									<option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactivo</option>									
								</select>
							</div>
							
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Registrar</button>
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