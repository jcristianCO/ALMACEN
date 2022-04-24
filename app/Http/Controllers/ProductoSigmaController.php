<?php

namespace App\Http\Controllers;

use App\Models\Producto_sigma;
use Illuminate\Http\Request;
use DataTables;
//use DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class ProductoSigmaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:sigma-list|sigma-create|sigma-edit|sigma-delete', ['only' => ['index','store']]);
         $this->middleware('permission:sigma-create', ['only' => ['create','store']]);
         $this->middleware('permission:sigma-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sigma-delete', ['only' => ['destroy']]);
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
      /*   $data = Producto_sigma::all();
        dd($data); */
        if ($request->ajax()) {
            /* $data = UE::select('*'); */
            $data = Producto_sigma::all();
            $user = auth()->user();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($user){
                        $button ='';
                        if ($user->can('sigma-edit') ){
                        $button = '<a class="btn btn-primary btn-sm" href="'.route('prodsigma.edit',$row->id).'">EDITAR</a>';
                        $button .= '&nbsp;&nbsp;';
                        }
                        //$button .= '<a class="btn btn-danger btn-sm" href="" data-target="#modal-delete-'.$row->id.'" data-toggle="modal">ELIMINARr</a>';
                        //$button .='<button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                        if ($user->can('sigma-delete') ){
                        $button .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.','.$row->descripcionsigma.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">DELETE</a>';
                        }
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('prodsigma.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('prodsigma.create');       
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
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|unique:producto_sigmas,codprosigma',
            
            'producto' => 'required',
            'unidad' => 'required',
        ]);

       
        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }
        try {
            $prodsigma = new Producto_sigma;
            $prodsigma->codprosigma = $request->get('codigo');
            
            $prodsigma->descripcionsigma = $request->get('producto');
            $prodsigma->unidadsigma = $request->get('unidad');
            //dd($producto);
            $prodsigma->save();

            return redirect()->route('prodsigma.index')
            ->with('success','ITEM SIGMA CREADO CON EXITO');
        } catch (\Exception $e){
            return redirect()->route('productos.create')
            ->with('error','ERROR AL CREAR ITEM SIGMA');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto_sigma  $producto_sigma
     * @return \Illuminate\Http\Response
     */
    public function show(Producto_sigma $producto_sigma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto_sigma  $producto_sigma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $prodsigma = Producto_sigma::findOrFail($id);
    	return view('prodsigma.edit', ['prodsigma'=>$prodsigma]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto_sigma  $producto_sigma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            //'id'=>'required|unique:produtos,codpro',
            'codigo' => 'required|unique:producto_sigmas,codprosigma,'.$id.',id',/* [ 'required', Rule::unique('productos')->ignore($request->id), ], */
            
            'producto' => 'required',
            'unidad' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }
        try {
            $producto = Producto_sigma::findOrFail($id);    
            /* $producto->id = $request->get('id'); */
            $producto->codprosigma = $request->get('codigo');
            
            $producto->descripcionsigma = $request->get('producto');
            $producto->unidadsigma = $request->get('unidad');
            //dd($producto);
            $producto->update();

            return redirect()->route('prodsigma.index')
            ->with('success','ITEM SIGMA ACTUALIZADO');
        } catch (\Exception $e){
            return redirect()->route('prodsigma.index')
            ->with('error','ERROR AL ACTUALIZAR');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto_sigma  $producto_sigma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Producto_sigma::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
