@extends('interfaces.informations.informations')

@section('titre')
    Voyagez-vous avec des animaux exotiques ?
@endsection

@section('info')
    <p>Afin de garantir la sécurité des passagers à bord du traversier,
        si vous voyagez avec un animal autre que chat ou chien,
        veuillez téléphoner au XXX-XXX-XXXX pour réserver votre traversée.</p>
    <p>Un de nos agents vous répondra le plus rapidement possible.</p>
@endsection

@section('boutons')
    <a href="{{ route('index') }}">
        <button type="button" class="btn btn-danger m-5 px-5 py-lg-5 py-xs-2">
            {{ $global_retour_precedent }}
        </button>
    </a>
@endsection
