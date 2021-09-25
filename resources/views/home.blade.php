@extends('layouts.app')

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card img-fluid" style="width:100%">
                <div class="card-img-overlay">
                    <h1 class="card-title text-red display-2 font-weight-bold text-center">Recetas
                        <br> &nbsp;&nbsp; Culinarias</h1>
                    <div class="col-md-4">
                        <p class="card-text text font-weight-fantasy align-items-center">
                            Encuentre aqui nuestros mejores platos, disfrute de ecetas exquisitas y unicas, si le agrada puede darnos like o aun mejor puede agregar sus recetas tambien, para que la comunidad la conozca y sigamos creciendo.
                        </p>
                        <p class="card-text text font-weight-fantasy align-items-center"><strong>BON AN APETITE..!!!</strong></p>
                        <a class="btn btn-outline-success btn-block text-uppercase font-weight-bold" href="{{route('recetas.index')}}">
                            <svg class="icono" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            Ver detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

