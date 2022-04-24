@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')

<div class="card">
	<div class="card-body">
<div class="row">
		
	<div class="col-md-12">
		@can('boleta-create')
		<div class="form-group pull-right">
		<a href="boleta/create" class="ml-auto">
			<button class="btn btn-success"> <i class="fa fa-plus-circle"></i> CREAR BOLETA</button>
		</a>
		</div>
		@endcan
	</div>		
</div>
<div id="refrescar">
	<table class="table table-bordered data-table" class="display" style="width:100%">
        
            <tr>
					<thead>
						<th>Nº</th>
						<th>UNIDAD EDUCATIVA</th>
						<th>FECHA</th>
						<th>TOTAL</th>
						
					
						
						<th class="text-center" width="450">OPCIONES</th>
						
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
</div>
@endsection
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
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
  
<script type="text/javascript">

  $(function cargar () {
    
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
        ajax: "{{ route('boleta.index') }}",
       	columns:[        
            {data: 'id', name: 'id'},
            {data: 'ue', name: 'ue'},
			{data: 'fecha', name: 'fecha '},
			{data: 'total', name: 'total'},
            {data: 'action', name: 'action'}, 
        ]
        
    });
});
</script>
<script type="text/javascript">
/* 	$(document).ready(function()
	{
		setTimeout(function (){location.reload(1);},3000);
	}) */
	$(document).ready(function() {
var pageRefresh = 10000; //5 s
setInterval(function() {
refresh();
}, pageRefresh);
});

// Functions

function refresh() {
	$('.data-table').DataTable().ajax.reload();
/* $('#refrescar').load(location.href + " #refrescar"); */

}
</script>	
@stop