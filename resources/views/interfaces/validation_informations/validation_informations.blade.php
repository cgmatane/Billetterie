@extends('interfaces.index')

@section('contenu')
    <p class="h2 mb-4 font-weight-bold my-5 text-center" id="texteHaut">{{ $validation_informations_recapitulatif_billet }}</p>

    @include('interfaces.validation_informations.components.cadre_informations')

    <div class="container">
        <a href="{{ route('reservation_paiement') }}" id="textDecoration">
            <div class="btn btn-outline-success my-4 btn-block">
                {{ $validation_informations_valider_informations_billet }}
            </div>
        </a>
    </div>
    <div class="container-fluid">
        @component('global_components.zone_bas_de_page')
        @endcomponent
    </div>
@endsection
