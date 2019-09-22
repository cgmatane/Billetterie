@extends('interfaces.index')

@section('contenu')
    <body id="top" class="" style="background-color: #004882">
    {{session('test')}}
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center text-warning p-4 font-weight-bold">
                     {{ $choix_deux_options_question }}
                </h4>
            </div>
        </div>
        <div class="row text-center">
            <a href="{{ $choix_deux_options_lien_choix1 }}?dernierChoix=1" class="bg-white rounded-sm col-5 ml-1 mx-auto pb-5 pt-5 display-4"
               style="height: 200px; text-decoration:none;">{{ $choix_deux_options_choix1 }}</a>

            <a href="{{ $choix_deux_options_lien_choix2 }}?dernierChoix=2" class="bg-white rounded-sm col-5 ml-1 mx-auto pb-5 pt-5 display-4"
               style="height: 200px; text-decoration:none;">{{ $choix_deux_options_choix2 }}</a>
        </div>

        <div class="row text-center justify-content-center">
            @component('global_components.bouton_retour_precedent')
                {{ $global_retour_choix_precedent }}
            @endcomponent
        </div>

        <div class="row text-center justify-content-center">
            <a href="{{ route('index') }}">
                <button type="button" class="btn btn-danger px-5 py-lg-3 py-xs-2">
                    {{ $global_retour_au_debut }}
                </button>
            </a>
        </div>
    </div>
@endsection
