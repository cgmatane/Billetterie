
@extends('interfaces.index')

@section('contenu')
    <body id="top">
    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <h1 class="text-center font-weight-bold" id="texteHaut">
                    {{ $informations_titre }}
                </h1>
            </div>
        </div >
        <div class="text-center row justify-content-center mb-5">
            <div class="bg-white rounded col-sm-6 col-xs-8 bg-light pt-2 pb-5">
                {!! $informations_contenu !!}
            </div>
            <div class="container-fluid" id="footerChoixMultiples">
                <div id="footerInformation">
                    <div class="row col-sm-12">
                        <div class="col" id="retourInformation">
                            @component('global_components.bouton_retour_precedent')
                                Retour
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


