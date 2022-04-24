@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
		
                <div class="col-md-12">
                    @can('almacen-create')
                    <div class="form-group pull-right">
                    
                      <a href="productos/create">  <button class="btn btn-success" > <i class="fa fa-plus-circle"></i> CREAR ITEM ALMACEN</button></a>
                    
                    </div>
                    @endcan
                </div>		
            </div>
   <table class="table table-bordered data-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>CODIGO</th> 
                <th >DESCRIPCION</th>
                <th>CANT.MINIMA</th>
                <th>UNIDAD</th>
                <th >ACCIONES</th>
            </tr>
        </thead>
        <tbody>
           {{--  @include('producto.modal') --}}
        </tbody>
    </table>
</div>
<div class="modal  fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title" id="modelHeading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
              
                <form name="datosForm" id="datosForm"  class="form-horizontal"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group row">
                        <label for="Codigo" class="col-md-2 col-form-label text-md"><strong>Codigo</strong></label>
                        <div class="col-md-4">
                            <input id="codpro" type="number" class="form-control" name="codpro" placeholder="CODIGO">
                        </div>
                    </div>
                    <div class="form-group row">
                       
                        <label for="Nombre Completo" class="col-md-2 col-form-label text-md"><strong>Item</strong></label>
                        <div class="col-md-10">
                            <input id="descripcion" type="text" class="form-control" name="descripcion" placeholder="ITEM">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cargo" class="col-md-2 col-form-label text-md"><strong>Cant.Min.</strong></label>
                        <div class="col-md-4">
                            <input id="cantmin" type="text" class="form-control" name="cantmin" value="20" readonly>
                        </div>
                        <label for="carnet" class="col-md-2 col-form-label text-md"><strong>N° de Carnet</strong></label>
                        <div class="col-md-4">
                            <input id="unidad" type="text" class="form-control" name="unidad" placeholder="UNIDAD">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<!-- modal body end -->
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
      { className: "dt-center", "targets": [0,1,3,4] },
      
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
        ajax: "{{ route('productos.index') }}",
        
       columns:[        
            {data: 'id', name: 'id'},
            {data: 'codpro', name: 'codpro'},
            {data: 'descripcion', name: 'descripcion'},
            {data: 'cantmin', name: 'camtmin'},
          {data: 'unidad', name: 'unidad'},
            {data: 'action', name: 'action'},
            
            

            
          
       ]
        
    });
    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
    $('#nuevo').click(function () {
                        $('#saveBtn').val("create");
                        $('#id').val('');
                       // $('#deposito_id').removeAttr('disabled');
                        $('#datosForm').trigger("reset");
                        $('#modelHeading').html("Registro Nuevo");
                        $('#ajaxModel').modal('show');
                    });
                    //guardar datos del deposito
                    $('#saveBtn').click(function(e) {
                        e.preventDefault();
                        console.log($('#datosForm').serialize());
                        $.ajax({
                            data: $('#datosForm').serialize(),
                            
                            url: "{{ route('productos.store') }}",
                            type: "POST",
                            dataType: 'json',
                            success: function (data) {
                                $('#datosForm').trigger("reset");
                                $('#ajaxModel').modal('hide');
                                swal(
            "Realizado!",
            "Producto eliminado!",
            "success"
            ),
                               // Swal.fire(data.titulo, data.mensaje, data.tipo);
                               $('.data-table').DataTable().ajax.reload();
                            },
                            error:function (data) {
                                //console.log(data);
                                console.log('Error:', data);
                            }
                        });
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
          text: 'Desea eliminar el ITEM\n'+id[1],
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
         
         url: '/productos/'+id[0],
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
   /*  $(function () {
var deleteID;
        $('body').on('click', '#getDeleteId', function(){
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteArticleForm').click(function(e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               type:"POST",
               url: '/productos/'+id,
               
                method: "DELETE",
                success: function(result) {
                    $('#DeleteArticleModal').hide();
                    
                }
            });
        });
    });
 */
</script>
@stop