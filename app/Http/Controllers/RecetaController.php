<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecetaController extends Controller
{
    
    //CONSTRUCTOR
    public function __construct()
    {
        //verificar si hay una instancia para generar una nueva
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recetas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // PARA IR PROBANDO es el dd();
        //DB::table('categorias_recetas')->get()->dd();
        $categorias=DB::table('categorias_recetas')->get()->pluck('nombre', 'id');
        return view('recetas.create')->with('categorias',$categorias);
        //return view('recetas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Prueba para saber q nomas se esta enviando
        //dd($request->all());
        
        
        
        //USO DEL FASAT
        $data = $request->validate([
            'nombre'=> 'required|min:6',
            'categorias'=> 'required',
            'ingredientes'=> 'required',
            'preparacion'=> 'required',
            //'imagen'=> 'required|image'

        ]);
        //ruta imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        DB::table('recetas')-> insert([
            'nombre' => $data['nombre'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'user_id' => Auth::user()->id,
            'categoria_id' => $data['categorias'],
        ]);
        // nos da una simulacion, permitiendo capturar la info q se esta enviando
        //dd($request->all());

        //REDIRECCIONAMIENTO
        return redirect() -> action([RecetaController::class, 'index']);
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
