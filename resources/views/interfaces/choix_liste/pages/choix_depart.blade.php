@extends('interfaces.choix_liste.choix_liste')

@section('titre')
    Sélectionnez un lieu de départ
@endsection

@section('liste')
    <a href="{{ route('index') }}?jour=4"><button type="button" class="btn btn-info mt-5 col-6 p-3" >Matane</button></a><br>
    <a href="{{ route('index') }}?jour=5"><button type="button" class="btn btn-info mt-5 col-6 p-3" >Baie Comeau</button></a><br>
    <a href="{{ route('index') }}?jour=6"><button type="button" class="btn btn-info mt-5 col-6 p-3" >Godbout</button></a><br>
@endsection

@section('bouton')
    <a href="{{ route('index') }}"><button type="button" class="btn btn-info m-5 px-5 py-lg-5 py-xs-2">Accueil</button></a>
@endsection
