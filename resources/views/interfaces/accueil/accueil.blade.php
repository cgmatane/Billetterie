@extends('interfaces.index')

@section('titre', $global_titre)

@section('contenu')
    <div class="container-fluid" id="imageFond">
        <div class="text-center row justify-content-center" id="noMargin">
            <div class="col-sm-6 col-xs-8 shadow-lg rounded-lg  mt-6" id="midnightBlue">
                @component('interfaces.accueil.components.titre_principal')
                    {{ $accueil_depart }} {{ $depart }} {{ $date }}
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
                            @slot('id') {{ $trajet['id'] }} @endslot
                            @slot('destination') {{ $trajet['stationArrivee'] }} @endslot
                            @slot('heure') {{ $trajet['heureDepart'] }} @endslot
                        @endcomponent
                    @endforeach
                @endisset
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
    @isset($mail)
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <noscript>{{ $global_activer_javascript }}</noscript>
        <script>
            Swal.fire(
                '{{ $accueil_commande_validee }}',
                '{{ $accueil_mail_envoye }} {{ $mail }}',
                'success'
            )
        </script>
        <noscript>{{ $global_activer_javascript }}</noscript>
    @endisset

@endsection
