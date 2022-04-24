@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="col-md-2 text-left ">
                <div class="form-group">
                    
                <a class="text-left">
                    <button id="inv" name="inv" class="btn btn-primary"> <i class="fas fa-file-pdf"></i> GENERAR PDF</button>
                </a>
                </div>
                  </div>
   <table class="table table-bordered data-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                
                <th class="text-center">ITEM</th> 
                <th class="text-center">LOTE</th> 
                <th class="text-center">PRECIO</th> 
                <th class="text-center">ENTRADA</th>
                <th class="text-center">SALIDA</th>
                <th class="text-center">SALDO</th>

                
            </tr>
        </thead>
        <tbody>
           {{--  @include('producto.modal') --}}
        </tbody>
    </table>
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
        "columnDefs": [
      { className: "dt-center", "targets": [0,2,3,4,5,6] },
      
    ],
     /*    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": true, */
    "order": [[ 0, "desc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
           
        },
        
        deferRender:    true,
            scrollY:        600,
            scrollCollapse: true,
            scroller:       true,
       /*  processing: true,
        serverSide: true, */
        ajax: "{{ route('inventario.index') }}",
       columns:[        
            {data: 'id', name: 'id'},
            
            {data: 'descripcion', name: 'descripcion'},
            {data: 'lote', name: 'lote'},
            {data: 'precio_ingresos', name: 'precio_ingresos'},
            
            {data: 'entrada', name: 'entrada'},
            {data: 'salida', name: 'salida'},
          {data: 'stock', name: 'stock'},
        
            
            
     
            
          
       ],
       createdRow: (row, data, dataIndex, cells) => {
        $(cells[4]).css('background-color', '#90EE90'),
        $(cells[5]).css('background-color', '#FF7152'),
        $(cells[6]).css('background-color', '#00BFFF')
          }
        
    });


});

</script>
<script type="text/javascript">
    $('#inv').on('click', function() {
      /* let id = $("#buscar_distrito :selected").val(); */
      /* let hoy = new Date();
      let fecha = hoy.getDate() +'-'+(hoy.getMonth() + 1) +'-'+ hoy.getFullYear();
      let hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds(); */
      window.location.href = "{{URL::to('reporteinv/pdf')}}" ;
    });
    </script>
@stop