@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')

<div class="card">
	<div class="card-body">
<div class="row text-center">
		
	<div class="h3 text-center"> Reporte Cuantitativo</div>		
</div>

    <div class="card border-primary" >
        <div class="card-body">
            <div class="row">
            <div class="col-md-8">
        <div class="form-group">
            <label>UNIDADE EDUCATIVA</label>
            <select autofocus class="form-control"   name="id_ue" id="id_ue">
          
            </select>
            
          </div>
    </div>
    <div class="col-md-2 text-center mx-auto mt-auto mb-auto">
		<div class="form-group">
            
		
			<button id="btn-buscar" name="btn-buscar" class="btn btn-primary"> <i class="fas fa-search"></i> BUSQUEDA</button>
				</div>
          </div>     
          <div class="col-md-2 text-center mx-auto mt-auto mb-auto">
		<div class="form-group">
            
		<a  class="text-center">
			<button id="ue" name="ue"  class="btn btn-primary"> <i class="fas fa-file-pdf"></i> GENERAR PDF</button>
		</a>
		</div>
          </div>
    </div>
    </div>
</div>	
<div class="card border-primary">
    <div class="card-body">
        <div class="row">
        <div class="col-md-8">
        <div class="form-group">
        <label>UNIDADES EDUCATIVAS DISTRITOS :</label>
        <select autofocus class="form-control"   name="buscar_distrito" id="buscar_distrito">
      <option value="DIST_1">DISTRITO--1</option>
      <option value="DIST_2">DISTRITO--2</option>
      <option value="DIST_3">DISTRITO--3</option>
      <option value="DIST_4">DISTRITO--4</option>
      <option value="DIST_5">DISTRITO--5</option>
      <option value="DIST_6">DISTRITO--6</option>
      <option value="DIST_7">DISTRITO--7</option>
      <option value="DIST_8">DISTRITO--8</option>
      <option>TODOS</option>
      
        </select>
        
      </div>
</div>
<div class="col-md-2 text-center mx-auto mt-auto mb-auto">
    <div class="form-group">
        
    <a  class="text-center mx-auto mt-auto mb-auto">
        <button  id="btn_buscar_distrito" name="btn_buscar_distrito" class="btn btn-primary"> <i class="fas fa-search"></i> BUSQUEDA</button>
    </a>
    </div>
      </div>     
      <div class="col-md-2 text-center mx-auto mt-auto mb-auto">
    <div class="form-group">
        
    <a class="text-center">
        <button id="dis" name="dis" class="btn btn-primary"> <i class="fas fa-file-pdf"></i> GENERAR PDF</button>
    </a>
    </div>
      </div>
      
</div>

    
</div>
</div>
<div class="card border-primary">
	<div class="card-body">
	

	<table class="table table-bordered data-table" class="display" style="width:100%" id="inicial">
        
            
					<thead>
            <th width="5%">Nº</th>
						<th width="55%">UNIDAD EDUCATIVA</th>
						<th width="20%">FECHA</th>
             <th width="20%">TOTAL</th> 
            
            
				{{-- 		<th>DISTRITO</th>
            <th>FECHA</th>
						<th>TOTAL</th> --}}
						
					
						
						
            </tr>
					</thead>
				
					<tbody>
					
        </tbody>	
        <tfoot class="text-center">
          <tr bgcolor="#5D7B9D">
          <th colspan="3" style="text-align:right">Total:</th>
          <th></th>
        
          </tr>
          
        </tfoot>
				</table>
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
<link rel="stylesheet" href={{ asset('css/4.0.10_select2.css')}} />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" /> --}}
<link rel="stylesheet" href={{ asset('css/select2-bootstrap4.css')}}>
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
 {{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>  --}}

<script src={{ asset('js/4.1.3_bootstrap.js')}}></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}

<script src={{ asset('js/1.11.3_dataTables.bootstrap4.js')}}></script>
{{-- <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> --}}ç
 {{-- <script src={{ asset('js/jquery-3.4.1.js')}}></script>   --}}
{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
<script src={{ asset('js/4.0.10_select2.js')}}></script>

{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
 --}}
  

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

