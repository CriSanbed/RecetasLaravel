<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public function show(Perfil $perfil)
    {
        return view('perfiles.show')->with('perfil', $perfil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        return view('perfiles.edit')->with('perfil', $perfil);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //VALIDAR
        $data = request()->validate([
           'nombre'=> 'required',
           'url'=> 'required',
           'biografia'=> 'required'
        ]);

        //dd($data);
        auth()->user()->name=$data['nombre'];
        auth()->user()->url=$data['url'];
        auth()->user()->save();

        //ELIMINAR URL Y NAME DE DATA
        unset($data['nombre']);
        unset($data['url']);

        //GUARDAR INFO TABLA PERFILES
        auth()->user()->userPerfil()->update(
            $data
        );
        //ALMACENAR IMAGEN

        //GUARDAR INFORMACION

        //REDIRECCIONAR
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
