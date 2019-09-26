@extends('interfaces.index')

@section('contenu')
<body id="top" style="background-color: #d3d3d3">
<div class="row">
    <div class="col-sm-12 col-xs-0">
        <img src="/img/avancement3.PNG" width="100%">
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center text-info font-weight-bold mt-4">{{ $reservation_paiement_renseigner_informations }}</h4>
        </div>
    </div>
    <div class="row text-center justify-content-center mb-5 mt-5">
        <form>
            <div class="row">
                <div class="col">
                    <label for="nom">{{ $reservation_paiement_nom_prenom }}</label>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="nom">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="numeroDeCarte">{{ $reservation_paiement_numero_carte }}</label>
                </div>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="numeroDeCarte" placeholder="1234 1234 1234 5678">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="securite">{{ $reservation_paiement_code_securite }}</label>
                </div>
                <div class="col-sm-7">
                    <input type="tel" class="form-control" id="securite" placeholder="123">
                </div>
            </div>
        </form>
    </div>

    <div class="row text-center justify-content-center">
        <a href="{{ route('reservation_confirmation') }}">
            <button type="button" class="btn btn-success mx-5 my-2 px-5 py-lg-5 py-xs-2">
                {{ $reservation_paiement_payer }}
            </button>
        </a>
    </div>

    <div class="row text-center justify-content-center">
        @component('global_components.bouton_retour_precedent')
            {{ $global_retour_precedent }}
        @endcomponent
    </div>

    <div class="row text-center justify-content-center">
        <a href="{{ route('index') }}"><button type="button" class="btn btn-danger px-5 mb-5 py-lg-3 py-xs-2">
                {{ $global_retour_au_debut }}</button></a>
    </div>
</div>
@endsection
