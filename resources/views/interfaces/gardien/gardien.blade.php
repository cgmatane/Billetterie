{{-- Permet d'avoir l'affichage de l'interface administration --}}
@extends('interfaces.administration.components.administration_index')

@section('titre')
    {{-- Une donnee statique est prefixe par le nom de la template (ici gardien) - Les variables statiques de cette page sont dans app/Statics/Views/interfaces/gardien --}}
    {{ $gardien_titre }}
@endsection

@section('contenu')
    {{-- ...Les donnees dynamiques n'ont pas de prefixe - Elles sont set dans le controleur dans app\Http\Controllers\Pages\GardienController, dans la methode setDonneesDynamiques --}}
    {{ $exemple_donnee_dynamique }}
@endsection



@section('scripts')
    <script src="{{URL::asset('js/gardien.js')}}"></script>
    <noscript>{{ $global_activer_javascript }}</noscript>
@endsection