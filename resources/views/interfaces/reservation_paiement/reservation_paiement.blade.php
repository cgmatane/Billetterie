@extends('interfaces.index')

@section('titre', $reservation_paiement_titre_page)

@section('contenu')
<div class="row">
</div>
<div class="container">

    <div class="row">
        <div class="col-12">
            <h2 class="text-center text-info font-weight-bold m-5">{{ $reservation_paiement_montant_transaction }}{{ $prix }} ${{ $global_CAD }}</h2>
        </div>
    </div>

    <div class="demo-container row mb-5">
        <div class="card-wrapper justify-content-around col-md-6 col-sm-12 mt-3 mb-3"></div>
        <div class="form-container active justify-content-around col-md-6 col-sm-12">
            <div class="row text-center">
            <form onsubmit="return verifierFormulaire()" action="{{ route('reservation_paiement') }}">
                <h3 class="h4">{{ $reservation_paiement_renseigner_informations }}</h3>
                <label for="numeroCarte" class="d-none">{{$reservation_paiement_numero_carte}}</label>
                <input placeholder="{{$reservation_paiement_numero_carte}}" type="tel" name="number" id="numeroCarte" class="col-10 m-2">
                <div class="alert alert-danger champErreur hidden" id="erreurTypeCarte">
                    <small class="texteErreur">{{ $reservation_paiement_erreurTypeCarte }}</small>
                </div>
                <div class="alert alert-danger champErreur hidden" id="erreurNumeroCarte">
                    <small class="texteErreur">{{ $reservation_paiement_erreurNumeroCarte }}</small>
                </div>
                <label for="nom" class="d-none">{{$reservation_paiement_nom}}</label>
                <input placeholder="{{$reservation_paiement_nom}}" onkeyup="this.value = this.value.toUpperCase();" type="text" name="name" id="nom" class="col-10 m-2">
                <div class="alert alert-danger justify-content-center champErreur hidden" id="erreurNom">
                    <small class="texteErreur">{{ $reservation_paiement_erreurNom }}</small>
                </div>
                <label for="dateExpiration" class="d-none">{{ $reservation_paiement_date_expiration }}</label>
                <input placeholder="{{ $reservation_paiement_date_expiration }}" type="tel" name="expiry" id="dateExpiration" class="col-10 m-2">
                <div class="alert alert-danger champErreur hidden" id="erreurDateExpirationMois">
                    <small class="texteErreur">{{ $reservation_paiement_erreurDateExpirationMois }}</small>
                </div>
                <div class="alert alert-danger champErreur hidden" id="erreurDateExpirationAnnee">
                    <small class="texteErreur">{{ $reservation_paiement_erreurDateExpirationAnnee }}</small>
                </div>
                <div class="alert alert-danger champErreur hidden" id="erreurDateExpirationType">
                    <small class="texteErreur">{{ $reservation_paiement_erreurDateExpirationType }}</small>
                </div>
                <label for="numeroCvc" class="d-none">{{ $reservation_paiement_cvc }}</label>
                <input placeholder="{{ $reservation_paiement_cvc }}" type="number" name="cvc" id="numeroCvc" class="col-10 m-2">
                <div class="alert alert-danger champErreur hidden" id="erreurNumeroCvc">
                    <small class="texteErreur">{{ $reservation_paiement_erreurCvc }}</small>
                </div>
                <div class="row text-center justify-content-center">
                    <button type="submit" class="btn btn-outline-success my-4" id="boutonPaiement">
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
    <noscript>{{ $global_activer_javascript }}</noscript>
    <div id = "preloaders" class = "chargement">
        <div class="text-center align-middle">
        <div class="svgChargement">
            <svg class="lds-spinner" width="200px"  height="200px"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: none;"><g transform="rotate(0 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(30 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(60 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(90 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(120 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(150 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(180 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(210 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(240 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(270 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(300 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                    </rect>
                </g><g transform="rotate(330 50 50)">
                    <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#1d0e0b">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate>
                    </rect>
                </g></svg>
        </div>
        <p class="messageChargement">{{ $reservation_paiement_envoi_billet }}</p>
        </div>
    </div>
</div>


<div class="container-fluid">
    @include('global_components.zone_bas_de_page')
</div>
@endsection

@section('scripts')
    <script src="{{URL::asset('js/reservation_paiement.js')}}"></script>
    <noscript>{{$global_activer_javascript}}</noscript>
@endsection
