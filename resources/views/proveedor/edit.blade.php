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
<form action="{{ route('proveedor.update', $proveedor->id) }}" method="POST">
    {{ method_field('PUT') }}
				{{ csrf_field() }}
				
                <div class="col-md-6">
					<div class="form-group">
						<label for="nombre">NIT</label>
						<input   type="text" name="nit" id="nit" class="form-control" placeholder="NIT" value="{{ $proveedor->nit }}">
					</div>
					<div class="form-group">
						<label for="descripcion">RAZON SOCIAL</label>
                        <input type="text"  name="razon_social" id="razon_social" class="form-control" placeholder="RAZON SOCIAL" value="{{ $proveedor->razon_social }}">
					</div>
					<div class="form-group">
						<label for="cantidad">DIRECCION</label>
						<input type="text"  name="direccion" class="form-control" placeholder="DIRECCION" value="{{ $proveedor->direccion }}">
					</div>
                    <div class="form-group">
						<label for="unidad">CELULAR</label>
						<input type="text" name="celular"  class="form-control" placeholder="CELULAR" value="{{ $proveedor->celular }}">
					</div>
                    <div class="form-group">
						<label for="unidad">CIUDAD</label>
						<input type="text" name="ciudad"  class="form-control" placeholder="CIUDAD" value="{{ $proveedor->ciudad }}">
					</div>
				</div>

				
				
				
				<div class="col-md-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">
							Guardar
						</button>
						<a href="{{ route('proveedor.index') }}"><button class="btn btn-danger" type="button">
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