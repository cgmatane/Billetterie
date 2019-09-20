@extends('interfaces.index')

@section('contenu')
<div class="container-fluid" style="background: url(/img/fond.jpg) 0 0 fixed no-repeat;background-size: 100% 100%;">
        <div class="row">
        <div class="col-12 mt-5 mb-5">
            @component('interfaces.accueil.components.titre_principal')
                {{ $accueil_depart }} Matane <?php if (isset($_GET['jour'])) {echo $_GET['jour'] ; } else { echo '4' ; } ?> septembre
            @endcomponent
        </div>
    </div>
    <div class="text-center row justify-content-center">
        <div class="bg-white col-sm-6 col-xs-8 bg-light pb-5 shadow-lg rounded-lg">
            @component('interfaces.accueil.components.titre_choix_destination_heure_depart')
                {{ $accueil_choix_destination_heure_depart }}
            @endcomponent


            @component('interfaces.accueil.components.bouton_choix_trajet')
                @slot('destination') Godbout @endslot
                @slot('heure') 10h00 @endslot
            @endcomponent

            @component('interfaces.accueil.components.bouton_choix_trajet')
                @slot('destination') Godbout @endslot
                @slot('heure') 13h30 @endslot
            @endcomponent

            @component('interfaces.accueil.components.bouton_choix_trajet')
                @slot('destination') Godbout @endslot
                @slot('heure') 16h00 @endslot
            @endcomponent

            @component('interfaces.accueil.components.bouton_choix_trajet')
                @slot('destination') Baie-Comeau @endslot
                @slot('heure') 10h45 @endslot
            @endcomponent

            @component('interfaces.accueil.components.bouton_choix_trajet')
                @slot('destination') Baie-Comeau @endslot
                @slot('heure') 13h30 @endslot
            @endcomponent

            @component('interfaces.accueil.components.bouton_choix_trajet')
                @slot('destination') Baie-Comeau @endslot
                @slot('heure') 15h30 @endslot
            @endcomponent

        </div>
    </div>
    <div class="row text-center justify-content-around">
        @component('interfaces.accueil.components.bouton_changer_parametres_depart')
            @slot('route')
                {{ route('choix_date') }}
            @endslot
            {{ $accueil_choix_autre_date }}
        @endcomponent

        @component('interfaces.accueil.components.bouton_changer_parametres_depart')
            @slot('route')
                {{ route('choix_date') }}
            @endslot
            {{ $accueil_choix_autre_date }}
        @endcomponent
    </div>
   <!-- <div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; z-index: -999999; position: fixed; width: 100%; height: 100%;">
        <img src="/img/fond.PNG" style="position: absolute; margin: 0px; padding: 0px; border: none; max-height: none; max-width: none; z-index: -999999; width:100%; height: 100%; left: -98.9079px; top: 0px;">
    </div>
    -->
</div>

@endsection
