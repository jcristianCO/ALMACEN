@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')
<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<div class="form-group ">
			<a href="{{ url()->previous()}}" class="float-right">
				<button class="btn btn-danger btn-block">VOLVER</button>
			</a>
			</div>
		</div>		
		</div>
		<div class="col-md-12 col-xs-12">
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			
			<form action="{{ route('entradas.store') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
				<div class="card">
				<div class="card-body">
				<div class="row">
				<div class="col-md-4">
				<div class="form-group">
                  <label>Proveedor</label>
                  <select autofocus class="form-control" style="width:100%;"  name="id_proveedor" id="id_proveedor">
                
                  </select>
				  
                </div>
					<!-- <div class="form-group">
						<label for="proveedor">Proveedor</label>
						<select name="id_proveedor" id="id_proveedor"  style="width: 100%;" class="form-control">
						</select>
					</div> -->
				</div><!-- fin col-md-3 -->
				
                <div class="col-md-2">
					<div class="form-group">
						<label for="tipo_comprobante">fecha registro</label>
						<input type="text" value="<?php echo date('d-m-y'); ?>" readonly="true" disabled name="fecha" id="fecha" class="form-control">
						</div>
				</div><!-- fin col-md-3 -->
				<div class="col-md-2">
					<div class="form-group">
						<label for="serie_comprobante">Lote</label>
						<input type="text" name="lote" id="lote" class="form-control" placeholder="Lote" value="{{ old('lote') }}">
					</div>
				</div><!-- fin col-md-3 -->
				<div class="col-md-2">
					<div class="form-group">
						<label for="serie_comprobante">Orden de Compra</label>
						<input type="text" name="orden" id="orden" class="form-control" placeholder="orden de compra" value="{{ old('orden') }}">
					</div>
				</div><!-- fin col-md-3 -->
				<div class="col-md-2">
					<div class="form-group">
						<label for="num_comprobante">Número de factura</label>
						<input type="text" name="num_proforma"  id="num_proforma"class="form-control" placeholder="Número factura" value="{{ old('num_comprobante') }}" required>
					</div>
				</div><!-- fin col-md-3 -->
				</div><!-- fin row cabecera -->	
	</div>

	</div>

	<div class="card">
				<div class="card-body">
			<div class=row>
						<div class="col-md-4 ">
						<div class="form-group">
                  <label>ALMACEN Producto</label>
                  <select class="form-control" style="width:100%;"  name="id_prods" id="id_prods">
                
                  </select>
				  <input type="hidden" name="id_producto"  id="id_producto">
                </div>
						</div>
						<div class="col-md-2"> 
							<div class="form-group">
								<label for="pcantidad">CODIGO ALMACEN</label>
								<input type="number" name="codpros" id="codpros" class="form-control" disabled>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="pprecio_compra">Cantidad</label>
								<input type="number" name="cantidada" id="cantidada" class="form-control" placeholder="Cantidad">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label for="pprecio_venta">Precio Unitario</label>
								<input type="number" name="precio_u" id="precio_u" class="form-control" placeholder="Precio ">
							</div>
						</div>
						
						
						<div class="col-md-2 ">
						<div class="form-group">
                  <label>CODIGO SIGMA</label>
                  <select class="form-control" style="width:100%;"  name="id_sigmas" id="id_sigmas">
                
                  </select>
				  <input type="hidden" name="id_sigma"  id="id_sigma">
                </div>
						</div>
						<div class="col-md-10">
							<div class="form-group">
								<label for="pprecio_venta">ITEM SIGMA ASIGNADO</label>
								<textarea rows="2" name="sigma" id="sigma" class="form-control" disabled></textarea>
							</div>
						</div>
						<div class="col-sm-2 text-center d-flex justify-content-center">
							<div class="form-group text-center d-flex justify-content-center">
								<button type="button" id="bt_add" class="btn btn-primary">
									Agregar
								</button>
							</div>
						</div>
	</div>
						<div class="col-md-15">
							<table id="detalles" class="table table-striped table-bordered table-hover table-condensed" style="margin-top: 10px;border: 1px solid black;display:table; border-collapse:collapse;">
								<thead style="background-color: #A9D0F5">
									<th >Opciones</th>
									<th >Codigo</th>
									<th class="col-md-4">Artículo</th>
									<th >Cantidad</th>
									<th >Precio</th>
									<th >Cod. Sigma</th>
									<th lass="col-md-2">Subtotal Bs.</th>
								</thead>
								<tfoot>
									<th >Total</th>
									<th ></th>
									<th ></th>
									<th ></th>
									<th ></th>
									<th ></th>
									<th ><h4 id="total">0.00</h4></th>
								</tfoot>
								<tbody>
									
								</tbody>
							</table>
						</div>

			
	</div>
	</div>
				<div class="row">
				<div class="col-md-12" id="guardar">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">
							Guardar
						</button>
					</div>
				</div>
				</div><!-- fin row buttons -->
			</form>

		</div>
		</div>
	@endsection
	@section('js')
	<script src={{ asset('js/jquery-3.4.1.js')}}></script>
	{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
	<script src={{ asset('js/4.0.10_select2.js')}}></script>



	<script type="text/javascript">
	 $('#id_proveedor').select2({
		theme: 'bootstrap4',

        placeholder: '---SELECCIONAR---',
        ajax: {
            url: '/ajax-auto',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.razon_social,
                            id: item.id
                        }
                    })
                };
            },
           
        }
    });

	</script>
	<script type="text/javascript">
	 $('#id_prods').select2({
		theme: 'bootstrap4',

        placeholder: '---SELECCIONAR---',
        ajax: {
            url: '/ajax-auto1',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
							text1: item.codpro,
							text: item.descripcion
                           
                        }
                    })
                };
            },
            cache: true
        }
    });
	$('#id_prods').on("select2:select", function (e) {
		$('#codpros').val(e.params.data.text1);
		$('#id_producto').val(e.params.data.id);

 
 });

	</script>
	<script type="text/javascript">
	 $('#id_sigmas').select2({
		theme: 'bootstrap4',

        placeholder: '---SELECCIONAR---',
        ajax: {
            url: '/ajax-auto2',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                           id: item.descripcionsigma,
                            text: item.codprosigma,
							text1:item.id
                        }
                    })
                };
            },
            cache: true
        }
	});
		$('#id_sigmas').on("select2:select", function (e) {
		$('#sigma').html(e.params.data.id);
		$('#id_sigma').val(e.params.data.text1);
    });

	</script>
	<script>
	
	$(document).ready(function(){
		$("#bt_add").click(function(){
			agregar();
		});
	});

	var cont = 0;
	var total = 0;
	var subtotal = [];

	//Cuando cargue el documento
	//Ocultar el botón Guardar
	//$("#guardar").hide();

	function agregar(){
		//Obtener los valores de los inputs
		codproa = $("#codpros").val();
		proda = $("#id_prods option:selected").text();
		//cantidad = $("#cantidada").val();
				cantidad = $("#cantidada").val();

		precio_unitario = $("#precio_u").val();
		sigma_cod = $("#id_sigmas option:selected").text();
		id_productos=$("#id_producto").val();
		id_sigmas=$('#id_sigma').val();
		console.log(id_sigmas);
		//Validar los campos
		if(codproa != "" && proda != "" && cantidad > 0 && precio_unitario != "" && sigma_cod!= ""){

			//subtotal array inicie en el indice cero
			subtotal[cont] = (cantidad * parseFloat(precio_unitario));
			total = (parseFloat(total)+ (parseFloat(subtotal[cont])));

			var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input  class = "form-control input-sm" readonly type="hidden" name="ids_producto[]" id="ides_producto[]" value="'+id_productos+'">'+codproa+'</td><td><input class = "form-control input-sm" type="text" name="proda[]" id="proda[]" value="'+proda+'" readonly></td><td><input class = "form-control input-sm" type="number" name="cantidad[]" id="cantidad[]"value="'+cantidad+'" readonly></td><td ><input class = "form-control input-sm"  type="number" name="precio_unitario[] id="precio_unitario[]" value="'+precio_unitario+'" readonly></td><td ><input class = "form-control input-sm"  type="number" name="sigma_cod[]" id="sigma_cod[]" value="'+id_sigmas+'" readonly>'+sigma_cod+'</td><td class="col-mod-2">'+(subtotal[cont]).toLocaleString('de-DE')+'</td></tr>';

			cont++;
			limpiar();
			$("#total").html("Bs." + (total).toLocaleString('de-DE'));
			//evaluar();
			$("#detalles").append(fila);
		}else{
			alert("Error al ingresar el detalle del ingreso, revise los datos del artículo");
		}
	}

	function limpiar(){
		$("#id_prods").val(null).trigger('change.select2');
		$("#id_sigmas").val(null).trigger('change.select2');
		//$("#id_prod").select2("destroy").select2()
		//$("#id_prod option:selected").text("");
		$("#codpros").val("");
		$("#cantidada").val("");
		$("#precio_u").val("");
		$("#sigma").html("");
	}

	//Muestra botón guardar
	/* function evaluar(){
		if(total > 0){
			$("#guardar").show();
		}else{
			$("#guardar").hide();
		}
	} */

	function eliminar(index){
		total = total-subtotal[index];
		$("#total").html("Bs." + total);
		$("#fila" + index).remove();
		evaluar();
	}

	</script>
	@endsection


	@section('css')

	<link rel="stylesheet" href={{ asset('css/4.0.10_select2.css')}} />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" /> --}}
<link rel="stylesheet" href={{ asset('css/select2-bootstrap4.css')}}>





	@stop
	
