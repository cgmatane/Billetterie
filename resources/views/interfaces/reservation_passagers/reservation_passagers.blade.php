@extends('interfaces.index')

@section('contenu')
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
        <!-- Default form register -->
        <form class="text-center border border-light p-5 mt-5 mb-5">

            <p class="h2 mb-4 text-info font-weight-bold mb-5">Renseignez vos informations</p>

            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="defaultRegisterFormFirstName" class="form-control mb-3" placeholder="Nom">
                </div>
                <div class="col">
                    <!-- Last name -->
                    <input type="text" id="defaultRegisterFormLastName" class="form-control mb-3" placeholder="Prenom">
                </div>
            </div>

            <!-- E-mail -->
            <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4 mb-3" placeholder="E-mail">

            <!-- Phone number -->
            <input type="text" id="defaultRegisterPhonePassword" class="form-control mb-3" placeholder="Numéro de Téléphone" aria-describedby="defaultRegisterFormPhoneHelpBlock">
            <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                nécessaire en cas d'annulation ou de retard
            </small>

            <!-- Newsletter -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="matieres">
                <label class="custom-control-label" for="matieres">je confirme ne pas transporter de matières dangereuses</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="animaux">
                <label class="custom-control-label" for="animaux">je confirme ne pas transporter d'animaux exotiques</label>
            </div>

            <!-- Sign up button -->
            <a href="{{ route('reservation_paiement') }}"><button type="button" class="btn btn-outline-success my-4 btn-block">
                    Procéder au paiement</button></a>

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
