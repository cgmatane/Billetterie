
@extends('interfaces.index')

@section('titre', $informations_titre_page)

@section('contenu')
    <div class="container-fluid">
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <h2 class="text-center font-weight-bold" id="texteHaut">
                    {{ $informations_titre }}
                </h2>
            </div>
        </div>
        <div class="text-center row justify-content-center mb-5">
            <div class="bg-white rounded col-sm-6 col-xs-8 bg-light pt-2 pb-5">
                <h3>{{ $informations_a_savoir }}</h3>
                <div id="milieuInfo">
                    <ul>
                        <li>
                            <p class="font-weight-bold">{{ $informations_conditions_climatiques }}</p>
                            <p>{{ $informations_cas_annulation }}</p>
                        </li>
                        <li>
                            <p class="font-weight-bold">{{ $informations_question_embarquement }}</p>
                            <p>{{ $informations_reponse_embarquement }}</p>
                        </li>
                        <li>
                            <p class="font-weight-bold">{{ $informations_question_remboursement }}</p>
                            <p>{{ $informations_reponse_remboursement }}</p>
                        </li>
                        <li>
                            <p class="font-weight-bold">{{ $informations_question_contact }}</p>
                            <p>{{ $informations_reponse_contact }}</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid" id="footerChoixMultiples">
                <div id="footerInformation">
                    <div class="row col-sm-12">
                        <div class="col" id="retourInformation">
                            @component('global_components.bouton_retour_precedent')
                                {{ $global_retour_precedent }}
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


