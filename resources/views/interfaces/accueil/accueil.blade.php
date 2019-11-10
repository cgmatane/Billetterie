@extends('interfaces.index')

@section('contenu')
<div class="container-fluid" id="imageFond">
    <div>
    <div class="text-center row justify-content-center" id="noMargin">
        <div class="col-sm-6 col-xs-8 shadow-lg rounded-lg  mt-6" id="midnightBlue">
            @component('interfaces.accueil.components.titre_principal')
                @if($validation != "")
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                    <script>
                        Swal.fire(
                            'ObsoleteCommande validée !',
                            'Un mail vous a été envoyé !',
                            'success'
                        )
                    </script>
                @endif

                {{ $accueil_depart }}
                @if(empty($depart))
                    Matane
                @else
                    {{ $depart }}
                @endif
                @if(empty($date))
                    4 Septembre
                @else
                    {{ $date }}
                @endif
            @endcomponent
        </div>
    </div>

    <div class="text-center row justify-content-center">
        <div class="bg-white col-sm-6 col-xs-8 bg-light pb-5 shadow-lg rounded-lg">
            @component('interfaces.accueil.components.titre_choix_destination_heure_depart')
                {{ $accueil_choix_destination_heure_depart }}
            @endcomponent

            @isset($trajets)
                @foreach ($trajets as $trajet)
                    @component('interfaces.accueil.components.bouton_choix_trajet')
                        @slot('destination') {{ $trajet['stationArrivee'] }} @endslot
                        @slot('heure') {{ $trajet['heureDepart'] }} @endslot
                    @endcomponent
                @endforeach
            @endisset


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
    <div class="text-center row justify-content-center">
        <div class="col-sm-6 col-xs-8 p-0">
            <div class="col-sm-5 col-xs-12 float-left">
        @component('interfaces.accueil.components.bouton_changer_parametres_depart')
            @slot('route')
                {{ route('choix_date') }}
            @endslot
            {{ $accueil_choix_autre_date }}
        @endcomponent
            </div>

            <div class="col-sm-5 col-xs-12 float-right">
        @component('interfaces.accueil.components.bouton_changer_parametres_depart')
            @slot('route')
                {{ route('choix_depart') }}
            @endslot
            {{ $accueil_choix_autre_depart }}
        @endcomponent
            </div>
        </div>
    </div>
</div>

@endsection
