@include('partials.head')
@include('partials.nav')

<body id="top" class="" style="background-color: #004882">
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center text-warning p-4 font-weight-bold">De quel type est votre véhicule ?</h4>
        </div>
    </div>
    <div class="row text-center">
        <a href="/choix/poids_vehicule" class="bg-white rounded-sm col-5 ml-1 mx-auto pb-5 pt-5 display-4"
           style="height: 200px; text-decoration:none;">Camionnette</a>

        <a href="/choix/poids_vehicule" class="bg-white rounded-sm col-5 ml-1 mx-auto pb-5 pt-5 display-4"
           style="height: 200px; text-decoration:none;">Poids lourd</a>
    </div>

    <div class="row text-center justify-content-center">
        <a href=""><button type="button" class="btn btn-warning mt-5 mb-5 px-5 py-lg-3 py-xs-2">
                Retour au choix precedent </button></a>
    </div>

    <div class="row text-center justify-content-center">
        <a href="/index"><button type="button" class="btn btn-danger px-5 py-lg-3 py-xs-2">
                Recommencer</button></a>
    </div>
</div>

@include('partials.footer')
@include('partials.foot')
