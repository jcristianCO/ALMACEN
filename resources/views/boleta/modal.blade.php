
@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')
<div class="card">
	<div class="card-body">
		<div class="row">
		
			
				
					@foreach($salida as $salidas)
					<div class="col-md-12">
					<div class="form-group">
						<label for="serie_comprobante">UNIDAD EDUCATIVA</label>
						<input type="text" readonly class="form-control" placeholder="orden de compra" value="{{ $salidas->ue}}">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="fecha">SIE</label>
						<input type="text" readonly class="form-control" placeholder="orden de compra" value="{{ $salidas->sie}}">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="orden">DISTRITO</label>
						<input type="text" readonly class="form-control" placeholder="orden de compra" value="{{ $salidas->distrito}}">
					</div>
				</div>
					<div class="col-md-4">
					<div class="form-group">
						<label for="serie_comprobante">FECHA</label>
						<input type="text" readonly class="form-control" placeholder="orden de compra" value="{{ $salidas->fecha}}">
					</div>
				</div>
				@endforeach
					
		</div>
	</div>
</div>


							 <div class="card">
							 <div class="card-body">
								<h5 class="text-center" id="demoModalLabel">DETALLES</h5>	
							 <table id="table"  class="table table-bordered data-table" class="display" style="width:100%">
								
								<thead>
									<th class="text-center">Item</th>
									<th class="text-center">Cantidad</th>
									<th class="text-center">Precio</th>
									<th class="text-center">SubTotal (Bs.)</th>
								</thead>
								<tbody>
							 @foreach($data as $datas)
							 <tr>
								<td class="text-left">{{$datas->descripcion}}</td>
							   <td class="text-center">{{$datas->cantidad_salidas}}</td>
							   <td class="text-center">{{number_format($datas->precio_salidas, 2, ',', '.')}}</td>
							   {{-- <td class="text-center">{{$datas->precio_ingresos}}</td> --}}
							    {{-- <td class="text-center">{{number_format($datas->total, 2, ',', '.')}}</td>  --}}
							    <td class="text-center">{{($datas->total)}}</td> 
							   
							 
							 </tr>
						 @endforeach
						
						</tbody>
						<tfoot class="text-center">
							<tr bgcolor="#5D7B9D">
							<th colspan="3" style="text-align:right">Total:</th>
							<th></th>
						
							</tr>
							<tr>
								
								<th colspan="4" style="text-align:right"></th>
								</tr>
						</tfoot>
					</table>
					
				{{-- 		</div>
						<div class="modal-body">
								Welcome, Websolutionstuff !!
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" 
							data-dismiss="modal">Cerrar</button>
								
						</div>
					</div>
				</div>
			</div> --}}
			<div class="row">
		
				<div class="col-md-12">
					<div class="form-group pull-right">
					<a href="{{ url()->previous()}}" class="ml-auto">
						<button class="btn btn-danger">VOLVER</button>
					</a>
					</div>
				</div>		
			</div>
	</div>
	
	
	{{-- <div class="form-group">
		<a  class="btn btn-danger btn-sm" href="{{ url()->previous()}}">VOLVER</a>
		</div> --}}
</div>
			@endsection
			@section('css')
			<link rel="stylesheet" href={{ asset('css/4.1.3_bootstrap.css') }} />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}

<link rel="stylesheet" href={{ asset('css/1.11.3_dataTables.bootstrap4.css') }} />
{{-- <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}

			@stop
			
			@section('js')
			<script src={{ asset('js/jquery-3.4.1.slim.js') }}></script>
{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
<script src={{  asset('js/4.4.1_bootstrap.js')}} ></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}

<script src={{  asset('js/1.9.1_jquery.js')}}></script>  
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}  

<script src={{ asset('js/1.19.0_jquery.validate.js') }}></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}

<script src={{ asset('js/1.11.3_jquery.dataTables.js')}}></script>
{{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}

<script src={{ asset('js/4.1.3_bootstrap.js')}}></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}

