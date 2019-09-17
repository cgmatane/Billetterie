@extends('interfaces.choix_deux_options.choix_deux_options')

@section('titre')
    Votre véhicule dépasse t-il xxx Kg ?
@endsection

@section('route1')
    {{ route('reservation_matieres') }}
@endsection

@section('route2')
    {{ route('reservation_matieres') }}
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
