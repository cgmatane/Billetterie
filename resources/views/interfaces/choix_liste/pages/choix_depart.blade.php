@extends('interfaces.choix_liste.choix_liste')

@section('titre')
    Sélectionnez un lieu de départ
@endsection

@section('liste')
    @component('interfaces.choix_liste.components.bouton_liste_options')
        @slot('typeInformation') jour @endslot
        @slot('valeur') 4 @endslot
        @slot('contenu') Matane @endslot
    @endcomponent

    @component('interfaces.choix_liste.components.bouton_liste_options')
        @slot('typeInformation') jour @endslot
        @slot('valeur') 5 @endslot
        @slot('contenu') Baie Comeau @endslot
    @endcomponent

    @component('interfaces.choix_liste.components.bouton_liste_options')
        @slot('typeInformation') jour @endslot
        @slot('valeur') 6 @endslot
        @slot('contenu') Godbout @endslot
    @endcomponent
@endsection
