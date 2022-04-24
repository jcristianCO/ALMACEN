<?php

namespace App\Http\Controllers;

use App\Models\Proveedors;
use Illuminate\Http\Request;
use DataTables;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class ProveedorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:proveedor-list|proveedor-create|proveedor-edit|proveedor-delete', ['only' => ['index','store']]);
         $this->middleware('permission:proveedor-create', ['only' => ['create','store']]);
         $this->middleware('permission:proveedor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:proveedor-delete', ['only' => ['destroy']]);
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
       // dd($data = Proveedor::all());
        if ($request->ajax()) {
            /* $data = UE::select('*'); */
            $data = Proveedors::all();
            $user = auth()->user();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($user){
                        $button ='';
                        if ($user->can('proveedor-edit') ){
                        $button = '<a class="btn btn-primary btn-sm" href="'.route('proveedor.edit',$row->id).'">EDITAR</a>';
                        $button .= '&nbsp;&nbsp;';
                        }
                        //$button .= '<a class="btn btn-danger btn-sm" href="" data-target="#modal-delete-'.$row->id.'" data-toggle="modal">ELIMINARr</a>';
                        //$button .='<button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                        if ($user->can('proveedor-delete') ){
                        $button .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.','.$row->razon_social.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">DELETE</a>';
                        }
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('proveedor.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proveedor.create');
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
            'nit' => 'required|unique:proveedors,nit|max:15',
            'celular' => 'required | numeric',
            'razon_social' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required'
        ]);

       
        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        } 
       try {
          
             $producto = new Proveedors;
            $producto->nit = $request->get('nit');
            $producto->razon_social= $request->get('razon_social');
            $producto->direccion = $request->get('direccion');
            $producto->celular = $request->get('celular');
            $producto->ciudad = $request->get('ciudad');
            //dd($producto);
            $producto->save();

            return redirect()->route('proveedor.index')
            ->with('success','PROVEEDOR CREADO CON EXITO'); 
       } catch (\Exception $e){
           dd($e);
            return redirect()->route('proveedor.create')
            ->with('error','OCURRIO UN ERROR AL REGISTRAR');
        } 
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proveedor = Proveedors::findOrFail($id);
    	return view('proveedor.edit', ['proveedor'=>$proveedor]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            //'id'=>'required|unique:produtos,codpro',
            

            'nit' => 'required|unique:proveedors,nit, '.$id.',id',
            'celular' => 'required | numeric',
            'razon_social' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }
        try {
            $producto = Proveedors::findOrFail($id);    
            /* $producto->id = $request->get('id'); */

           // $producto = new Proveedors;
            $producto->nit = $request->get('nit');
            $producto->razon_social= $request->get('razon_social');
            $producto->direccion = $request->get('direccion');
            $producto->celular = $request->get('celular');
            $producto->ciudad = $request->get('ciudad');

            
            //dd($producto);
            $producto->update();

            return redirect()->route('proveedor.index')
            ->with('success','PROVEEDOR ACTUALIZADO');
        } catch (\Exception $e){
            return redirect()->route('proveedor.edit')
            ->with('error','ERROR AL ACTUALIZAR');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Proveedors::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
