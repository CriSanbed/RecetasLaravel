@extends('layouts.app')

{{-- ESTILOS --}}
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
          integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection

@section('botones')
    @include('ui.listarecetas')
@endsection

@section('content')
    <h2 class="text-center mb-3">Crear nuevas Recetas</h2>
    {{-- {{$categorias}} --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form method="POST" action={{route('recetas.store')}} enctype="multipart/form-data" novalidate>
                @csrf

                {{-- NOMBRE RECETA --}}
                <div class="form-group">
                    <label for="nombre">Nombre Receta</label>
                    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                           id="nombre" placeholder="Ingresa el nombre de la receta" value="{{old('nombre')}}">
                    @error('nombre')
                    <span class='invalid-feedback d-block' role='alert'>
                    <strong>{{$message}}</strong>
                </span>
                    @enderror
                </div>

                {{-- CATEGORIAS --}}
                <div class="form-group">
                    <label for="nombre">Categoria</label>
                    <select name="categorias" class="form-control @error('categorias') is-invalid @enderror"
                            id="categorias">
                        <option value="" disabled selected>--Seleccione--</option>
                        @foreach($categorias as $categoria)
                            <option
                                value={{$categoria -> id}} {{old('categorias')==$categoria->id ? 'selected' : ''}}>{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                    @error('categorias')
                    <span class='invalid-feedback d-block' role='alert'>
                    <strong>{{$message}}</strong>
                </span>
                    @enderror
                </div>

                {{-- INGREDIENTES --}}
                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input id="ingredientes" type="hidden" name="ingredientes" value="{{old('ingredientes')}}">
                    <trix-editor class="form-control @error('ingredientes') is-invalid @enderror"
                                 input="ingredientes"></trix-editor>
                    @error('ingredientes')
                    <span class='invalid-feedback d-block' role='alert'>
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                {{-- PREPARACION --}}
                <div class="form-group mt-3">
                    <label for="preparacion">Preparacion</label>
                    <input id="preparacion" type="hidden" name="preparacion" value="{{old('preparacion')}}">
                    <trix-editor class="form-control @error('preparacion') is-invalid @enderror"
                                 input="preparacion"></trix-editor>
                    @error('preparacion')
                    <span class='invalid-feedback d-block' role='alert'>
                    <strong>{{$message}}</strong>
                </span>
                    @enderror
                </div>


                {{-- IMAGEN DE LA RECETA --}}
                <div class="form-group mt-3">
                    <label for="imagen">Imagen</label>
                    <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror"
                           name="imagen">
                    @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                    @enderror



                    {{-- BOTON PARA AGREGAR --}}
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="AGREGAR RECETA">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

{{-- SCRIPTS --}}
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
            integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection
