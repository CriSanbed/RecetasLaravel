<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Receta;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //CONSTRUCTOR
    public function _construct()
    {
        $this->middleware('auth', ['except'=>'show']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Perfil $perfil
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        return view('perfiles.show')->with('perfil', $perfil);
    }

    public function edit(Perfil $perfil)
    {
        return view('perfiles.edit')->with('perfil', $perfil);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Perfil $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //POLICY
        $this->authorize('update', $perfil);

        //dd($request['imagen']);
        //VALIDAR
        $data = request()->validate([
            'nombre' => 'required',
            'url' => 'required',
            'biografia' => 'required'
        ]);

        //Verificar si el usuario sube una imagen
        if ($request['imagen']) {
            //return 'si se subio la imagen';
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');
//            despues aplicanos estilo
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(600, 600);
            $img->save();

            //Creando un arreglo de imagenes
            $array_image = ['imagen' => $ruta_imagen];
        }

        //dd($data);
        auth()->user()->name = $data['nombre'];
        auth()->user()->url = $data['url'];
        auth()->user()->save();

        //ELIMINAR URL Y NAME DE DATA
        unset($data['nombre']);
        unset($data['url']);

        //GUARDAR INFO TABLA PERFILES
        auth()->user()->userPerfil()->update(array_merge(
            //dos parametros de tipo array
                $data,
                $array_image ?? [] //almacenando la imagen
            )

        );

        //REDIRECCIONAR
        return redirect()->action([RecetaController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Perfil $perfil
     * @return \Illuminate\Http\Response
     */

}