$(function () {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      const table = $('#inicial').DataTable();

      //btn buscar distrito
      var x = 1;
      $('#btn-buscar').on('click', function() {
          $("#inicial").dataTable().fnDestroy(); 
           let id = $("#id_ue :selected").val();
          console.log(id); 
          
          $('#inicial').DataTable({
        /*     dom: "Blfrtip",
                buttons: [
                    
                    {
                        text: 'pdf',
                        extend: 'pdfHtml5',
                    }], */
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
           
        },
            'iDisplayLength':100,
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
							
			 
						// Update footer
						$( api.column( 3 ).footer() ).html(numFormat(pageTotal)
						
						
						);
						/* $( api.column( 2 ).footer() ).html(numFormat(pageTotal1)
						
						
						); */
						/* $(this.api().column(4).footer()).html(); */
						 $('tr:eq(1) th:eq(0)', api.table().footer()).html(pageTotal); 
					},
				
            "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        
        "order": [[ 0, 'asc' ]],
            columns: [
              {
                    "render": function() {
                        return x++;
                    }
                },
              {name: "ue", data: "ue"},
                {name: "fecha", data: "fecha"},
                 {name: "total", data: "total"} 
                
            ],
            ajax:{   
              data: { distrito : id },                
                url: '/buscar',  
                "dataSrc": ""
            }
         
              });
              table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, x) {
            cell.innerHTML = x+1;
        } );
    } ).draw();
    x=1;
      });


  });
</script>
<script type="text/javascript">
$('#ue').on('click', function() {
  let id = $("#id_ue :selected").val();
  /* let hoy = new Date();
  let fecha = hoy.getDate() +'-'+(hoy.getMonth() + 1) +'-'+ hoy.getFullYear();
  let hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds(); */
  window.location.href = "{{URL::to('reporte/pdf')}}/" +id;
});
</script>
<script type="text/javascript">

  $(function () {
  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  
        const table = $('#inicial').DataTable();
  
        //btn buscar distrito
        var x = 1;
        $('#btn_buscar_distrito').on('click', function() {
            $("#inicial").dataTable().fnDestroy(); 
             let id = $("#buscar_distrito :selected").val();
            console.log(id); 
            
            $('#inicial').DataTable({
          /*     dom: "Blfrtip",
                  buttons: [
                      
                      {
                          text: 'pdf',
                          extend: 'pdfHtml5',
                      }], */
              "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
             
          },
          'iDisplayLength':100, 
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
							
			 
						// Update footer
						$( api.column( 3 ).footer() ).html(numFormat(pageTotal)
						
						
						);
						/* $( api.column( 2 ).footer() ).html(numFormat(pageTotal1)
						
						
						); */
						/* $(this.api().column(4).footer()).html(); */
						 $('tr:eq(1) th:eq(0)', api.table().footer()).html(pageTotal); 
					},
          "order": [[ 0, 'asc' ]],
              columns: [
                {
                      "render": function() {
                          return x++;
                      }
                  },
                {name: "ue", data: "ue"},
                  {name: "distrito", data: "distrito"},
                   {name: "total", data: "total"} 
                  
              ],
              ajax:{   
                data: { distrito : id },                
                  url: '/buscardis',  
                  "dataSrc": ""
              }
           
                });
                table.on( 'order.dt search.dt', function () {
          table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, x) {
              cell.innerHTML = x+1;
          } );
      } ).draw();
      x=1;
        });
  
  
    });
  </script>
  <script type="text/javascript">
    $('#dis').on('click', function() {
      let id = $("#buscar_distrito :selected").val();
      /* let hoy = new Date();
      let fecha = hoy.getDate() +'-'+(hoy.getMonth() + 1) +'-'+ hoy.getFullYear();
      let hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds(); */
      window.location.href = "{{URL::to('reportedis/pdf')}}/" +id;
    });
    </script>
@stop