@extends('pages.index')

@section('contenu')
    <body id="top" class="" style="background-color: #004882">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-warning p-4 font-weight-bold">
                    @yield('titre')
                </h1>
            </div>
        </div>
        <div class="text-center row justify-content-center">
            <div class="col-sm-6 col-xs-8  pb-5">
                @yield('liste')
            </div>
        </div>

        <div class="row text-center justify-content-center">
            @yield('bouton')
        </div>
    </div>
@endsection
