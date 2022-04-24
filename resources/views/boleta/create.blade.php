@extends('adminlte::page')
@section('content')
@include('sweetalert::alert')
<div class="container">
	
			<div class="row">
			<div class="col-md-12 ">
				<div class="form-group ">
				<a href="{{ url()->previous()}}" class="float-right">
					<button class="btn btn-danger">VOLVER</button>
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
		
			</div>
			<form action="{{ route('boleta.store') }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
				<div class="card">
				<div class="card-body">
				<div class="row">
				<div class="col-md-10">
				<div class="form-group">
                  <label>UNIDAD EDUCATIVA</label>
                  <select required class="form-control" style="width:100%;"  name="id_ue" id="id_ue">
                
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
						<input type="date" value="<?php echo date('Y-m-d'); ?>" disabled name="tipo_comprobante" class="form-control">
						</input> 
					</div>
				</div><!-- fin col-md-3 -->
				</div>

</div>
</div>

<div class="card">
				<div class="card-body">
			<div class=row>
						<div class="col-md-5 ">
						<div class="form-group">
                  <label>ALMACEN Producto</label>
                  <select autofocus class="form-control" style="width:100%;"  name="id_prod" id="id_prod">
                
                  </select>
                </div>
						</div>
						
								
								<input type="hidden" name="idpro" id="idpro" class="form-control">
						
						<div class="col-md-2"> 
							<div class="form-group">
								<label for="pcantidad">CODIGO ALMACEN</label>
								<input type="number" name="codpro" id="codpro" class="form-control" readonly>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label for="pprecio_">Cantidad</label>
								<input type="text" name="cantidada" id="cantidada" class="form-control" placeholder="Cant.">
							</div>
						</div>
						<div class="col-sm-1">
							<div class="form-group">
								<label for="pprecio_venta">Stock</label>
								<input type="text"  readonly name="stock" id="stock" class="form-control" >
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label for="pprecio_compra">Unidad</label>
								<input type="text" name="unidad" id="unidad" class="form-control" readonly>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label for="pprecio_compra">Precio</label>
								<input type="text" name="precio_u" id="precio_u" class="form-control" readonly>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label for="pprecio_compra">Lote</label>
								<input type="text" name="lote" id="lote" class="form-control" readonly>
							</div>
						</div>
						
						<div class="col-sm-2">
							<div class="form-group">
								<label for="pprecio_venta">Codigo sigma</label>
								<input type="number"  readonly name="codsigma" id="codsigma" class="form-control" >
							</div>
						
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label for="pprecio_venta">ITEM SIGMA ASIGNADO</label>
								<textarea rows="2" name="sigma" id="sigma" class="form-control" readonly></textarea>
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
						<div class="col-sm-12">
							<table id="detalles" class="table table-striped table-bordered table-hover table-condensed" style="margin-top: 10px">
								<thead style="background-color: #A9D0F5">
									<th>Opciones</th>
									<th class="col-md-1">CODIGO</th>
									<th class="col-md-7">ITEM</th>
									<th class="col-md-1">UNIDAD</th>
									<th class="col-md-1">CANTIDAD</th>
									<th class="col-md-1">PRECIO</th>
									<th class="col-md-1">LOTE</th>
									<th class="col-md-2">SUBTOTAL</th>
								</thead>
								<tfoot>
									<th>TOTAL</th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th><h4 id="total">0.00</h4></th>
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
						<button id="imprimir" name="imprimir" class="btn btn-primary" type="submit">
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
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
<script src={{ asset('js/4.0.10_select2.js')}}></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
<script type="text/javascript">
	 $('#id_ue').select2({
		theme: 'bootstrap4',
	
        placeholder: '---SELECCIONAR---',
        ajax: {
            url: '/ajax-auto3',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.ue,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

	</script>
	<script type="text/javascript">
	//$("#id_prod")[0].focus();
	 $('#id_prod').select2({
		theme: 'bootstrap4',

        placeholder: '---SELECCIONAR---',
        ajax: {
            url: '/ajax-auto4',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.stock,
							text: item.descripcion+'(LOTE ['+item.lote+'])',
							text1: item.codpro,
							text2:item.stock,
							text3:item.codprosigma,
							text4:item.descripcionsigma,
							text5:item.unidad,
							text6:item.precio_ingresos,
							text7:item.lote,
							text8:item.id

                        }
                    })
                };
            },
            cache: true
        }
    });
	$('#id_prod').on("select2:select", function (e) {
		$('#codpro').val(e.params.data.text1);
		$('#stock').val(e.params.data.text2);
		$('#sigma').val(e.params.data.text4);
		$('#codsigma').val(e.params.data.text3);
		$('#unidad').val(e.params.data.text5);
		$('#precio_u').val(e.params.data.text6);
		$('#lote').val(e.params.data.text7);
		$('#idpro').val(e.params.data.text8);


 
 });

	</script>
		<script>
	
	$(document).ready(function(){
		$("#bt_add").click(function(){
			agregar();
		});
	});

	var cont = 0.00;
	var total = 0.00;
	var subtotal = [];

	//Cuando cargue el documento
	//Ocultar el botón Guardar
	$("#guardar").hide();

	function agregar(){
		//Obtener los valores de los inputs
		codproa = $("#codpro").val();
		//proda_rempl=$("#id_prod option:selected").text();
		proda = $("#id_prod option:selected").text();
		cantidad = $("#cantidada").val();
			stock=$('#stock').val();	

		precio_unitario = $("#precio_u").val();
		//sigma_cod = $("#id_sigma option:selected").text();
		unidad= $("#unidad").val();
		lote=$("#lote").val();
		sigma=$("#codsigma").val();
		idpros=$("#idpro").val();
		//Validar los campos
		console.log(cantidad);
			console.log(stock);
		
		if((parseFloat(cantidad) <= parseFloat(stock))){	
		if( codproa != "" && proda != ""  ){

			//subtotal array inicie en el indice cero
			subtotal[cont] = (cantidad * parseFloat(precio_unitario)).toFixed(2);
			total = parseFloat(total) + parseFloat(subtotal[cont]);

			var fila = 
			'<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td>			<td><input class ="form-control input-sm" type="text" name="id_prod[]" value="'+codproa+'" readonly></td> <td><input  class ="form-control input-sm" type="text" name="codpro[]" value="'+proda.replace('(LOTE ['+lote+'])','')+'"  readonly></td><td ><input class = "form-control input-sm"  type="text" name="unidad[]" value="'+unidad+'" readonly></td>			<td><input class = "form-control input-sm" type="text" name="cantidad_salida[]" value="'+cantidad+'" readonly></td> <td><input class = "form-control input-sm" type="text" name="precio_salida[]" value="'+precio_unitario+'" readonly></td>			<td><input class = "form-control input-sm" type="number" name="lote[]" value="'+lote+'" readonly></td>		<input type="hidden" name="sigma[]" value="'+sigma+'"> <input type="hidden" name="prods[]" value="'+idpros+'">			<td>'+subtotal[cont]+'</td></tr>';

			cont++;
			limpiar();
			$("#total").html("Bs." + total);
			evaluar();
			$("#detalles").append(fila);
		}else{
			alert("Error al ingresar el detalle del ingreso, revise los datos del artículo");
		}
		
	}
	 else{
			alert("Cantidad solicitda "+cantidad+" no puede ser mayor al Stock "+stock);
		} 
	}

	function limpiar(){
		$("#id_prod").val(null).trigger('change.select2');
		$("#id_sigma").val(null).trigger('change.select2');
		//$("#id_prod").select2("destroy").select2()
		//$("#id_prod option:selected").text("");
		$("#codpro").val("");
		$("#cantidada").val("");
		$("#precio_u").val("");
		$("#stock").val("");
		$("#unidad").val("");
		$("#codsigma").val("");
		$("#sigma").val("");
		$("#lote").val("");
	}

	//Muestra botón guardar
	function evaluar(){
		if(total > 0){
			$("#guardar").show();
		}else{
			$("#guardar").hide();
		}
	}

	function eliminar(index){
		total = total-subtotal[index];
		$("#total").html("Bs." + total);
		$("#fila" + index).remove();
		evaluar();
	}

</script>
<script type="text/javascript">
</script>
@endsection

@section('css')

<link rel="stylesheet" href={{ asset('css/4.0.10_select2.css')}} />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" /> --}}
<link rel="stylesheet" href={{ asset('css/select2-bootstrap4.css')}}>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"> --}}
@stop
