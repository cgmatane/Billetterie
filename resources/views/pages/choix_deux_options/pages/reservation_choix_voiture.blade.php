@extends('pages.choix_deux_options.choix_deux_options')

@section('titre')
    Votre véhicule est-il une voiture ?
@endsection

@section('route1')
    {{ route('reservation_choix_remorque') }}
@endsection

@section('route2')
    {{ route('reservation_choix_autre_vehicule') }}
@endsection

@section('choix1')
    OUI
@endsection

@section('choix2')
    NON
@endsection

@section('choix_precedent')
    {{ route('reservation_choix_vehicule') }}
@endsection
