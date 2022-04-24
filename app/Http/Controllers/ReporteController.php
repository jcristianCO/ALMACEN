<?php

namespace App\Http\Controllers;
use App\Models\Entrada;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Producto_sigma;
use App\Models\Inventario;
use App\Models\Detalle_ingresos;
use Illuminate\Http\Request;
use DataTables;
use DB;
use PDF;
//use App\Models\Producto_sigma;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\UE;


class ReporteController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:reporte-list');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('reporte.index');
    }
    public function buscar(Request $request)
    {
    	//$ue = [];
      //  dd($request);
         $id = $request->distrito;

        
     /* $datos[] =
            ["id" => 23,
            "nombre" => "Omar",
            "correo" => "omar@correo"];  */         
         
          /*   $boleta = DB::table('salidas as s')
        //Unir detale_ingreso con la tabla articulo
        ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
        ->select('ue.sie', 'ue.ue', 'ue.distrito','s.fecha')
        ->where('s.id', '=', $id)
        ->get(); */
            $data = DB::table('detalle_salidas_boletas as ds')
            //Unir detale_ingreso con la tabla articulo
            ->join('productos as a', 'a.id', '=', 'ds.productos_id')
            ->join('salidas as s', 's.id', '=', 'ds.salidas_id')
            ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
            ->select('ue.ue',  's.fecha',
            DB::raw('(ds.cantidad_salidas*ds.precio_salidas) as total'))
            ->where('s.ues_id', '=', $id)
            ->get();
            
        return response()->json($data);
        
    }
    public function buscardis(Request $request)
    {
   
         $dis = $request->distrito;
      
        if($dis <> "TODOS"){
            $data = DB::table('detalle_salidas_boletas as ds')
            //Unir detale_ingreso con la tabla articulo
            ->join('productos as a', 'a.id', '=', 'ds.productos_id')
            ->join('salidas as s', 's.id', '=', 'ds.salidas_id')
            ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
            ->select('ue.ue',  'ue.distrito',
            DB::raw('(ds.cantidad_salidas*ds.precio_salidas) as total'))
            ->where('ue.distrito', '=', $dis)
          
            ->get();
            
        return response()->json($data);
    }else{
        $data = DB::table('detalle_salidas_boletas as ds')
        //Unir detale_ingreso con la tabla articulo
        ->join('productos as a', 'a.id', '=', 'ds.productos_id')
        ->join('salidas as s', 's.id', '=', 'ds.salidas_id')
        ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
        ->select('ue.ue',  'ue.distrito',
        DB::raw('(ds.cantidad_salidas*ds.precio_salidas) as total'))
        
      
        ->get();
        return response()->json($data);
    }
    }
    public function GenerarUE($id){
        $data = DB::table('detalle_salidas_boletas as ds')
        //Unir detale_ingreso con la tabla articulo
        ->join('productos as a', 'a.id', '=', 'ds.productos_id')
        ->join('salidas as s', 's.id', '=', 'ds.salidas_id')
        ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
        ->select('ue.ue',  's.fecha','ue.distrito',
        DB::raw('(ds.cantidad_salidas*ds.precio_salidas) as total'))
        ->where('s.ues_id', '=', $id)
        ->get();
  
                                                $customPaper = array(0,0,612.00,1008.0);
          $pdf = PDF::loadView('imprimirDIS',compact('data'))->setPaper($customPaper, 'portrait');
          
          return $pdf->download("$id.pdf");
  
        }
        public function GenerarDIS($id){
            if($id <> "TODOS"){
            $data = DB::table('detalle_salidas_boletas as ds')
            //Unir detale_ingreso con la tabla articulo
            ->join('productos as a', 'a.id', '=', 'ds.productos_id')
            ->join('salidas as s', 's.id', '=', 'ds.salidas_id')
            ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
            ->select('ue.ue',  'ue.distrito',
            DB::raw('(ds.cantidad_salidas*ds.precio_salidas) as total'))
            ->where('ue.distrito', '=', $id)
          
            ->get();
      
                                                    $customPaper = array(0,0,612.00,1008.0);
              $pdf = PDF::loadView('imprimirDIS',compact('data'))->setPaper($customPaper, 'portrait');
              
              return $pdf->download("$id.pdf");
            }
            else{
                $data = DB::table('detalle_salidas_boletas as ds')
            //Unir detale_ingreso con la tabla articulo
            ->join('productos as a', 'a.id', '=', 'ds.productos_id')
            ->join('salidas as s', 's.id', '=', 'ds.salidas_id')
            ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
            ->select('ue.ue',  'ue.distrito',
            DB::raw('(ds.cantidad_salidas*ds.precio_salidas) as total'))
            
          
            ->get();
      
              $customPaper = array(0,0,612.00,1008.0);
              $pdf = PDF::loadView('imprimirDIS',compact('data'))->setPaper($customPaper, 'portrait');
              
              return $pdf->download("$id.pdf");
            }
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
