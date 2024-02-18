@extends('admin.layouts.app')

@section('style')

@endsection
@section('content')

<div class="content-wrapper">

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Editar Producto</h1>
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
								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label>Titulo <span style="color: red;">*</span> </label>
											<input type="text" class="form-control" name="title" required value="{{ old('title') }}" placeholder="Ingrese Titulo">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>SKU <span style="color: red;">*</span> </label>
											<input type="text" class="form-control" name="sku" required value="{{ old('sku') }}" placeholder="Ingrese SKU">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Categoria <span style="color: red;">*</span> </label>
											<select class="form-control" id="ChangeCategory" name="category_id">
												<option value="">Seleccione</option>
												@foreach($getCategory as $category)
												 <option value="{{ $category->id }}">{{ $category->name }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Sub Categoria <span style="color: red;">*</span> </label>
											<select class="form-control" id="getSubCategory" name="sub_category_id">
												<option value="">Seleccione</option>
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Marca <span style="color: red;">*</span> </label>
											<select class="form-control" name="brand_id">
												<option value="">Seleccione</option>
												@foreach($getBrand as $brand)
												 <option value="{{ $brand->id }}">{{ $brand->name }}</option>
												@endforeach
											</select>
										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Color <span style="color: red;">*</span> </label>
											@foreach($getColor as $color)
												<div>
												  <label><input type="checkbox" name="color_id[]" value="{{ $color->id }}"> {{ $color->name }}</label>
											  </div> 
											@endforeach											
											
										</div>
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Precio ($)<span style="color: red;">*</span> </label>
											<input type="text" class="form-control" name="price" required value="" placeholder="Ingrese Precio">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Precio Anterior ($)<span style="color: red;">*</span> </label>
											<input type="text" class="form-control" name="old_price" required value="" placeholder="Ingrese Precio anterior">
										</div>
									</div>

								</div>

								<hr>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Tamaño <span style="color: red;">*</span> </label>
											<div>
												<table class="table table-striped">
													<thead>
														<tr>
															<th>Nombre</th>
															<th>Precio ($)</th>
															<th>Accion</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<input type="text" name="" class="form-control">
															</td>
															<td>
																<input type="text" name="" class="form-control">
															</td>
															<td>
																<button type="button" class="btn btn-primary">Agregar</button>
																<button type="button" class="btn btn-danger">Borrar</button>
															</td>
														</tr>
														<tr>
															<td>
																<input type="text" name="" class="form-control">
															</td>
															<td>
																<input type="text" name="" class="form-control">
															</td>
															<td>
																<button type="button" class="btn btn-danger">Borrar</button>
															</td>
														</tr>
														<tr>
															<td>
																<input type="text" name="" class="form-control">
															</td>
															<td>
																<input type="text" name="" class="form-control">
															</td>
															<td>
																<button type="button" class="btn btn-danger">Borrar</button>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Descripcion corta <span style="color: red;">*</span> </label>
											<textarea name="short_description" class="form-control"  placeholder="Ingrese Descripcion">
												
											</textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Descripcion <span style="color: red;">*</span> </label>
											<textarea name="description" class="form-control"  placeholder="Ingrese Descripcion">
												
											</textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Informacion adicional <span style="color: red;">*</span> </label>
											<textarea name="additional_information" class="form-control"  placeholder="Ingrese informacion adicional">
												
											</textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Devoluciones <span style="color: red;">*</span> </label>
											<textarea name="shipping_returns" class="form-control"  placeholder="Ingrese devoluciones">
												
											</textarea>
										</div>
									</div>
								</div>

                 <hr />

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Status <span style="color: red;">*</span></label>
											<select class="form-control" name="status" required>
												<option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Activo</option>
												<option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Inactivo</option>
																				
											</select>
										</div>
									</div>
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
 
<script type="text/javascript">
  $('body').delegate('#ChangeCategory', 'change', function(e) {
  var id = $(this).val();	
  	$.ajax({
  		type: "POST",
  		url: "{{ url('admin/get_sub_category') }}",
  		data: {
  			"id": id,
  			"_token": "{{ csrf_token() }}"
  		},
  		dataType: "json",
  		success: function (data) {
  			//al cargar bien el select de categoria se carga el de sub categoria
  			$('#getSubCategory').html(data.html);
  		},
  		error: function (data) {
  			// body...
  		}
  	});
  });



</script>
 
@endsection