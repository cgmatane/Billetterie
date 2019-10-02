@extends('interfaces.index')

@section('contenu')
    <script src="/js/app.js"></script>
<body id="top" style="background-color: #d3d3d3">
<div class="row">
</div>
<div class="container">
    <!--
    <div class="row">
        <div class="col-12">
            <h4 class="text-center text-info font-weight-bold m-5">{{ $reservation_paiement_renseigner_informations }}</h4>
        </div>
    </div>
    -->

    <div class="row">
        <div class="col-12">
            <h2 class="text-center text-info font-weight-bold m-5">Montant de la transaction : 55 $CAD</h2>
        </div>
    </div>

    <div class="demo-container row mb-5">
        <div class="card-wrapper justify-content-around col-md-6 col-sm-12 mt-3 mb-3"></div>
        <div class="form-container active justify-content-around col-md-6 col-sm-12">
            <div class="row text-center">
            <form action="">
                <h5>Veuillez renseigner vos informations</h5>
                <input placeholder="numéro de carte" type="tel" name="number" class="col-10 m-2">
                <input placeholder="nom tel qu'il est inscrit" type="text" name="name" class="col-10 m-2">
                <input placeholder="date d'expiration" type="tel" name="expiry" class="col-10 m-2">
                <input placeholder="CVC" type="number" name="cvc" class="col-10 m-2">
            </form>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
    <script>
        var card = new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
    </script>

    <div class="row text-center justify-content-center">
        <a href="{{ route('reservation_confirmation') }}">
            <button type="button" class="btn btn-success p-5 pl-5">
                {{ $reservation_paiement_payer }}
            </button>
        </a>
    </div>

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