<script src={{ asset('js/1.11.3_dataTables.bootstrap4.js')}}></script>
			{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
			<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
			<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> --}}
			<script type="text/javascript"> 
			$(document).ready(function() {
				$('#table').DataTable( {
					"language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
           
        },

    
 
					"footerCallback": function ( row, data, start, end, display ) {
						var api = this.api();
			 
						// Remove the formatting to get integer data for summation
						var intVal = function ( i ) {
							return typeof i === 'string' ?
								i.replace(/[\$,]/g, '')*1 :
								typeof i === 'number' ?
									i : 0;
						};
			 
						// Total over all pages
					/* 	total = api
							.column( 3)
							.data()
							.reduce( function (a, b) {
								return intVal(a) + intVal(b);
							}, 0 ); */
			 
						// Total over this page7
						var numFormat = $.fn.dataTable.render.number(  '.', ',', 2, ' Bs. ').display;
						pageTotal = api
							.column( 3, { page: 'current'} )
							.data()
							.reduce( function (a, b) {
								return (parseFloat((a)) + parseFloat((b)));
							}, 0 );
							pageTotal1 = api
							.column( 2, { page: 'current'} )
							.data()
							.reduce( function (a, b) {
								return (parseFloat((a)) + parseFloat((b)));
							}, 0 );
			 
						// Update footer
						$( api.column( 3 ).footer() ).html(numFormat(pageTotal)
						
						
						);
						/* $( api.column( 2 ).footer() ).html(numFormat(pageTotal1)
						
						
						); */
						/* $(this.api().column(4).footer()).html(); */
						 $('tr:eq(1) th:eq(0)', api.table().footer()).html(NumeroALetras(pageTotal)); 
					}
				} );
			
		
function Unidades(num){
 
	switch(num)
	{
	  case 1: return "UN";
	  case 2: return "DOS";
	  case 3: return "TRES";
	  case 4: return "CUATRO";
	  case 5: return "CINCO";
	  case 6: return "SEIS";
	  case 7: return "SIETE";
	  case 8: return "OCHO";
	  case 9: return "NUEVE";
	}
   
	return "";
  }
   
  function Decenas(num){
   
	decena = Math.floor(num/10);
	unidad = num - (decena * 10);
   
	switch(decena)
	{
	  case 1:
		switch(unidad)
		{
		  case 0: return "DIEZ";
		  case 1: return "ONCE";
		  case 2: return "DOCE";
		  case 3: return "TRECE";
		  case 4: return "CATORCE";
		  case 5: return "QUINCE";
		  default: return "DIECI" + Unidades(unidad);
		}
	  case 2:
		switch(unidad)
		{
		  case 0: return "VEINTE";
		  default: return "VEINTI" + Unidades(unidad);
		}
	  case 3: return DecenasY("TREINTA", unidad);
	  case 4: return DecenasY("CUARENTA", unidad);
	  case 5: return DecenasY("CINCUENTA", unidad);
	  case 6: return DecenasY("SESENTA", unidad);
	  case 7: return DecenasY("SETENTA", unidad);
	  case 8: return DecenasY("OCHENTA", unidad);
	  case 9: return DecenasY("NOVENTA", unidad);
	  case 0: return Unidades(unidad);
	}
  }//Unidades()
   
  function DecenasY(strSin, numUnidades){
	if (numUnidades > 0)
	  return strSin + " Y " + Unidades(numUnidades)
   
	return strSin;
  }//DecenasY()
   
  function Centenas(num){
   
	centenas = Math.floor(num / 100);
	decenas = num - (centenas * 100);
   
	switch(centenas)
	{
	  case 1:
		if (decenas > 0)
		  return "CIENTO " + Decenas(decenas);
		return "CIEN";
	  case 2: return "DOSCIENTOS " + Decenas(decenas);
	  case 3: return "TRESCIENTOS " + Decenas(decenas);
	  case 4: return "CUATROCIENTOS " + Decenas(decenas);
	  case 5: return "QUINIENTOS " + Decenas(decenas);
	  case 6: return "SEISCIENTOS " + Decenas(decenas);
	  case 7: return "SETECIENTOS " + Decenas(decenas);
	  case 8: return "OCHOCIENTOS " + Decenas(decenas);
	  case 9: return "NOVECIENTOS " + Decenas(decenas);
	}
   
	return Decenas(decenas);
  }//Centenas()
   
  function Seccion(num, divisor, strSingular, strPlural){
	cientos = Math.floor(num / divisor)
	resto = num - (cientos * divisor)
   
	letras = "";
   
	if (cientos > 0)
	  if (cientos > 1)
		letras = Centenas(cientos) + " " + strPlural;
	  else
		letras = strSingular;
   
	if (resto > 0)
	  letras += "";
   
	return letras;
  }//Seccion()
   
  function Miles(num){
	divisor = 1000;
	cientos = Math.floor(num / divisor)
	resto = num - (cientos * divisor)
   
	strMiles = Seccion(num, divisor, "MIL", "MIL");
	strCentenas = Centenas(resto);
   
	if(strMiles == "")
	  return strCentenas;
   
	return strMiles + " " + strCentenas;
   
	//return Seccion(num, divisor, "UN MIL", "MIL") + " " + Centenas(resto);
  }//Miles()
   
  function Millones(num){
	divisor = 1000000;
	cientos = Math.floor(num / divisor)
	resto = num - (cientos * divisor)
   
	strMillones = Seccion(num, divisor, "UN MILLON", "MILLONES");
	strMiles = Miles(resto);
   
	if(strMillones == "")
	  return strMiles;
   
	return strMillones + " " + strMiles;
   
	//return Seccion(num, divisor, "UN MILLON", "MILLONES") + " " + Miles(resto);
  }//Millones()
   
  function NumeroALetras(num,centavos){
	var data = {
	  numero: num,
	  enteros: Math.floor(num),
	  centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
	  letrasCentavos: "",
	};
	if(centavos == undefined || centavos==false) {
	  data.letrasMonedaPlural="BOLIVIANOS";
	  data.letrasMonedaSingular="BOLIVIANO";
	}else{
	  data.letrasMonedaPlural="CENTAVOS";
	  data.letrasMonedaSingular="CENTAVOS";
	}
   
	if (data.centavos > 0)
	  data.letrasCentavos = "CON " + NumeroALetras(data.centavos,true);
   
	if(data.enteros == 0)
	  return "CERO " + data.letrasMonedaPlural + " " + data.letrasCentavos;
	if (data.enteros == 1)
	  return Millones(data.enteros) + " " + data.letrasMonedaSingular + " " + data.letrasCentavos;
	else
	  return Millones(data.enteros) + " " + data.letrasMonedaPlural + " " + data.letrasCentavos;
  }//NumeroALetras()
} );
</script>

			@stop	