@extends('interfaces.index')

@section('contenu')
    <body id="top">
    {{session('test')}}
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center p-4 m-4 font-weight-bold mb-5" id="texteHaut">
                        {{ $choix_deux_options_question }}
                    </h4>
                </div>
            </div>
            <div class="row text-center">
                <a href="?dernierChoix=1"
                   class="bg-white col-5 mx-auto p-5 shadow-lg oui" id="boutonChoix"> <i class="{{ $choix_deux_options_icone1 }}" id="vert"></i>  {{ $choix_deux_options_choix1 }}</a>

                <a href="?dernierChoix=2"
                   class="bg-white col-5 mx-auto p-5 shadow-lg non" id="boutonChoix"> <i class="{{ $choix_deux_options_icone2 }} " id="tomato"></i> {{ $choix_deux_options_choix2 }}</a>
            </div>
        </div>
        <div class="container-fluid" id="footerChoixMultiples">
            @component('global_components.zone_bas_de_page')
            @endcomponent
        </div>
    </div>

@endsection
