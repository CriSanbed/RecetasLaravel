@extends('layouts.app')

@section('botones')
    @include('ui.navegacion')
@endsection

@section('content')
    <h2 class="text-center mb-3">Administra tus Recetas</h2>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
            <tr>
                <th scole="col">NOMBRE</th>
                <th scole="col">CATEGORIA</th>
                <th scole="col">ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($userRecetas as $userReceta)
                <tr>
                    <td>{{$userReceta->nombre}}</td>
                    <td>{{$userReceta->categoriaReceta->nombre}}</td>
                    <td>
                        <a href="{{route('recetas.show', ['receta'=>$userReceta->id])}}"
                           class="btn btn-success d-block">Ver</a>
                        <a href="{{route('recetas.edit', ['receta'=>$userReceta->id])}}"
                           class="btn btn-dark d-block mt-1">Editar</a>
                        <eliminar-receta receta-id={{$userReceta->id}}></eliminar-receta>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        PAGINACION--}}
        <div class="col-12 mt-4 justify-content-center d-flex">

            {{$userRecetas->links()}}
        </div>
{{--        {{$iLikes}}--}}
        @if(count($iLikes) > 0)

        <h2 class="text-center my-5">Recetas que te gustan</h2>
        <div class="col-md-10 mx-auto bg-white p3">
            <ul class="list-group">
                @foreach($iLikes as $recetaLike)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <p>{{$recetaLike->nombre}}</p>
                        <a class="btn btn-outline-primary text-uppercase font-weight-bold" href="{{route('recetas.show', ['receta'=> $recetaLike->id])}}">Ver</a>
                    </li>
                @endforeach
            </ul>

        </div>
        @else
            <p class="text-center my-5 font-weight-bold">Aún no tienes recetas que te gusten</p>
        @endif
    </div>
@endsection
