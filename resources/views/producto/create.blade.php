@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')

<div class="container">
	<div class="card">
		<div class="card-body">
		
<form action="{{ route('productos.store') }}" method="POST">
				@csrf
                <div class="col-md-6">
					<div class="form-group">
						<label for="nombre">CODIGO :</label>
						<input autofocus required type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo" value="{{ old('codigo') }}">
					</div>
					<div class="form-group">
						<label for="descripcion">ITEM :</label>
                        <input type="text" required name="producto" id="producto" class="form-control" placeholder="Producto" value="{{ old('producto') }}">
					</div>
					<div class="form-group">
						<label for="cantidad">CANTIDAD MINIMA :</label>
						<input type="number" required name="cantidad" class="form-control" placeholder="Cantidad" value="{{ old('cantidad') }}">
					</div>
                    <div class="form-group">
						<label for="unidad">UNIDAD :</label>
						<input type="text" name="unidad" required class="form-control" placeholder="Unidad" value="{{ old('unidad') }}">
					</div>
				</div>

				
				
				
				<div class="col-md-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">
							Guardar
						</button>
						 <a href="{{ route('productos.index') }}"><button class="btn btn-danger" type="button">
							Cancelar
						</button></a> 
						
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