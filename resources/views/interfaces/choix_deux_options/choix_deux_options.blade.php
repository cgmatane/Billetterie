@extends('interfaces.index')

@section('contenu')
    <div class="container-fluid">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center p-4 m-4 font-weight-bold mb-5" id="texteHaut">
                        {{ $choix_deux_options_question }}
                    </h2>
                </div>
            </div>
            <div class="row text-center">
                <a href="?dernierChoix=1"
                   class="bg-white col-5 mx-auto p-5 shadow-lg oui boutonChoix">
                    <em class="{{ $choix_deux_options_icone1 }}" id="vert"></em>
                    {{ $choix_deux_options_choix1 }}</a>

                <a href="?dernierChoix=2"
                   class="bg-white col-5 mx-auto p-5 shadow-lg non boutonChoix">
                    <em class="{{ $choix_deux_options_icone2 }} " id="tomato"></em>
                    {{ $choix_deux_options_choix2 }}</a>
            </div>
        </div>
        <div class="container-fluid" id="footerChoixMultiples">
            @include('global_components.zone_bas_de_page')
        </div>
    </div>

@endsection
