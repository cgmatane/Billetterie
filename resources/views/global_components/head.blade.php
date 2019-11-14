<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{$global_titre}}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('/img/favicon.ico')}}" />
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <link rel="stylesheet" href="{{URL::asset('/css/mesStyles.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Muli:400,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Paytone+One&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body id="top">
<script src="{{URL::asset('/js/app.js')}}"></script>
<noscript>{{$global_activer_javascript}}</noscript>
