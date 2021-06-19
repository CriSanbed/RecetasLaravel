@extends('layouts.app')

@section('botones')
    <a class="btn btn-primary" href="{{route('recetas.index')}}">Volver a Recetas</a>
@endsection

@section('content')
    <h2 class="text-center mb-3">Crear nuevas Recetas</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action={{route('recetas.store')}} novalide>
            @csrf
                <div class="form-group">
                    <label for="nombre">Nombre Receta</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" id="nombre" placeholder="Ingresa el nombre de la receta" value={{old('nombre')}}>
                    @error('nombre')
                        {{-- <p>Hubo un error de longitud de  caracteres</p> EJEMPLO--}} 
                        <span class='invalid-feedback d-block' role='alert'>
                            <strong>{{$message}}</strong>  
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="AGREGAR">
                </div>
            </form>
        </div>
    </div>

@endsection