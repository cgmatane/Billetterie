@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #d3d3d3">
    <div class="row">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-info font-weight-bold mt-4">{{ $reservation_confirmation_commande_validee }}</h1>
            </div>
        </div>
        <div class="row text-center justify-content-start mt-5">
            <h2> {{ $reservation_confirmation_billet_email }}{{ $email }}</h2>
        </div>
        <div class="row text-center justify-content-start">
            <p> {{ $reservation_confirmation_rappel_embarquement }}</p>
        </div>

        <div class="col-sm-4">
            <a href="{{ route('index') }}">
                <button type="button" class="btn btn-danger" style="padding: 8%;">
                    {{ $global_retour_accueil }}</button>
            </a>
        </div>
        </div>
        <img id="image-code-qr" src="{{ $imageQR }}" height="20%" width="20%">
        <div class="row">
            <div class="col-12" style="padding-top: 6%">
                <h1 class="text-center text-info font-weight-bold mt-4"> {{ $reservation_confirmation_remerciement }} </h1>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
        <script type="text/javascript" src="{{URL::asset('js/reservation_confirmation.js')}}"></script>
@endsection
