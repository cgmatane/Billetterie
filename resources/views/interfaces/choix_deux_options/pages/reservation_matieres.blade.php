@extends('interfaces.choix_deux_options.choix_deux_options')

@section('titre')
    Voyagerez-vous avec des matières dangereuses ?
@endsection

@section('route1')
    {{ route('informations_matieres') }}
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
    {{ route('reservation_poids') }}
@endsection
