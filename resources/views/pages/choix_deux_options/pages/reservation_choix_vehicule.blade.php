@extends('pages.choix_deux_options.choix_deux_options')

@section('titre')
    Voyagez-vous avec un véhicule ?
@endsection

@section('route1')
    {{ route('reservation_choix_voiture') }}
@endsection

@section('route2')
    {{ route('reservation_passagers') }}
@endsection

@section('choix1')
    OUI
@endsection

@section('choix2')
    NON
@endsection

@section('choix_precedent')
    {{ route('index') }}
@endsection
