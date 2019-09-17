@extends('interfaces.index')

@section('contenu')
<body id="top" style="background-color: #004882">
<div class="container">
    <div class="row">
        <div class="col-12">
            @component('interfaces.accueil.components.titre_principal')
                {{ $accueil_depart }} Matane <?php if (isset($_GET['jour'])) {echo $_GET['jour'] ; } else { echo '4' ; } ?> septembre
            @endcomponent
        </div>
    </div>
    <div class="text-center row justify-content-center">
        <div class="bg-white col-sm-6 col-xs-8 bg-light pb-5">
            @component('interfaces.accueil.components.titre_choix_destination_heure_depart')
                {{ $accueil_choix_destination_heure_depart }}
            @endcomponent


            @component('interfaces.accueil.components.bouton_choix_trajet') Godbout : 10h00  @endcomponent
            @component('interfaces.accueil.components.bouton_choix_trajet') Godbout : 13h30  @endcomponent
            @component('interfaces.accueil.components.bouton_choix_trajet') Godbout : 16h00  @endcomponent

            @component('interfaces.accueil.components.bouton_choix_trajet') Baie-Comeau : 10h45  @endcomponent
            @component('interfaces.accueil.components.bouton_choix_trajet') Baie-Comeau : 13h00  @endcomponent
            @component('interfaces.accueil.components.bouton_choix_trajet') Baie-Comeau : 15h30  @endcomponent

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
</div>

@endsection
