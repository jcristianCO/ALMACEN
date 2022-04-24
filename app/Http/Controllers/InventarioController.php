<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

use DB;
use DataTables;

use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class InventarioController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:inventario-list');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
          //  $data = Inventario::all(); 
           $data = DB::table('productos as pr')
    		
            ->join('detalle_ingresos as di','di.productos_id','=','pr.id') 
            ->join('entradas as e','e.id','=','di.entradas_id') 
         	->select('pr.id',
            'pr.descripcion',
            'di.precio_ingresos',
            'e.lote',
            'pr.entrada',
            'pr.salida',
            'pr.stock')->where('pr.entrada','>','0')
            ->get();
           
            return Datatables::of($data)
                    ->addIndexColumn()
                  
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('inventario.index');
        
    }
    public function GenerarINV(){
      
        $data = DB::table('productos as pr')
    		
            ->join('detalle_ingresos as di','di.productos_id','=','pr.id') 
            ->join('entradas as e','e.id','=','di.entradas_id') 
         	->select('pr.id',
            'pr.descripcion',
            'di.precio_ingresos',
            'e.lote',
            'pr.entrada',
            'pr.salida',
            'pr.stock')->where('pr.entrada','>','0')
            ->get();
                                                $customPaper = array(0,0,612.00,1008.0);
          $pdf = PDF::loadView('imprimirINVENTARIO',compact('data'))->setPaper($customPaper, 'portrait');
          
          return $pdf->download("inventario.pdf");
  
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
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        //
    }
}
