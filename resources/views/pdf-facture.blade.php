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

        .col-md {
            /*position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;*/
        }
    </style>
</head>
<body id="top">
<h1 class="test-pdf">Facture</h1>
<div class="row text-center justify-content-right" id="contenant-image">
  {{--  <img id="image-code-qr" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=zdzeezdzdzdzd">--}}
</div>
@include('interfaces.validation_informations.components.cadre_informations')
</body>
</html>
