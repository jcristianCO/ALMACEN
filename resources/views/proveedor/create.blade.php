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
<form action="{{ route('proveedor.store') }}" method="POST">
				@csrf
                <div class="col-md-6">
					<div class="form-group">
						<label for="nombre">NIT</label>
						<input autofocus  type="text" name="nit" id="nit" class="form-control" placeholder="NIT" value="{{ old('nit') }}">
					</div>
					<div class="form-group">
						<label for="descripcion">RAZON SOCIAL</label>
                        <input type="text"  name="razon_social" id="razonsocial" class="form-control" placeholder="RAZON SOCIAL" value="{{ old('razon_social') }}">
					</div>
					<div class="form-group">
						<label for="cantidad">DIRECCION</label>
						<input type="text"  name="direccion" class="form-control" placeholder="DIRECCION" value="{{ old('direccion') }}">
					</div>
                    <div class="form-group">
						<label for="unidad">CELULAR</label>
						<input type="number" name="celular"  class="form-control" placeholder="CELULAR" value="{{ old('celular') }}">
					</div>
                    <div class="form-group">
						<label for="unidad">CIUDAD</label>
						<input type="text" name="ciudad"  class="form-control" placeholder="CIUDAD" value="{{ old('ciudad') }}">
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
{{-- <script src={{ asset('js/4.0.10_select2.js')}}></script> --}}
<script src={{ asset('js/2.1.2_sweetalert.js')}}></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> --}}
@section('js')


@stop