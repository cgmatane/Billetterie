@include('partials.head')
@include('partials.nav')

<body id="top" class="" style="background-color: #004882">
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center text-warning p-4 font-weight-bold">Votre voiture possède-t-elle une remorque ?</h4>
        </div>
    </div>
    <div class="row text-center">
        <a href="/choix/poids_vehicule" class="bg-white rounded-sm col-5 ml-1 mx-auto pb-5 pt-5 display-4"
           style="height: 200px; text-decoration:none;">OUI</a>

        <a href="/choix/poids_vehicule" class="bg-white rounded-sm col-5 ml-1 mx-auto pb-5 pt-5 display-4"
           style="height: 200px; text-decoration:none;">NON</a>
    </div>

    <div class="row text-center justify-content-center">
        <a href="/reservation/voiture"><button type="button" class="btn btn-warning mt-5 mb-5 px-5 py-lg-3 py-xs-2">
                Retour au choix précédent </button></a>
    </div>

    <div class="row text-center justify-content-center">
        <a href="/index"><button type="button" class="btn btn-danger px-5 py-lg-3 py-xs-2">
                Recommencer</button></a>
    </div>
</div>

@include('partials.footer')
@include('partials.foot')

