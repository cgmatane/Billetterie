@extends('interfaces.index')

@section('contenu')

    <script>
        function surligne(champ, erreur)
        {
            if(erreur)
                champ.style.backgroundColor = "#fba";
            else
                champ.style.backgroundColor = "";
        }
    </script>
<body id="top" style="background-color: #d3d3d3;">
<div class="row">
    <!--
    <div class="col-sm-12 col-xs-0">
        <img src="/img/avancement2.PNG" width="100%">
    </div>
    -->
</div>
<div class="container">
    <!--<div class = "row">
        <div class = "col">Votre billet : </div>
        <div class = "col">Destination : {{$destination}}</div>
        <div class = "col">Heure de départ : {{$heure}}</div>
        <div class = "col">Moyen de transport : {{$type_vehicule}}</div>
        <div class = "col">Surplus charge lourde : {{$poids_eleve}}</div>
    </div> -->
    <div class="row">
    </div>

        <form class="text-center border border-light p-5 mt-5 mb-5">

            <p class="h2 mb-4 font-weight-bold mb-5" style="color: midnightblue">{{ $reservation_passagers_renseigner_informations }}</p>

            <div class="form-row mb-5">
                <div class="col-sm-5 col-12">

                    <input type="text" id="defaultRegisterFormFirstName" class="form-control " placeholder="{{ $reservation_passagers_nom }}">
                </div>
                <div class="col-sm-5 col-12">

                    <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="{{ $reservation_passagers_prenom }}">
                </div>
                <div class="col-sm-2 col-12">
                    <select class="browser-default custom-select">
                        <option value="1">moins de 18 ans</option>
                        <option value="2" selected>entre 18 et 60 ans</option>
                        <option value="3">plus de 60 ans</option>
                    </select>
                </div>
            </div>

            <!--
            <div class="col">
                <button class="btn btn-outline-ajout mb-3" style="float: right; margin-top: -10px; ">ajouter un passager</button>
            </div>
            -->

            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4 mb-3" placeholder="{{ $reservation_passagers_courriel }}">

            <input type="text" id="defaultRegisterPhonePassword" class="form-control mb-3" placeholder="{{ $reservation_passagers_numero }}" aria-describedby="defaultRegisterFormPhoneHelpBlock">
            <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                {{ $reservation_passagers_tel_necessaire }}
            </small>


            <div class="form-group">
                <input type="checkbox" id="checkbox" style="display: none;">
                <label for="checkbox" class="check">
                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                </label>
                <label class="form-check-label" for="checkbox">{{$reservation_passagers_confirmation_matieres }}</label>
            </div>

            <div class="form-group">
                <input type="checkbox" id="checkbox2" style="display: none;">
                <label for="checkbox2" class="check">
                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                </label>
                <label class="form-check-label" for="checkbox">{{$reservation_passagers_confirmation_animaux }}</label>
            </div>

            <a href="{{ route('validation_informations') }}">
                <button type="button" class="btn btn-outline-success my-4 btn-block">
                    {{ $reservation_passagers_paiement}}
                </button>
            </a>

        </form>
</div>
<div class="container-fluid">
        <div style="width: 100% ;height: 400px; background-color: #002A4D; margin-top: -50px; border-radius: 20px">
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 55px">
                    @component('global_components.bouton_retour_precedent')
                        {{ $global_retour_choix_precedent }}
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 20px">
                    <a href="{{ route('index') }}">
                        <button type="button" class="btn btn-outline-retour-menu p-3">
                            {{ $global_retour_au_debut }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
</div>
@endsection
