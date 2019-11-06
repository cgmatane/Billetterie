@extends('interfaces.index')

@section('contenu')
<body id="top">
<div class="row">
</div>
<div class="container">

    <div class="row">
        <div class="col-12">
            <h2 class="text-center text-info font-weight-bold m-5">Montant de la transaction : 55 $CAD</h2>
        </div>
    </div>

    <div class="demo-container row mb-5">
        <div class="card-wrapper justify-content-around col-md-6 col-sm-12 mt-3 mb-3"></div>
        <div class="form-container active justify-content-around col-md-6 col-sm-12">
            <div class="row text-center">
            <form onsubmit="return verifierFormulaire()" action="{{ route('reservation_paiement') }}">
                <h5>{{ $reservation_paiement_renseigner_informations }}</h5>
                <input placeholder="numéro de carte" type="tel" name="number" id="numeroCarte" class="col-10 m-2">
                <div class="alert alert-danger champErreur hidden" id="erreurNumeroCarte">
                    <small class="texteErreur"></small>
                </div>
                <input placeholder="nom tel qu'il est inscrit" onkeyup="this.value = this.value.toUpperCase();" type="text" name="name" id="nom" class="col-10 m-2">
                <div class="alert alert-danger champErreur hidden" id="erreurNom">
                    <small class="texteErreur"></small>
                </div>
                <input placeholder="date d'expiration" type="tel" name="expiry" id="dateExpiration" class="col-10 m-2">
                <div class="alert alert-danger champErreur hidden" id="erreurDateExpiration">
                    <small class="texteErreur"></small>
                </div>
                <input placeholder="CVC" type="number" name="cvc" id="numeroCvc" class="col-10 m-2">
                <div class="alert alert-danger champErreur hidden" id="erreurNumeroCvc">
                    <small class="texteErreur"></small>
                </div>
                <div class="row text-center justify-content-center">
                    <button type="submit" class="btn btn-outline-success my-4 btn-block">
                        {{ $reservation_paiement_payer }}
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script>
        var card = new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });
    </script>
</div>


<div class="container-fluid">
    @component('global_components.zone_bas_de_page')
    @endcomponent
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/reservation_paiement.js')}}"></script>
@endsection
