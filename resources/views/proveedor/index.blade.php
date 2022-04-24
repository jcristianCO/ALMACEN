@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')
<div class="card">
	<div class="card-body">
<div class="row">
	<div class="col-md-12">
        @can('proveedor-create')
		<div class="form-group pull-right">
			<a href="proveedor/create" class="ml-auto">
				<button class="btn btn-success"> <i class="fa fa-plus-circle"></i> CREAR PROVEEDOR</button>
			</a>
		</div>		
        @endcan
	</div>
</div>

	<table class="table table-bordered data-table" class="display" style="width:100%">
        
            <tr>
					<thead>
						<th>ID</th>
						<th>NIT</th>
						<th>RAZON SOCIAL</th>
						<th>DIRECCION</th>
						<th>CELULAR</th>
						<th>CIUDAD</th>
						<th width="150">ACCIONES</th>
						
					</thead>
					</tr>
					<tbody>
					
        </tbody>	
				</table>
			</div>
		
		</div>
	</div>
</div>
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
{{-- <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> --}}

<script src={{ asset('js/2.1.2_sweetalert.js')}}></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> --}}
  
<script type="text/javascript">

  $(function () {
    
    var table = $('.data-table').DataTable({
     /*    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": true, */
	"order": [[ 0, "desc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
           
        },
        
        processing: true,
        serverSide: true,
        ajax: "{{ route('proveedor.index') }}",
       	columns:[        
            {data: 'id', name: 'id'},
            {data: 'nit', name: 'nit'},
            {data: 'razon_social', name: 'razon_social'},
            {data: 'direccion', name: 'direccion'},
          	{data: 'celular', name: 'celular'},
		  	{data: 'ciudad', name: 'ciudad'},
            {data: 'action', name: 'action'},
        ]
        
    });

	$('body').on('click', '.deleteProduct', function () {
     
     var product_id = $(this).data("id");
    // var product = $(this).data("descripcion");
     event.preventDefault();
     var id=product_id.split(",");
     //console.log(product_id);
      const url = $(this).attr('href');
      swal({
          title: 'Estas Seguro?',
          text: 'Desea eliminar el RAZON SOCIAL\n'+id[1],
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
         
         url: '/proveedor/'+id[0],
         success: function (data) {
            swal(
            "Realizado!",
            "Producto eliminado!",
            "success"
            ),
            $('#D').hide();
            console.log(data);
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
@stop