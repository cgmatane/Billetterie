@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #d3d3d3">
    <div class="row">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-info font-weight-bold mt-4">{{ $reservation_confirmation_commande_validee }}</h1>
            </div>
        </div>
        <div class="row text-center justify-content-start mt-5">
            <h2> {{ $reservation_confirmation_billet_email }}</h2>
        </div>
        <div class="row text-center justify-content-start">
            <p> {{ $reservation_confirmation_rappel_embarquement }}</p>
        </div>

        <div class="row text-center justify-content-center">
            <a href="{{ route('pdf') }}"><button type="button" class="btn btn-info m-5 px-5 py-lg-5 py-xs-2">
                    Voir le pdf </button></a>
        </div>

        <div class="row text-center justify-content-center">
            <a href="{{ route('index') }}">
                <button type="button" class="btn btn-danger m-5 px-5 py-lg-5 py-xs-2">
                    {{ $global_retour_accueil }}</button>
            </a>
        </div>
    </div>
@endsection
