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
                            @if($trajet['plusBeaucoupDePlace']) @slot('plusBeaucoupDePlace') @endslot @endif
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


    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
        </div>

    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
            console.log("wfuigwigwfuig");
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

@endsection

