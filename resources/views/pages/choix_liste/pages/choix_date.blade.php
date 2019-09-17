@extends('pages.choix_liste.choix_liste')

@section('titre')
    Sélectionnez une date de départ
@endsection

@section('liste')
    <a href="{{ route('index') }}?jour=4"><button type="button" class="btn btn-info mt-5 col-6 p-3" >4 septembre</button></a><br>
    <a href="{{ route('index') }}?jour=5"><button type="button" class="btn btn-info mt-5 col-6 p-3" >5 septembre</button></a><br>
    <a href="{{ route('index') }}?jour=6"><button type="button" class="btn btn-info mt-5 col-6 p-3" >6 septembre</button></a><br>
    <a href="{{ route('index') }}?jour=7"><button type="button" class="btn btn-info mt-5 col-6 p-3" >7 septembre</button></a><br>
    <a href="{{ route('index') }}?jour=8"><button type="button" class="btn btn-info mt-5 col-6 p-3" >8 septembre</button></a><br>
    <a href="{{ route('index') }}?jour=9"><button type="button" class="btn btn-info mt-5 col-6 p-3" >9 septembre</button></a><br>
    <a href="{{ route('index') }}?jour=10"><button type="button" class="btn btn-info mt-5 col-6 p-3" >10 septembre</button></a><br>
@endsection

@section('bouton')
    <a href="{{ route('index') }}"><button type="button" class="btn btn-info m-5 px-5 py-lg-5 py-xs-2">Accueil</button></a>
@endsection
