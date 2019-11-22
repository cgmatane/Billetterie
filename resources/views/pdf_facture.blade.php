<!doctype html>
<html lang="fr">
<head>
    <link href="{{ public_path('/css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ public_path('/css/mesStyles.css') }}" rel="stylesheet" type="text/css" />
    {{--    surcharge du css pour prévenir des problèmes de génération pdf--}}
    <style>
        .container-fluid {
            margin-left:initial;
            margin-right:initial;
        }

        .row {
            display:block;
            margin-left: 1rem;
        }

        .container {
            margin-left: auto;
            margin-right: auto;
        }

        .col {
            position: relative;
            display: inline;
        }

        @media (min-width: 500px) {
            .container {
                max-width: 960px;
            }
        }
        </style>
</head>
<body>
<div>
    <img src="{{public_path('/img/logo-stq.png')}}">
    <div>1410, rue de Matane-sur-Mer</div>
    <div>Matane (Québec) G4W 3M6</div>
</div>

<h2 class="text-center"> Facture n°{{ $donneesPdfFacture['numeroFacture'] }}</h2>

<div class="row ml-0">
    <div class="col"><strong>Client :</strong></div>
    <div class="col"> {{ $donneesPdfFacture['nomClient'] }} {{ $donneesPdfFacture['prenomClient'] }}</div>
</div>

<div class="container bg-white shadow-lg mt-3" style="border-radius: 0.5em;">
    <div class="m-1">
        <div class="container-fluid border text-justify border-secondary mt-4 mb-2 py-2" style="border-radius: 0.5em;">
            <h4> Rappel de la transaction :</h4>
            <div class="row">
                <div class="col">Montant :</div>
                <div class="col">{{ $donneesPdfFacture['montantCommande'] }}$</div>
            </div>
            <div class="row">
                <div class="col">Carte :</div>
                <div class="col">{{ $donneesPdfFacture['numeroCarte'] }}</div>
            </div>
            <div class="row">
                <div class="col">Titulaire :</div>
                <div class="col">{{ $donneesPdfFacture['titulaireCarte'] }}</div>
            </div>
            <div class="row">
                <div class="col">Date/heure :</div>
                <div class="col">{{ $donneesPdfFacture['datePaiement'] }}</div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
