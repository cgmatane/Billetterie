@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #004882">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-warning font-weight-bold">
                    {{ $informations_titre }}
                </h1>
            </div>
        </div>
        <div class="text-center row justify-content-center">
            <div class="bg-white rounded col-sm-6 col-xs-8 bg-light pt-2 pb-5">
                {!! $informations_contenu !!}
            </div>
        </div>

        <div class="row text-center justify-content-center mt-2">
            @component('global_components.bouton_retour_precedent')
                {{ $global_retour_precedent }}
            @endcomponent
        </div>
    </div>
@endsection
