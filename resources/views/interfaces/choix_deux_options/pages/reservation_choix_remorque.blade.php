@extends('interfaces.choix_deux_options.choix_deux_options')

@section('titre')
    Votre voiture possède-t-elle une remorque ?
@endsection

@section('route1')
    {{ route('reservation_poids') }}
@endsection

@section('route2')
    {{ route('reservation_poids') }}
@endsection

@section('choix1')
    OUI
@endsection

@section('choix2')
    NON
@endsection

@section('choix_precedent')
    {{ route('reservation_choix_voiture') }}
@endsection
