@extends('adminlte::page')

@section('content')

    <div class="justify-content-center">
        <div class="card">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-12">
                <h1 class="m-0 text-center"><strong> PANEL DE CONTROL</strong></h1>
        </div>
            </div>
        <div class="card">
        
                        <div class="row">
                            <div class="col-lg-4 col-6">

                                <div class="small-box bg-info">
                                <div class="inner">
                                    <h3 class="text-white">{{ $entrada }}</h3>
                                    <p class="text-white"><strong>TOTAL ENTRADAS</strong></p>
                                    </div>
                                    <div class="icon">
                                    <i class="fas fa-calendar-plus"></i>
                                    </div>
                                    <strong class="small-box-footer">ENTRADAS SUB-ALMACEN</strong>
                                    </div>
                                    </div>
                                <div class="col-lg-4 col-6">

                                    <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3 class="text-white">{{ $boleta }}</h3>
                                        <p class="text-white"><strong>TOTAL SALIDAS</strong></p>
                                        </div>
                                        <div class="icon">
                                        <i class="fas fa-calendar-minus"></i>
                                        </div>
                                        <strong class="small-box-footer"> BOLETAS GENERADAS</strong>
                                        </div>
                                        </div>
                                    
                                    <div class="col-lg-4 col-6">
                                    
                                    <div class="small-box bg-warning">
                                    <div class="inner">
                                    <h3 class="text-white">{{ $prod }}</h3>
                                    <p class="text-white"><strong>TOTAL ITEMS</strong></p>
                                    </div>
                                    <div class="icon">
                                    <i class="fas fa-window-restore"></i>
                                    </div>
                                    <strong class="small-box-footer"> ITEMS SUB-ALMACEN</strong>
                                    </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-6">
                                    
                                    <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3 class="text-white">{{ $sigma }}</h3>
                                        <p class="text-white"><strong>TOTAL ITEMS SIGMA</strong></p>
                                        </div>
                                        <div class="icon">
                                        <i class="fas fa-box-open"></i>
                                        </div>
                                        <strong class="small-box-footer"> ITEMS SIGMA GENERICOS</strong>
                                        </div>
                                        </div>
                                    <div class="col-lg-4 col-6">
                                    
                                        <div class="small-box bg-secondary">
                                        <div class="inner">
                                            <h3 class="text-white">{{ $prove }}</h3>
                                            <p class="text-white"><strong>TOTAL PROVEEDORES</strong></p>
                                            </div>
                                            <div class="icon">
                                            <i class="fas fa-luggage-cart"></i>
                                            </div>
                                            <strong class="small-box-footer"> PROVEEDORES</strong>
                                            </div>
                                            </div>
                                        <div class="col-lg-4 col-6">
                                    
                                            <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h3 class="text-white">{{ $ue }}</h3>
                                                <p class="text-white"><strong>TOTAL U.E.</strong></p>
                                                </div>
                                                <div class="icon">
                                                <i class="fas fa-school"></i>
                                                </div>
                                                <strong class="small-box-footer"> UNIDADES EDUCATIVAS</strong>
                                                </div>
                                                </div>
                        </div>
                        
               
        </div>
            </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop




