@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #BDBDBD; margin: 0">
    {{session('test')}}
    <div class="container-fluid">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center text-warning p-4 m-4 font-weight-bold" style="font-size: xx-large">
                     {{ $choix_deux_options_question }}
                </h4>
            </div>
        </div>
        <div class="row text-center">
            <a href="{{ $choix_deux_options_lien_choix1 }}?dernierChoix=1" class="bg-white rounded-sm col-5 mx-auto p-5 display-3 shadow-lg oui"
               style=" text-decoration:none; color: #1b1e21">{{ $choix_deux_options_choix1 }}</a>

            <a href="{{ $choix_deux_options_lien_choix2 }}?dernierChoix=2" class="bg-white rounded-sm col-5 mx-auto p-5 display-3 shadow-lg non"
               style=" text-decoration:none; color: #1b1e21">{{ $choix_deux_options_choix2 }}</a>
        </div>
        </div>
        <div style="margin-top: -50px">
        <div style="background-color: #1d643b; width: 100%">
        <div class="row text-center justify-content-center">
            @component('global_components.bouton_retour_precedent')
                {{ $global_retour_choix_precedent }}
            @endcomponent
        </div>

        <div class="row text-center justify-content-center">
            <a href="{{ route('index') }}">
                <button type="button" class="btn btn-danger px-5 py-lg-3 py-xs-2 mb-5">
                    {{ $global_retour_au_debut }}
                </button>
            </a>
        </div>
        </div>
        </div>
    </div>
@endsection
