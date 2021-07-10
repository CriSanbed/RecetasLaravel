<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Models\CategoriaReceta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{
    
    //CONSTRUCTOR
    public function __construct()
    {
        //verificar si hay una instancia para generar una nueva
        $this->middleware('auth', ['except'=>'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRecetas = Auth::user()->userRecetas;
        return view('recetas.index')->with('userRecetas', $userRecetas);
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
        //OBTENER SIN MODELO
        //$categorias=DB::table('categoria_recetas')->get()->pluck('nombre', 'id');

        //OBTENER CON MODELO
        //para ver q estoy pasando dd()
        //$categorias=CategoriaReceta::all(['id', 'nombre'])->dd();
        $categorias=CategoriaReceta::all(['id', 'nombre']);
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
        //redimensionando la imagen
        $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(1000,550);
        $img -> save();

        //INSERTAR SIN MODELO
        /* DB::table('recetas')-> insert([
            'nombre' => $data['nombre'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
            'user_id' => Auth::user()->id,
            'categoria_id' => $data['categorias'],
        ]); */

        //INSERTAR CON MODELO
        Auth::user()->userRecetas()-> create([
            'nombre' => $data['nombre'],
            'ingredientes' => $data['ingredientes'],
            'preparacion' => $data['preparacion'],
            'imagen' => $ruta_imagen,
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
    public function show(Receta $receta)
    {
        return view('recetas.show')->with('receta', $receta);
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
