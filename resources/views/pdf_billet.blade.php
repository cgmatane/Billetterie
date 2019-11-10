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
<h1>Billet {{$codeQR}}</h1>
<p>Date d'émission : {{$dateEmission}}</p>
@include('interfaces.validation_informations.components.cadre_informations')
</body>
</html>
