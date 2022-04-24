@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')

<div class="container">
	<div class="card">
		<div class="card-body">
			{{-- <div class="col-md-12">
			<div class="form-group pull-left">
				<a href="{{ url()->previous()}}" class="pull-left">
					<button class="btn btn-danger pull-left">VOLVER</button>
				</a>
			</div>		
		</div> --}}
<form action="{{ route('ues.update', $ue->id) }}" method="POST">
    {{ method_field('PUT') }}
				{{ csrf_field() }}
				
               
                    <div class="row">
                    <div class="col-md-6">
				
                    <div class="form-group">
						<label for="nombre">SIE INFRAESTRUCTURA</label>
						<input autofocus type="text" name="SIEI" id="SIEI" class="form-control" placeholder="CODIGO INFRA" value="{{ $ue->codinfra }}">
					</div>
                </div>
                <div class="col-md-6">
					<div class="form-group">
						<label for="descripcion">SIE UNIDAD EDUCATIVA</label>
                        <input type="text"  name="SIE" id="SIE" class="form-control" placeholder="CODIGO SIE" value="{{ $ue->sie }}">
					</div>
                </div>
					<div class="form-group col-md-8">
						<label for="cantidad">UNIDAD EDUCATIVA</label>
						<input type="text"  name="UE" class="form-control" placeholder="UNIDAD EDUCATIVA" value="{{ $ue->ue }}">
					</div>
                    
                    <div class="form-group col-md-4">
						<label for="unidad">DIRECCION UNIDAD EDUCATIVA</label>
						<input type="text" name="DIRUE"  class="form-control" placeholder="DIRECCION UE" value="{{ $ue->direccion }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">TELEFONO U.E.</label>
						<input type="number" name="TELUE"  class="form-control" placeholder="TELEFONO UE" value="{{ $ue->telefono }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">TURNO</label>
						<input type="text" name="TURNO"  class="form-control" placeholder="TURNO" value="{{ $ue->turno }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">DISTRITO</label>
						<input type="number" name="DISTRITO"  class="form-control" placeholder="DISTRITO" value="{{ $ue->distrito }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">DEPENDENCIA</label>
						<input type="text" name="DEPEN"  class="form-control" placeholder="DEPENDENCIA" value="{{ $ue->dependencia }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">CANTIDAD ALUMNOS</label>
						<input type="number" name="CANTALUMNOS"  class="form-control" placeholder="CANTIDAD" value="{{ $ue->cantialum }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">CANTIDAD DE AULAS</label>
						<input type="number" name="CANTAULAS"  class="form-control" placeholder="CANTIDAD" value="{{ $ue->cantiaulas }}">
					</div>
                    <div class="form-group col-md-8">
						<label for="unidad">NOMBRE DIRECTOR</label>
						<input type="text" name="DIRECTOR"  class="form-control" placeholder="NOMBRE DIRECTOR" value="{{ $ue->director }}">
					</div>
                    <div class="form-group col-md-4">
						<label for="unidad">CELULAR DIRECTOR</label>
						<input type="number" name="CEL"  class="form-control" placeholder="CEL" value="{{ $ue->teldirec }}">
					</div>
                   
				</div>

				
				
				
				<div class="col-md-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">
							Guardar
						</button>
						<a href="{{ route('ues.index') }}"><button class="btn btn-danger" type="button">
							Cancelar
						</button></a> 
						{{-- <button class="btn btn-danger btn-close" formaction="{{ route('proveedor.index') }}">VOLVER</button> --}}
					</div>
				</div>
			</form>
          
</div> 
</div> 

</div>
    
@endsection

@section('css')

@stop

@section('js')
  

@stop