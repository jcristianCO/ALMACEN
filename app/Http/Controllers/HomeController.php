<?php

namespace App\Http\Controllers;
use App\Models\Entrada;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Proveedors;
use App\Models\Producto_sigma;
use App\Models\UE;
use App\Models\Boleta;
use App\Models\Detalle_ingresos;
use DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $boleta = DB::table('salidas')
            ->count();
            $entrada = DB::table('entradas')
            ->count();
            $prod = DB::table('productos')
            ->count();
            $sigma = DB::table('producto_sigmas')
            ->count();
            $prove = DB::table('proveedors')
            ->count();
            $ue = DB::table('u_e_s')
            ->count();
            
        return view('home',compact('entrada','boleta','prod','sigma','prove','ue'));
    }
}
