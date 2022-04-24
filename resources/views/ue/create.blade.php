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
<form action="{{ route('ues.store') }}" method="POST">
				@csrf
               
                    <div class="row">
                    <div class="col-md-6">
				
                    <div class="form-group">
						<label for="nombre">SIE INFRAESTRUCTURA</label>
						<input autofocus type="text" name="SIEI" id="SIEI" class="form-control" placeholder="CODIGO INFRA" value="{{ old('SIEI') }}">
					</div>
                </div>
                <div class="col-md-6">
					<div class="form-group">
						<label for="descripcion">SIE UNIDAD EDUCATIVA</label>
                        <input type="text"  name="SIE" id="SIE" class="form-control" placeholder="CODIGO SIE" value="{{ old('SIE') }}">
					</div>
                </div>
					<div class="form-group col-md-8">
						<label for="cantidad">UNIDAD EDUCATIVA</label>
						<input type="text"  name="UE" class="form-control" placeholder="UNIDAD EDUCATIVA" value="{{ old('UE') }}">
					</div>
                    
                    <div class="form-group col-md-4">
						<label for="unidad">DIRECCION UNIDAD EDUCATIVA</label>
						<input type="text" name="DIRUE"  class="form-control" placeholder="DIRECCION UE" value="{{ old('DIRUE') }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">TELEFONO U.E.</label>
						<input type="number" name="TELUE"  class="form-control" placeholder="TELEFONO UE" value="{{ old('TELUE') }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">TURNO</label>
						<input type="text" name="TURNO"  class="form-control" placeholder="TURNO" value="{{ old('TURNO') }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">DISTRITO</label>
						<input type="number" name="DISTRITO"  class="form-control" placeholder="DISTRITO" value="{{ old('DISTRITO') }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">DEPENDENCIA</label>
						<input type="text" name="DEPEN"  class="form-control" placeholder="DEPENDENCIA" value="{{ old('DEPEN') }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">CANTIDAD ALUMNOS</label>
						<input type="number" name="CANTALUMNOS"  class="form-control" placeholder="CANTIDAD" value="{{ old('CANTALUMNOS') }}">
					</div>
                    <div class="form-group col-md-2">
						<label for="unidad">CANTIDAD DE AULAS</label>
						<input type="number" name="CANTAULAS"  class="form-control" placeholder="CANTIDAD" value="{{ old('CANTIAULAS') }}">
					</div>
                    <div class="form-group col-md-8">
						<label for="unidad">NOMBRE DIRECTOR</label>
						<input type="text" name="DIRECTOR"  class="form-control" placeholder="NOMBRE DIRECTOR" value="{{ old('DIRECTOR') }}">
					</div>
                    <div class="form-group col-md-4">
						<label for="unidad">CELULAR DIRECTOR</label>
						<input type="number" name="CEL"  class="form-control" placeholder="CEL" value="{{ old('CEL') }}">
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