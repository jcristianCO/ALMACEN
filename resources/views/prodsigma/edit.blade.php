@extends('adminlte::page')

@section('content')
@include('sweetalert::alert')

<div class="container">
	<div class="card">
		<div class="card-body">
		
            <form action="{{ route('prodsigma.update', $prodsigma->id) }}" method="POST">
				<!-- <input name="_method" type="hidden" value="PUT"> -->
				{{ method_field('PUT') }}
				{{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
						
						<input  required type="hidden" name="id" id="id" disabled class="form-control" placeholder="Codigo" value="{{ $prodsigma->id}}">
					</div>
					<div class="form-group">
						<label for="nombre">CODIGO</label>
						<input  required type="text" name="codigo" id="codigo" class="form-control" placeholder="Codigo" value="{{ $prodsigma->codprosigma}}">
					</div>
					<div class="form-group">
						<label for="descripcion">PRODUCTO</label>
                        <input type="text" required name="producto" id="producto" class="form-control" placeholder="Producto" value="{{ $prodsigma->descripcionsigma }}">
					</div>
					
                    <div class="form-group">
						<label for="unidad">UNIDAD</label>
						<input type="text" name="unidad" required class="form-control" placeholder="Unidad" value="{{$prodsigma->unidadsigma}}">
					</div>
				</div>

				
				
				
				<div class="col-md-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">
							Guardar
						</button>
						<a href="{{ route('prodsigma.index') }}"><button class="btn btn-danger" type="button">
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