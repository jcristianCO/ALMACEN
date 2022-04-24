<?php

namespace App\Http\Controllers;
use App\Models\UE;
use App\Models\Entrada;
use App\Models\Producto;
use App\Models\Boleta;
use App\Models\Salida;
use Illuminate\Http\Request;
use App\Models\Detalle_salidas_boleta;
use App\Models\Detalle_salidas;
use App\Models\Detalle_salida_boleta;
use App\Models\Detalle_salidas_boletas;
use DB;
use DataTables;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use \Illuminate\Support\Facades\URL;
use Carbon\Carbon;
class BoletaController extends Controller

{
    function __construct()
    {
         $this->middleware('permission:boleta-list|boleta-create|boleta-edit|boleta-acta|boleta-boleta|boleta-detalle|boleta-delete', ['only' => ['index','store']]);
         $this->middleware('permission:boleta-create', ['only' => ['create','store']]);
         $this->middleware('permission:boleta-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:boleta-delete', ['only' => ['destroy']]);
          $this->middleware(function($request,$next){
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }
            if (session('errorForm')) {
                $html = "<ul style='list-style: none;'>";
                foreach(session('errorForm') as $error) {
                    $html .= "<li>$error[0]</li>";
                }
                $html .= "</ul>";

                Alert::html('ERROR...!!!', $html, 'error');
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //dd($data = Salida::all());
        if ($request->ajax()) {
            /* $data = UE::select('*'); */
          
            /* $data = UE::select('*'); */
            //dd($data);
            $data = DB::table('detalle_salidas_boletas as ds')
    		->join('salidas as s', 's.id', '=', 'ds.salidas_id')
            ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
              ->join('productos as pr', 'pr.id', '=', 'ds.productos_id') 
            /* ->join('producto_sigmas as ps', 'ps.id', '=', 'di.productos_sigmas_id')  */
            
    		->select(array('s.id',
            'ue.ue',
            's.fecha',
            
            DB::raw('sum(ds.cantidad_salidas*ds.precio_salidas) as total')))
            ->orderBy('s.id','DESC')
            ->groupBy('s.id','ds.salidas_id','ue.ue','s.fecha')
            /* ->where('di.entradas_id', '=', 'e.id') */
            
              
                     //dd(DB::getQueryLog());
            ->get()
            ;
            $user = auth()->user();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                   
                    ->addColumn('action', function($row) use($user){
                        $button ='';
                        if ($user->can('boleta-detalle') ){
                        $button.='<a  class="btn btn-success btn-sm" href="'.route('boleta.show',$row->id).'">DETALLES</a>';
                        $button .= '&nbsp;&nbsp;';
                        }
                     // 
                     if ($user->can('boleta-boleta') ){
                        $button .= '<a class="btn btn-primary btn-sm" href="'.route('boleta.GenerarBoleta',$row->id).'"  target="_blank">IMPRIMIR BOLETA</a>';
                        $button .= '&nbsp;&nbsp;';
                     }
                        //$button .= '<a class="btn btn-danger btn-sm" href="" data-target="#modal-delete-'.$row->id.'" data-toggle="modal">ELIMINARr</a>';
                        //$button .='<button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                        if ($user->can('boleta-acta') ){
                        $button .= '<a class="btn btn-info btn-sm" href="'.route('boleta.GenerarActa',$row->id).'">IMPRIMIR ACTA</a>';
                        
                        $button .= '&nbsp;&nbsp;';
                        }
                        //$button .= '<a class="btn btn-danger btn-sm" href="" data-target="#modal-delete-'.$row->id.'" data-toggle="modal">ELIMINARr</a>';
                        //$button .='<button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                        if ($user->can('boleta-delete') ){
                        $button .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.','.$row->ue.','.$row->total.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">ELIMINAR</a>';
                        }
                        return $button; 
                    })
                  /*   ->addColumn('total', function($query) {
                        $query=$query->id;
                        return $query;
                      }) */
                    ->rawColumns(['action'])
                    ->make(true);
                    
                
        }
        
        return view('boleta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectSearchUE(Request $request)
    {
    	$ue = [];

        if($request->has('q')){
            $search = $request->q;
            $ue =UE::select("id", "ue")
            		->where('ue', 'LIKE',"%$search%")
            		->get();
        }
        return response()->json($ue);
    }
    public function selectSearchIngreso(Request $request)
    {
    	$ingreso = [];

        if($request->has('q')){
            $search = $request->q;
            $ingreso =DB::table('detalle_ingresos as di')
    		->join('productos as p', 'p.id', '=', 'di.productos_id')
            /* ->join('inventarios as i', 'i.productos_id', '=', 'di.productos_id') */
    		->join('producto_sigmas as ps', 'ps.id', '=', 'di.producto_sigmas_id')
            ->join('entradas as e', 'e.id', '=', 'di.entradas_id')
    		->select('p.stock', 'p.id','p.codpro', 'p.descripcion', 'ps.codprosigma', 'ps.descripcionsigma','e.lote','p.unidad','di.precio_ingresos')
            ->where( 'p.descripcion', 'LIKE', "%$search%")
            ->get();
            
    		/* select("id","cantidad","producto_id")
            		->where('producto_id', 'LIKE',"%$search%")
            		->get(); */
        }
        //dd($ingreso);
        return response()->json($ingreso);
    }

    public function GenerarBoleta($id){
      // dd("entro");
        //  view()->share('key', $value);
        /* $ids=salida::find($id);
       // dd($ids);
          $pdf = PDF::loadView('imprimirBoleta',compact('ids',$ids));
       return $pdf->download("$ids->fecha.pdf");
         */ // return view('entrada.imprimir');


         $boleta = DB::table('salidas as s')
         //Unir detale_ingreso con la tabla articulo
         ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
         ->select('s.id','ue.sie', 'ue.ue', 'ue.distrito','s.fecha')
         ->where('s.id', '=', $id)
         ->get();
         //dd($boleta);
             $data = DB::table('detalle_salidas_boletas as ds')
             //Unir detale_ingreso con la tabla articulo
             ->join('productos as a', 'a.id', '=', 'ds.productos_id')
             ->select('a.unidad','a.descripcion', 'ds.cantidad_salidas', 'ds.precio_salidas',
             DB::raw('(ds.cantidad_salidas*ds.precio_salidas) as total'))
             ->where('ds.salidas_id', '=', $id)
             ->get();
        // Detalle_ingresos::find($id);
         //dd($entrada);
        // return response()->json($data);
         /* return view('boleta.modal')->with(['data'=> $data,
                                              'salida'=>$boleta]); */
        $pdf = PDF::loadView('imprimirBoleta',compact('data','boleta'));
        return $pdf->download("$id.pdf");

      }
      
      public function GenerarActa($id){
        // dd("entro");
          //  view()->share('key', $value);
          /* $ids=salida::find($id);
         // dd($ids);
            $pdf = PDF::loadView('imprimirBoleta',compact('ids',$ids));
         return $pdf->download("$ids->fecha.pdf");
           */ // return view('entrada.imprimir');
  
  
           $boleta = DB::table('salidas as s')
           //Unir detale_ingreso con la tabla articulo
           ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
           ->select('s.id','ue.sie', 'ue.ue', 'ue.distrito','s.fecha')
           ->where('s.id', '=', $id)
           ->get();
           //dd($boleta);
               $data = DB::table('detalle_salidas_boletas as ds')
               //Unir detale_ingreso con la tabla articulo
               ->join('productos as a', 'a.id', '=', 'ds.productos_id')
               ->select('a.codpro','a.unidad','a.descripcion', 'ds.cantidad_salidas', 'ds.precio_salidas',
               DB::raw('(ds.cantidad_salidas*ds.precio_salidas) as total'))
               ->where('ds.salidas_id', '=', $id)
               ->get();
          // Detalle_ingresos::find($id);
           //dd($entrada);
          // return response()->json($data);
           /* return view('boleta.modal')->with(['data'=> $data,
                                                'salida'=>$boleta]); */
                                                $customPaper = array(0,0,612.00,1008.0);
          $pdf = PDF::loadView('imprimirActa',compact('data','boleta'))->setPaper($customPaper, 'portrait');
          
          return $pdf->download("$id.pdf");
  
        }
    public function create()
    {
        //
        return view('boleta.create');
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
         // dd($request->all());
          $fecha_=Carbon::now()->format('d/m/y H:i:s');
          $validator = Validator::make($request->all(), [
              'id_ue' => 'required',
             // 'fecha' => 'required',
              
          ]);
  
         
          if ($validator->fails()) {
              return redirect()->back()
                  ->with('errorForm', $validator->errors()->getMessages())
                  ->withInput();
          }
          try {
              
              $salida = new Salida;
              $salida->cantidad = 0;
              $salida->fecha = $fecha_;
              $salida->ues_id = $request->get('id_ue');
              //dd($entrada);
              //dd($salida);
              $salida->save();
  
  
              $codpro = $request->get('prods'); //array()
              $proda = $request->get('codpro');
              //$proda = $request->get('codpro');
              $cantidad = $request->get('cantidad_salida');
              $precio = $request->get('precio_salida');
              $codsigma = $request->get('sigma');
  
          //	dd($request->all());
  
              //Recorre los detalles de ingreso
              $cont = 0;
  
              while($cont < count($codpro))
              {
                 // dd($salida->id);
                  $detalle = new Detalle_salidas_boletas;
                  //$ingreso->id del ingreso que recien se guardo 
                  $detalle->salidas_id = $salida->id;
                // dd($cantidad[$cont],$precio[$cont],$codsigma[$cont],$codpro[$cont]);
                  //id_articulo de la posición cero
                  $detalle->cantidad_salidas = $cantidad[$cont];
                  //dd($detalle->cantidad_salidas);
                  $detalle->precio_salidas = $precio[$cont];
                  $detalle->productos_id = $codpro[$cont];
                  $detalle->producto_sigmas_id = $codsigma[$cont];
                  //dd($cantidad[$cont],$precio[$cont],$codsigma[$cont],$codpro[$cont]);
                //  dd($detalle);
                  $detalle->save();
               
                  $cont = $cont + 1;
              }
              //dd($salida->id);
             // self::GenerarBoleta($salida->id);
             // return URL::to('boleta/pdf/'.$salida->id);
             //URL::to("/boleta/pdf/{$salida->id}");
             //route('boleta.GenerarBoleta', ['id' => $salida->id]);
             //$url=route('boleta.GenerarBoleta', ['id' => $salida->id]);
            // $this->GenerarBoleta(['id' => $salida->id]);
               
            return redirect()->route('boleta.index')
            ->with('success','BOLETA CREADA CON EXITO'); 
              
          } catch (\Exception $e){
              dd($e);
              return redirect()->route('boleta.index')
              ->with('error','ERROR AL CREAR BOLETA');
          }
  
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
        $boleta = DB::table('salidas as s')
        //Unir detale_ingreso con la tabla articulo
        ->join('u_e_s as ue', 'ue.id', '=', 's.ues_id')
        ->select('ue.sie', 'ue.ue', 'ue.distrito','s.fecha')
        ->where('s.id', '=', $id)
        ->get();
            $data = DB::table('detalle_salidas_boletas as ds')
            //Unir detale_ingreso con la tabla articulo
            ->join('productos as a', 'a.id', '=', 'ds.productos_id')
            ->select('a.descripcion', 'ds.cantidad_salidas', 'ds.precio_salidas',
            DB::raw('(ds.cantidad_salidas*ds.precio_salidas) as total'))
            ->where('ds.salidas_id', '=', $id)
            ->get();
       // Detalle_ingresos::find($id);
        //dd($entrada);
       // return response()->json($data);
        return view('boleta.modal')->with(['data'=> $data,
                                             'salida'=>$boleta]);
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
