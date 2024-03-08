@extends('admin.layouts.app')

@section('style')
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
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
					@include('admin.layouts._message')
					<div class="card card-primary">
						<form action="" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="card-body">
								<div class="row">

									<div class="col-md-6">
										<div class="form-group">
											<label>Titulo <span style="color: red;">*</span> </label>
											<input type="text" class="form-control" name="title" required value="{{ $product->title }}" placeholder="Ingrese Titulo">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>SKU <span style="color: red;">*</span> </label>
											<input type="text" class="form-control" name="sku" required value="{{ $product->sku }}" placeholder="Ingrese SKU">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Categoria <span style="color: red;">*</span> </label>
											<select class="form-control" id="ChangeCategory" name="category_id" required>
												<option value="">Seleccione</option>
												@foreach($getCategory as $category)
												 <option {{ ($product->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Sub Categoria <span style="color: red;">*</span> </label>
											<select class="form-control" id="getSubCategory" name="sub_category_id" required>
												<option value="">Seleccione</option>
												@foreach($getSubCategory as $subcategory)
												 <option {{ ($product->sub_category_id == $subcategory->id) ? 'selected' : '' }} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Marca <span style="color: red;">*</span> </label>
											<select class="form-control" name="brand_id">
												<option value="">Seleccione</option>
												@foreach($getBrand as $brand)
												 <option {{ ($product->brand_id == $brand->id) ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
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
												@php
												  $cheked = '';
												@endphp
												@foreach($product->getColor as $pcolor)
												  @if($pcolor->color_id == $color->id)
	                          @php
														  $cheked = 'checked';
														@endphp
												  @endif
												@endforeach
												<div>
												  <label><input {{ $cheked }} type="checkbox" name="color_id[]" value="{{ $color->id }}"> {{ $color->name }}</label>
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
											<input type="text" class="form-control" name="price" required value="{{ !empty($product->price) ? $product->price : '' }}" placeholder="Ingrese Precio">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Precio Anterior ($)<span style="color: red;">*</span> </label>
											<input type="text" class="form-control" name="old_price" required value="{{!empty($product->old_price) ? $product->old_price : ''}}" placeholder="Ingrese Precio anterior">
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
													<tbody id="AppendSize">
														@php
														  $i_s = 1;
														@endphp
														@foreach($product->getSize as $size)
														    <tr id="DeleteSize{{$i_s}}">
																	<td>
																		<input type="text" value="{{ $size->name }}" name="size[{{ $i_s }}][name]" placeholder="Nombre" class="form-control">
																	</td>
																	<td>
																		<input type="text" value="{{ $size->price }}" name="size[{{ $i_s }}][price]" placeholder="Precio" class="form-control">
																	</td>
																	<td style="width: 100px;">
																		<button type="button" id="{{ $i_s }}" class="btn btn-danger DeleteSize">Eliminar</button>
																	</td>
															</tr>	
															@php
														  $i_s++;
														@endphp
														@endforeach
														<tr>
															<td>
																<input type="text" name="size[100][name]" placeholder="Nombre" class="form-control">
															</td>
															<td>
																<input type="text" name="size[100][price]" placeholder="Precio" class="form-control">
															</td>
															<td style="width: 100px;">
																<button type="button" class="btn btn-primary AddSize">Agregar</button>
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
											<label>Imagen <span style="color: red;"></span> </label>
											<input type="file" name="image[]" class="form-control" style="padding: 5px;" multiple accept="image/*">
										</div>
									</div>
								</div>


								@if(!empty($product->getImage->count()))
                   <div class="row" id="sortable">
                   	 @foreach($product->getImage as $image)
                       @if(!empty($image->getLogo()))
                         <div class="col-md-1 sortable_image" id="{{ $image->id }}" style="text-align: center;">
                           <img style="width: 100%;height: 100px;" src="{{ $image->getLogo() }}">
                           <a onclick="return confirm('Estas seguro de querer eliminar?');" href=" {{ url('admin/product/image_delete/'.$image->id) }} " style="margin-top: 10px;" class="btn btn-danger btn-sm">Borrar</a>
                         </div>
                       @endif
                   	 @endforeach
                   </div>
								@endif

								<hr>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Descripcion corta <span style="color: red;">*</span> </label>
											<textarea name="short_description" class="form-control"  placeholder="Ingrese Descripcion">
												{{ $product->short_description }}
											</textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Descripcion <span style="color: red;">*</span> </label>
											<textarea name="description" class="form-control editor"  placeholder="Ingrese Descripcion">
												{{ $product->description }}
											</textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Informacion adicional <span style="color: red;">*</span> </label>
											<textarea name="additional_information" class="form-control editor"  placeholder="Ingrese informacion adicional">
												{{ $product->additional_information }}
											</textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Devoluciones <span style="color: red;">*</span> </label>
											<textarea name="shipping_returns" class="form-control editor"  placeholder="Ingrese devoluciones">
												{{ $product->additional_information }}
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
												<option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactivo</option>
																				
											</select>
										</div>
									</div>
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

<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('assets/sortable/jquery-ui.js')}}"></script>
 
<script type="text/javascript">

	//cargamos el sortable en el ready del document
	$(document).ready(function () {
		$( "#sortable" ).sortable({
			update : function(event, ui){
        var photo_id = new Array();
        $('.sortable_image').each(function() {
           var id = $(this).attr('id');
           photo_id.push(id);
           
        });

         $.ajax({
		  		type: "POST",
		  		url: "{{ url('admin/product_image_sortable') }}",
		  		data: {
		  			"photo_id": photo_id,
		  			"_token": "{{ csrf_token() }}"
		  		},
		  		dataType: "json",
		  		success: function (data) {
		  			
		  		},
		  		error: function (data) {
		  			// body...
		  		}
		  	});

			}
		});
	});

	 // Summernote
    $('.editor').summernote({
    	height : 100
    });

  //todo list
	var i = 101;
  $('body').delegate('.AddSize', 'click', function(e) {
    
   var html = '<tr id="DeleteSize'+i+'">\n\
								<td>\n\
									<input type="text" name="size['+i+'][name]" placeholder="Nombre" class="form-control">\n\
								</td>\n\
								<td>\n\
									<input type="text" name="size['+i+'][price]" placeholder="Precio" class="form-control">\n\
								</td>\n\
								<td>\n\
									<button type="button" id="'+i+'" class="btn btn-danger DeleteSize">Borrar</button>\n\
								</td>\n\
						  </tr>';
      i++;
		$('#AppendSize').append(html);
  });	

  $('body').delegate('.DeleteSize', 'click', function() {
    var id = $(this).attr('id');
    $('#DeleteSize'+id).remove();
  });

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