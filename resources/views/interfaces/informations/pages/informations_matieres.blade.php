@extends('interfaces.informations.informations')

@section('titre')
    Voyagez-vous avec des matières dangereuses ?
@endsection

@section('info')
    <p>Afin de garantir la sécurité des passagers à bord du traversier,
        il est interdit de transporter des matières dangereuses.</p>
@endsection

@section('boutons')
    <a href="{{ route('index') }}">
        <button type="button" class="btn btn-danger m-5 px-5 py-lg-5 py-xs-2">
            {{ $global_retour_precedent }}
        </button>
    </a>
@endsection

