@extends('interfaces.index')

@section('contenu')
<body id="top" style="background-color: #d3d3d3;">
<div class="row">
    <div class="col-sm-12 col-xs-0">
        <img src="/img/avancement2.PNG" width="100%">
    </div>
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
        <div class="col-12">
            <h4 class="text-center text-info font-weight-bold mt-4">Renseignez vos informations</h4>
        </div>
    </div>
    <div class="row text-center justify-content-center mb-5 mt-5">
    <form>
        <div class="row">
            <div class="col">
                <label for="nom">Nom :</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="nom">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="prenom">Prénom :</label>
            </div>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="prenom">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="exampleFormControlInput1">Courriel :</label>
            </div>
            <div class="col-sm-7">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="phone">Numéro de mobile :</label>
            </div>
            <div class="col-sm-7">
                <input type="tel" class="form-control" id="phone" placeholder="418 000-1234">
            </div>
        </div>
        <div class="row">
                <div>
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Je ne voyage pas avec des animaux exotiques</label>
                    <br/>
                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                    <label class="form-check-label" for="exampleCheck2">Je ne transporte pas de marchandises dangereuses</label>
                </div>
        </div>
    </form>
    </div>

    <div class="row text-center justify-content-center">
        <a href="{{ route('reservation_paiement') }}"><button type="button" class="btn btn-success mx-5 my-2 px-5 py-lg-5 py-xs-2">
                Procéder au paiement</button></a>
    </div>
</div>
<div class="container-fluid">
        <div style="width: 100% ;height: 400px; background-color: #002A4D; margin-top: -50px; border-radius: 20px">
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 15%">
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
