@extends('admin.layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Agregar Nuevo Administrador</h1>
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
								<label for="exampleInputEmail1">Nombre</label>
								<input type="text" class="form-control" name="name" required value="{{ old('name') }}" placeholder="Ingrese Nombre">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" required value="{{ old('email') }}" placeholder="Ingrese email">
								<div style="color: red;">{{ $errors->first('email') }}</div>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" required placeholder="Ingrese Clave">
							</div>
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="status" required>
									<option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Activo</option>
									<option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactivo</option>									
								</select>
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
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