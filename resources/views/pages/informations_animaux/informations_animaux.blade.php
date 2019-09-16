@extends('index')

@section('contenu')
<body id="top" style="background-color: #004882">
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-warning font-weight-bold">Voyagez-vous avec des animaux exotiques ?</h1>
        </div>
    </div>
    <div class="text-center row justify-content-center">
        <div class="img-thumbnail col-sm-6 col-xs-8 bg-light pb-5">
            <p>Afin de garantir la sécurité des passagers à bord du traversier,
                si vous voyagez avec un animal autre que chat ou chien,
            veuillez téléphoner au XXX-XXX-XXXX pour réserver votre traversée.</p>
            <p>Un de nos agents vous répondra le plus rapidement possible.</p>
        </div>
    </div>
    <div class="row text-center justify-content-center">
        <a href="{{ route('index') }}"><button type="button" class="btn btn-danger m-5 px-5 py-lg-5 py-xs-2">
                Retour</button></a>
    </div>
</div>
@endsection
