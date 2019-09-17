@extends('interfaces.choix_deux_options.choix_deux_options')

@section('titre')
    De quel type est votre véhicule ?
@endsection

@section('route1')
    {{ route('reservation_poids') }}
@endsection

@section('route2')
    {{ route('reservation_poids') }}
@endsection

@section('choix1')
    Camionnette
@endsection

@section('choix2')
    Poids lourd
@endsection

@section('choix_precedent')
    {{ route('reservation_choix_voiture') }}
@endsection
