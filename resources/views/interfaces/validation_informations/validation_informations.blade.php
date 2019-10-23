@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #d3d3d3;">
    <p class="h2 mb-4 font-weight-bold my-5 text-center"
       style="color: midnightblue">{{ $validation_informations_recapitulatif_billet }}</p>


    @include('interfaces.validation_informations.components.cadre_informations')

    <div class="container">
        <a href="{{ route('reservation_paiement') }}" style="text-decoration: none">
            <button type="button" class="btn btn-outline-success my-4 btn-block">
                {{ $validation_informations_valider_informations_billet }}
            </button>
        </a>
    </div>
    <div class="container-fluid">
        <div style="width: 100% ;height: 400px; background-color: #002A4D; margin-top: 50px; border-radius: 20px">
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 55px">
                    @component('global_components.bouton_retour_precedent')
                        {{ $global_retour_choix_precedent }}
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 20px">
                    <a href="{{ route('index') }}">
                        <button type="button" class="btn btn-outline-retour-menu p-3">
                            {{ $global_retour_au_debut }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
