<?php

namespace App\Http\Controllers;

use App\Models\UE;
use Illuminate\Http\Request;

use DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UEController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ue-list|ue-create|ue-edit|ue-delete', ['only' => ['index','store']]);
         $this->middleware('permission:ue-create', ['only' => ['create','store']]);
         $this->middleware('permission:ue-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:ue-delete', ['only' => ['destroy']]);
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
    public function index(Request $request )
    {
        //
        if ($request->ajax()) {
            /* $data = UE::select('*'); */
            $data = UE::all();
            $user = auth()->user();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use($user){
                        $button ='';
                        if ($user->can('ue-edit') ){
                        $button = '<a class="btn btn-primary btn-sm" href="'.route('ues.edit',$row->id).'">EDITAR</a>';
                        $button .= '&nbsp;&nbsp;';
                        }
                        //$button .= '<a class="btn btn-danger btn-sm" href="" data-target="#modal-delete-'.$row->id.'" data-toggle="modal">ELIMINARr</a>';
                        //$button .='<button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
                        if ($user->can('ue-detele') ){
                        $button .= ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.','.$row->ue.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">DELETE</a>';
                        }
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('ue.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ue.create');
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
        $validator = Validator::make($request->all(), [
            'SIE' => 'required|unique:u_e_s,sie',
            'SIEI' => 'required ',
            'UE' => 'required',
            'DIRUE' => 'required',
            'TELUE' => 'required',
            'TURNO' => 'required ',
            'DISTRITO' => 'required',
            'DEPEN' => 'required',
            'CANTALUMNOS' => 'required',
            'CANTAULAS' => 'required ',
            'DIRECTOR' => 'required',
            'CEL' => 'required'
        ]);

       
        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        } 
       try {
          
             $ue = new UE;
            $ue->codinfra = $request->get('SIEI');
            $ue->sie= $request->get('SIE');
            $ue->ue = $request->get('UE');
            $ue->direccion = $request->get('DIRUE');
            $ue->telefono= $request->get('TELUE');
            $ue->turno= $request->get('TURNO');
            $ue->distrito= $request->get('DISTRITO');
            $ue->dependencia = $request->get('DEPEN');
            $ue->cantialum= $request->get('CANTALUMNOS');
            $ue->cantiaulas= $request->get('CANTAULAS');
            $ue->director = $request->get('DIRECTOR');
            $ue->teldirec= $request->get('CEL');
            
            
            //dd($producto);
            $ue->save();

            return redirect()->route('ues.index')
            ->with('success','UNIDAD EDUCATIVA CREADA CON EXITO'); 
       } catch (\Exception $e){
           dd($e);
            return redirect()->route('ues.create')
            ->with('error','OCURRIO UN ERROR AL REGISTRAR');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UE  $uE
     * @return \Illuminate\Http\Response
     */
    public function show(UE $uE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UE  $uE
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ue = UE::findOrFail($id);
    	return view('ue.edit', ['ue'=>$ue]);
       // return view('ue.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UE  $uE
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'SIE' => 'required|unique:u_e_s,sie,'.$id.',id',
            'SIEI' => 'required ',
            'UE' => 'required',
            'DIRUE' => 'required',
            'TELUE' => 'required',
            'TURNO' => 'required ',
            'DISTRITO' => 'required',
            'DEPEN' => 'required',
            'CANTALUMNOS' => 'required',
            'CANTAULAS' => 'required ',
            'DIRECTOR' => 'required',
            'CEL' => 'required'
        ]);

       
        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        } 
       try {
          
             
             $ue = UE::findOrFail($id); 
            $ue->codinfra = $request->get('SIEI');
            $ue->sie= $request->get('SIE');
            $ue->ue = $request->get('UE');
            $ue->direccion = $request->get('DIRUE');
            $ue->telefono= $request->get('TELUE');
            $ue->turno= $request->get('TURNO');
            $ue->distrito= $request->get('DISTRITO');
            $ue->dependencia = $request->get('DEPEN');
            $ue->cantialum= $request->get('CANTALUMNOS');
            $ue->cantiaulas= $request->get('CANTAULAS');
            $ue->director = $request->get('DIRECTOR');
            $ue->teldirec= $request->get('CEL');
            
            
            //dd($producto);
            $ue->update();

            return redirect()->route('ues.index')
            ->with('success','UNIDAD EDUCATIVA ACTUALIZADA'); 
       } catch (\Exception $e){
           dd($e);
            return redirect()->route('ues.create')
            ->with('error','OCURRIO UN ERROR AL ACTUALIZAR');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UE  $uE
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        UE::find($id)->delete();
     
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
