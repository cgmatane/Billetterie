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
        @component('global_components.zone_bas_de_page')
        @endcomponent
    </div>
@endsection
