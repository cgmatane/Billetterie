@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #d3d3d3; margin: 0">
    {{session('test')}}
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center p-4 m-4 font-weight-bold mb-5"
                        style="font-size: xx-large; color: midnightblue">
                        {{ $choix_deux_options_question }}
                    </h4>
                </div>
            </div>
            <div class="row text-center">
                <a href="?dernierChoix=1"
                   class="bg-white col-5 mx-auto p-5 shadow-lg oui"
                   style=" text-decoration:none; color: #1b1e21;font-size: xx-large; border-radius: 0.5em;">{{ $choix_deux_options_choix1 }}</a>

                <a href="?dernierChoix=2"
                   class="bg-white col-5 mx-auto p-5 shadow-lg non"
                   style=" text-decoration:none; color: #1b1e21;font-size: xx-large; border-radius: 0.5em;">{{ $choix_deux_options_choix2 }}</a>
            </div>
        </div>
        <div style="width: 100% ;height: 400px; background-color: midnightblue; margin-top: -50px; border-radius: 20px">
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 15%">
                    @component('global_components.bouton_retour_precedent')
                        {{ $global_retour_choix_precedent }}
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 20px">
                    <a href="{{ route('index') }}">
                        <button type="button" class="btn btn-outline-retour-menu p-3 mb-5">
                            {{ $global_retour_au_debut }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
