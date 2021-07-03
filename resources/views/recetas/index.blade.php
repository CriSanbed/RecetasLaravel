@extends('layouts.app')

@section('botones')
<a class="btn btn-primary" href="{{route('recetas.create')}}">Crear Receta</a>
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
                <td>{{$userReceta->categoria_id}}</td>
                <td>
                    <a href="" class="btn btn-success">Ver</a>
                    <a href="" class="btn btn-dark">Editar</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
