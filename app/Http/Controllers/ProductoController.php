<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:almacen-list|almacen-create|almacen-edit|almacen-delete', ['only' => ['index','store']]);
         $this->middleware('permission:almacen-create', ['only' => ['create','store']]);
         $this->middleware('permission:almacen-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:almacen-delete', ['only' => ['destroy']]);
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
        if ($request->ajax()) {
            /* $data = UE::select('*'); */
            $data = Producto::all();
            $user = auth()->user();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($user){
                        $button ='';
                        if ($user->can('almacen-edit') ){
                        $button = '<a class="btn btn-primary btn-sm" href="'.route('productos.edit',$row->id).'">EDITAR</a>';
                            $button .= '&nbsp;&nbsp;';
                        }
                            //$button .= '<a class="btn btn-danger btn-sm" href="" data-target="#modal-delete-'.$row->id.'" data-toggle="modal">ELIMINARr</a>';
                            //$button .='<button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                            if ($user->can('almacen-delete') ){
                            $button .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.','.$row->descripcion.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">DELETE</a>';
                            }
                            return $button;
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('producto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto.create');
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
        //dd($request);
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|unique:productos,codpro',
            'cantidad' => 'required | numeric',
            'producto' => 'required',
            'unidad' => 'required',
        ]);

       
        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        } 
       try {
            /* Producto::updateOrCreate(['cantmin' => $request->cantidad],
            ['codpro' => $request->codigo, 'descripcion' => $request->producto, 'unidad' => $request->unidad]);        
 */
         /*    Producto::updateOrCreate($request->except('_token'));        

            return response()->json(['success'=>'Post saved successfully.']); */

/*             $data = $request->all();
Producto::create($data);
return response()->json($data); */
             $producto = new Producto;
            $producto->codpro = $request->get('codigo');
            $producto->cantmin= $request->get('cantidad');
            $producto->descripcion = $request->get('producto');
            $producto->unidad = $request->get('unidad');
            //dd($producto);
            $producto->save();

            return redirect()->route('productos.index')
            ->with('success','PRODUCTO CREADO CON EXITO'); 
       } catch (\Exception $e){
            return redirect()->route('productos.create')
            ->with('error','ERROR AL CREAR PRODUCTO');
        } 
        
     
        
      
//Alert::success('Congrats', 'You\'ve Successfully Registered');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto = Producto::findOrFail($id);
    	return view('producto.edit', ['producto'=>$producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dd($id);
        
        $validator = Validator::make($request->all(), [
            //'id'=>'required|unique:produtos,codpro',
            'codigo' => 'required|unique:productos,codpro,'.$id.',id',/* [ 'required', Rule::unique('productos')->ignore($request->id), ], */
            'cantidad' => 'required | numeric',
            'producto' => 'required',
            'unidad' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }
        try {
            $producto = Producto::findOrFail($id);    
            /* $producto->id = $request->get('id'); */
            $producto->codpro = $request->get('codigo');
            $producto->cantmin= $request->get('cantidad');
            $producto->descripcion = $request->get('producto');
            $producto->unidad = $request->get('unidad');
            //dd($producto);
            $producto->update();

            return redirect()->route('productos.index')
            ->with('success','PRODUCTO ACTUALIZADO CON EXITO');
        } catch (\Exception $e){
            return redirect()->route('productos.index')
            ->with('error','ERROR AL ACTUALIZAR EL PRODUCTO');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd('lleha');
        //dd($id);
       /*  $producto = Producto::findOrFail($id);
    	//$persona->tipo_persona = 'Inactivo';
    	//$producto->delete();
        
        $producto->delete($id);
    	return redirect()->route('productos.index')
            ->with('success','Eliminado.'); */
            Producto::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
       // return redirect()->route('productos.index')
         //   ->with('success','Eliminado.');
    }
}
