@extends('interfaces.index')

@section('titre', $global_titre)

<script>
    var i=0;
</script>

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
                    @foreach ($trajets as $numero=>$trajet)
                        @component('interfaces.accueil.components.bouton_choix_trajet', ['trajet' => $trajet])
                            @if($trajet['urgent']) @slot('urgent') @endslot @endif
                        @endcomponent
                    @endforeach
                @endisset
            </div>
        </div>
        <div class="text-center row justify-content-center">
            <div class="col-sm-6 col-xs-8 p-0">
                <div class="col-sm-5 col-xs-12 float-left">
                    <a class="btn btn-outline-param my-3 my-sm-5 p-3 " style="font-size: 1.5em" href="{{ route('choix_date') }}">
                            {{ $accueil_choix_autre_date }}
                    </a>
                </div>

                <div class="col-sm-5 col-xs-12 float-right">
                    <a class="btn btn-outline-param mt-3 mb-5 my-sm-5 p-3 " style="font-size: 1.5em" href="{{ route('choix_depart') }}">
                            {{ $accueil_choix_autre_depart }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-infos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Informations sur le trajet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-inline-block date-arrivee">
                        Ce trajet arrive le <span class="donnees">&nbsp;</span>
                    </div>
                    <div class="d-inline heure-arrivee">
                       à <span class="donnees"></span>.
                    </div>
                    <div class="navire">
                        Le navire utilisé pour ce trajet est le <span class="donnees"></span>.
                    </div>
                    <div class="nombre-places-restantes-passagers">
                        Il reste <span class="donnees"></span> places passager pour ce trajet.
                    </div>
                    <div class="nombre-places-restantes-vehicules">
                        Le reste <span class="donnees"></span> places véhicule pour ce trajet.
                    </div>
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

@section('scripts')
    <script src="{{URL::asset('js/accueil.js')}}"></script>
@endsection
