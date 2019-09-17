@extends('interfaces.index')

@section('contenu')
    <body id="top" class="" style="background-color: #004882">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center text-warning p-4 font-weight-bold">
                     @yield('titre')
                </h4>
            </div>
        </div>
        <div class="row text-center">
            <a href="@yield('route1')" class="bg-white rounded-sm col-5 ml-1 mx-auto pb-5 pt-5 display-4"
               style="height: 200px; text-decoration:none;">@yield('choix1')</a>

            <a href="@yield('route2')" class="bg-white rounded-sm col-5 ml-1 mx-auto pb-5 pt-5 display-4"
               style="height: 200px; text-decoration:none;">@yield('choix2')</a>
        </div>

        <div class="row text-center justify-content-center">
            <a href="@yield('choix_precedent')"><button type="button" class="btn btn-warning mt-5 mb-5 px-5 py-lg-3 py-xs-2">
                    Retour au choix précédent </button></a>
        </div>

        <div class="row text-center justify-content-center">
            <a href="{{ route('index') }}"><button type="button" class="btn btn-danger px-5 py-lg-3 py-xs-2">
                    Recommencer</button></a>
        </div>
    </div>
@endsection
