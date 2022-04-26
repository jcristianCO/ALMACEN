<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Proveedors;
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
//use DataTable;
class EntradaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:entrada-list|entrada-create|entrada-edit|entrada-detalle|entrada-delete', ['only' => ['index','store']]);
         $this->middleware('permission:entrada-create', ['only' => ['create','store']]);
         $this->middleware('permission:entrada-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:entrada-delete', ['only' => ['destroy']]);
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
       
        //$proveedores = DB::table('proveedors')->get();
        if ($request->ajax()) {
            /* $data = UE::select('*'); */
            //dd($data);
            $data = DB::table('detalle_ingresos as di')
    		->join('entradas as e', 'e.id', '=', 'di.entradas_id')
            ->join('proveedors as p', 'p.id', '=', 'e.proveedor_id')
              ->join('productos as pr', 'pr.id', '=', 'di.productos_id') 
            /* ->join('producto_sigmas as ps', 'ps.id', '=', 'di.productos_sigmas_id')  */
            
    		->select(array('e.id',
            'p.razon_social',
            'e.fecha',
            'e.orden_compra',
            'e.num_proforma',
            DB::raw('sum(di.cantidad_ingresos*di.precio_ingresos) as total')))
            ->orderBy('e.id','DESC')
            ->groupBy('e.id','di.entradas_id','p.razon_social','e.fecha','e.orden_compra','e.num_proforma')
            /* ->where('di.entradas_id', '=', 'e.id') */
            
              
                     //dd(DB::getQueryLog());
            ->get()
            ;
            $user = auth()->user();
            return Datatables::of($data)
                    ->addIndexColumn()
                   
                    ->addColumn('action', function($row) use($user){
                        $button ='';
                        if ($user->can('entrada-detalle') ){
                        $button = '<a  class="btn btn-success btn-sm" href="'.route('entradas.show',$row->id).'">DETALLES</a>';
                      //  $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="detalle" class="edit btn btn-primary btn-sm detalleshow">DETALLES</a>';

                      // $button = '<a  data-toggle="modal" data-target="#demoModal" class="btn btn-primary btn-sm"  >DETALLES</a>';
                        $button .= '&nbsp;&nbsp;';
                        }
                        /* $button .= '<a class="btn btn-primary btn-sm" href="'.route('entradas.Generar',$row->id).'">IMPRIMIR</a>';
                        $button .= '&nbsp;&nbsp;'; */
                        //$button .= '<a class="btn btn-danger btn-sm" href="" data-target="#modal-delete-'.$row->id.'" data-toggle="modal">ELIMINARr</a>';
                        //$button .='<button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                        
                        if ($user->can('entrada-delete') ){
                        $button .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.','.$row->razon_social.','.$row->total.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">ELIMINAR</a>';
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
        
        return view('entrada.index');
    }
    public function Generar($id){
      //dd($id);
      //  view()->share('key', $value);
      $ids=Entrada::find($id);
     // dd($ids);
        $pdf = PDF::loadView('imprimir',compact('ids',$ids));
     return $pdf->download("$ids->fecha.pdf");
       // return view('entrada.imprimir');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectSearch(Request $request)
    {
    	$prov = [];

        if($request->has('q')){
            $search = $request->q;
            $prov =Proveedors::select("id", "razon_social")
            		->where('razon_social', 'LIKE',"%$search%")
            		->get();
        }
        return response()->json($prov);
    }
    public function selectSearchProducto(Request $request)
    {
    	$producto = [];

        if($request->has('q')){
            $search = $request->q;

            $producto = Producto::select("id","codpro","descripcion")
    		->where('codpro', 'LIKE', "%$search%")->orWhere('descripcion', 'LIKE', "%$search%")
    		->get(); 
        }
        
        return response()->json($producto);
    }
    public function selectSearchSigma(Request $request)
    {
    	$sigma = [];

        if($request->has('q')){
            $search = $request->q;

            $sigma = Producto_sigma::select("id","codprosigma","descripcionsigma")
    		->where('codprosigma', 'LIKE', "%$search%")
    		->get(); 
        }
        
        return response()->json($sigma);
    }
    public function create()
    {
        //
        return view('entrada.create');
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
        //dd($request->all());
        $fecha_=Carbon::now()->format('d/m/y H:i:s');
        $validator = Validator::make($request->all(), [
            'id_proveedor' => 'required',
           // 'fecha' => 'required',
            'lote' => 'required',
            'orden' => 'required',
            'num_proforma' => 'required',
        ]);

       
        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }
        try {
            
            $entrada = new Entrada;
            $entrada->lote = $request->get('lote');
            $entrada->fecha = $fecha_;
            $entrada->orden_compra = $request->get('orden');
            $entrada->num_proforma = $request->get('num_proforma');
            $entrada->proveedor_id = $request->get('id_proveedor');
            //dd($entrada);
            //dd($producto);
            $entrada->save();


            $codpro = $request->get('ids_producto'); //array()
    		$proda = $request->get('proda');
    		$cantidad = $request->get('cantidad');
    		$precio = $request->get('precio_unitario');
            $codsigma = $request->get('sigma_cod');

    	//	dd($request);

    		//Recorre los detalles de ingreso
    		$cont = 0;

    		while($cont < count($codpro))
    		{
    			$detalle = new Detalle_ingresos;
    			//$ingreso->id del ingreso que recien se guardo 
    			$detalle->entradas_id = $entrada->id;
    			//id_articulo de la posición cero
    			$detalle->cantidad_ingresos = $cantidad[$cont];
    			$detalle->precio_ingresos = $precio[$cont];
    			$detalle->productos_id = $codpro[$cont];
    			$detalle->producto_sigmas_id = $codsigma[$cont];
    			$detalle->save();

                //inventario
               /*  $inventario=new Inventario;
                $inventario->productos_id=$codpro[$cont];
                $inventario->entrada=$cantidad[$cont];
                $inventario->salida=0;
                $inventario->saldo=0;
                
                $inventario->save();
 */
    			$cont = $cont + 1;
    		}

            return redirect()->route('entradas.index')
            ->with('success','INGRESO CREADO CON EXITO');
        } catch (\Exception $e){
            dd($e);
            return redirect()->route('entradas.index')
            ->with('error','ERROR AL CREAR EL INGRESO');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //r
        //dd($id);
        $entrada = DB::table('entradas as e')
        //Unir detale_ingreso con la tabla articulo
        ->join('proveedors as p', 'p.id', '=', 'e.proveedor_id')
        ->select('e.lote', 'e.fecha', 'e.orden_compra', 'e.num_proforma', 'p.razon_social')
        ->where('e.id', '=', $id)
        ->get();
            $data = DB::table('detalle_ingresos as d')
            //Unir detale_ingreso con la tabla articulo
            ->join('productos as a', 'a.id', '=', 'd.productos_id')
            ->select('a.descripcion', 'd.cantidad_ingresos', 'd.precio_ingresos',
            DB::raw('(d.cantidad_ingresos*d.precio_ingresos) as total'))
            ->where('d.entradas_id', '=', $id)
            ->get();
       // Detalle_ingresos::find($id);
        //dd($entrada);
       // return response()->json($data);
        return view('entrada.modal')->with(['data'=> $data,
                                             'entrada'=>$entrada]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function edit(Entrada $entrada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrada  $entrada
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       // dd($id);
        Entrada::find($id)->delete();
        //Detalle_ing
     
        return response()->json(['success'=>'Entrada eliminada con exito.']);
    }
}
