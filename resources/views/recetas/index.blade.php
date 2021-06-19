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
            <tr>
                <td>Pizza de camarones</td>
                <td>Pizzas</td>
                <td>-------------</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection



