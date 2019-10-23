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

    </style>
</head>
<body id="top">
<h1 class="test-pdf">Facture</h1>
<div class="row text-center justify-content-right" id="contenant-image">
    <img id="image-code-qr" src="{{ public_path('/img/logo-stq.png') }}">
</div>
@include('interfaces.validation_informations.components.cadre_informations')
</body>
</html>
