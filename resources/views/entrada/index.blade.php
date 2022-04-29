@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')
<div class="container">
	@if (\Session::has('success'))
	<div class="alert alert-success">
		<p>{{ \Session::get('success') }}</p>
	</div>
@endif
    <div class="card">
		<div class="card-body">
<div class="row">
		
	<div class="col-md-12">
		@can('entrada-create')
		<div class="form-group pull-right">
		<a href="entradas/create" class="ml-auto">
			<button class="btn btn-success"> <i class="fa fa-plus-circle"></i> CREAR INGRESO</button>
		</a>
		</div>
		@endcan
	</div>		
</div>

	<table class="table table-bordered data-table" class="display" style="width:100%">
        
            <tr>
					<thead>
						<th>ID</th>
						<th>PROVEEDOR</th>
						<th>FECHA</th>
						<th>ORDEN</th>
						<th>FACTURA</th>
						<th>TOTAL</th> 					
						<th width="250">OPCIONES</th>
						
					</thead>
					</tr>
					<tbody>
					
        </tbody>	
				</table>
			</div>
		
		</div>
	</div>
</div>
{{-- <div class="modal fade" id="demoModal" name="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="demoModalLabel">Modal Example - 
                             Websolutionstuff</h5>
								
						</div>
						<div  class="modal-body">
							<div id="inputs" >
							
							</div>
						</div>
						<div class="modal-footer">
							<a class="btn btn-primary btn-sm" href="#" onclick="cerrando()" id="cerrar" name="cerrar"type="button" 
							>Cerrar</a>
								
						</div>
					</div>
				</div>
			</div> --}}

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

{{-- <script src={{  asset('js/1.9.1_jquery.js')}}></script>   --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}  

<script src={{ asset('js/1.19.0_jquery.validate.js') }}></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}

<script src={{ asset('js/1.11.3_jquery.dataTables.js')}}></script>
{{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}

<script src={{ asset('js/4.1.3_bootstrap.js')}}></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}

<script src={{ asset('js/1.11.3_dataTables.bootstrap4.js')}}></script>
{{-- <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> --}}

<script src={{ asset('js/2.1.2_sweetalert.js')}}></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> --}}
  
<script type="text/javascript">

  $(function () {
    
    var table = $('.data-table').DataTable({

    "order": [[ 2, "desc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
           
        },
        
        processing: true,
        serverSide: true,
        ajax: "{{ route('entradas.index') }}",
       	columns:[   
			{data: 'id', name: 'id'},     
			{data: 'razon_social', name: 'razon_social'},
			{data: 'fecha', name: 'fecha'},
			{data: 'orden_compra', name: 'orden_compra'},
			{data: 'num_proforma',name: 'num_proforma'},  
			{data: 'total', name: 'total',render: $.fn.dataTable.render.number('.', ',', 2, '')},
           
            {data: 'action', name: 'action'}, 
        ]
       
    });
	$('body').on('click', '.deleteProduct', function () {
     
     var product_id = $(this).data("id");
	// var product = $(this).data("descripcion");
	console.log(product_id)
     event.preventDefault();
	 var id=product_id.split(",");
      const url = $(this).attr('href');
      swal({
          title: 'Estas Seguro?',
          text: 'Desea eliminar la Entrada del Proveedor\n['+id[1]+']\ncon Monto\n['+id[2]+']',
          icon: 'warning',
          buttons: ["Cancel", "Eliminar"],
          }).then(function(value) {
          if (value) {
          window.location.href = url;
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
     $.ajax({
         type: "DELETE",
         
         url: '/entradas/'+id[0],
         success: function (data) {
			 //console.log(data);
			 swal(
            "Realizado!",
            "Entrada eliminada!",
            "success"
            ),
            $('#D').hide();
            $('.data-table').DataTable().ajax.reload();
            // table.draw();
             //return redirect()->route('productos.index')->with('success','Eliminado.'); 
         },
         error: function (data) {
             console.log('Error:', data);
         }
     });
        }
    });
     //confirm("Are You sure want to delete !");
     
 });
});
</script>
{{-- <script type="text/javascript">
 $('body').on('click', '.detalleshow', function (e) {
      var Customer_id = $(this).data('id');
	  console.log(Customer_id);
	  //$('#inputs').append();
	  
      $.get('/entradas/'+Customer_id, function (data) {
		console.log(data);
      /*     $('#modelHeading').html("Edit Customer");
          $('#saveBtn').val("edit-user"); */
          $('#demoModal').modal('show');

		  var tamaño= data.length;   //max de 10 campos

//var x = 0;

		 e.preventDefault();      //prevenir novos clicks
		// var i = 0; i < miArray.length; i+=1
		for (x=0;x < tamaño;x+=1) {
				$('#inputs').append('<div>\
						<input class="form-control" type="text" id="name[]" name="name[]" value="'+data[x].descripcion+'"></div>');
						
				//x++;
		}
		//data=[];
		//para borrar todos los datos que tenga los input, textareas, select.
		//$("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
	});
         // $('#Customer_id').val(data.id);
          //$('#name').val(data[0].descripcion);
          //$('#detail').val(data.detail);
      });
   
	

</script> --}}
{{-- <script type="text/javascript">
function cerrando() {
 	var data=$('#name');
/* 	$('#name').each(function(index,value) {
        
		console.log(index+""+value);
    }); */
	//let theArray= $('#name') */

/* theArray.forEach((element) => {
  // Use the element of the array
  console.log(element)
} */
	console.log(data);
	$('#demoModal').modal('hide');
	//$('#name').remove();
 /* $('#demoModal').on('hidden.bs.modal', function () {
 	$(this).find('form').trigger('reset');
	 $('#demoModal').modal('hide');

//$('#demoModal').remove();  */
//$('.data-table').DataTable().ajax.reload();
console.log('entro');
//$('#demoModal').modal('hide');

}; 
</script> --}}
@stop