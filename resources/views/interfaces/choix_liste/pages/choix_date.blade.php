@extends('interfaces.choix_liste.choix_liste')

@section('titre')
    Sélectionnez une date de départ
@endsection

@section('liste')

    @component('interfaces.choix_liste.components.bouton_liste_options')
        @slot('typeInformation') jour @endslot
        @slot('valeur') 4 @endslot
        @slot('contenu') 4 Septembre @endslot
    @endcomponent

    @component('interfaces.choix_liste.components.bouton_liste_options')
        @slot('typeInformation') jour @endslot
        @slot('valeur') 5 @endslot
        @slot('contenu') 5 Septembre @endslot
    @endcomponent

    @component('interfaces.choix_liste.components.bouton_liste_options')
        @slot('typeInformation') jour @endslot
        @slot('valeur') 6 @endslot
        @slot('contenu') 6 Septembre @endslot
    @endcomponent

    @component('interfaces.choix_liste.components.bouton_liste_options')
        @slot('typeInformation') jour @endslot
        @slot('valeur') 7 @endslot
        @slot('contenu') 7 Septembre @endslot
    @endcomponent

    @component('interfaces.choix_liste.components.bouton_liste_options')
        @slot('typeInformation') jour @endslot
        @slot('valeur') 8 @endslot
        @slot('contenu') 8 Septembre @endslot
    @endcomponent

    @component('interfaces.choix_liste.components.bouton_liste_options')
        @slot('typeInformation') jour @endslot
        @slot('valeur') 9 @endslot
        @slot('contenu') 9 Septembre @endslot
    @endcomponent

    @component('interfaces.choix_liste.components.bouton_liste_options')
        @slot('typeInformation') jour @endslot
        @slot('valeur') 10 @endslot
        @slot('contenu') 10 Septembre @endslot
    @endcomponent

@endsection
