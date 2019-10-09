@extends('interfaces.index')

@section('contenu')

<body id="top" style="background-color: #d3d3d3;">
<div class="row">
    <!--
    <div class="col-sm-12 col-xs-0">
        <img src="/img/avancement2.PNG" width="100%">
    </div>
    -->
</div>
<div class="container">
    <div class="row">
    </div>

        <form class="text-center border border-light p-5 mt-5 mb-5" method="post" action="/reservation_passagers" onsubmit="return validerFormulaire()">
            {{ csrf_field() }}
            <p class="h2 mb-4 font-weight-bold mb-5" style="color: midnightblue">{{ $reservation_passagers_renseigner_informations }}</p>

            <span class="mb-2 mt-2" id="passagers">
                @include('interfaces.reservation_passagers.components.passager')
            </span>

            @include('interfaces.reservation_passagers.components.boutons')

            @include('interfaces.reservation_passagers.components.reste_formulaire')

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="form-group">
                <input type="checkbox" id="checkbox" style="display: none;">
                <label for="checkbox" class="check">
                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                </label>
                <label class="form-check-label" for="checkbox">{{$reservation_passagers_confirmation_matieres }}</label>
            </div>

            <div class="form-group">
                <input type="checkbox" id="checkbox2" style="display: none;">
                <label for="checkbox2" class="check">
                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                </label>
                <label class="form-check-label" for="checkbox">{{$reservation_passagers_confirmation_animaux }}</label>
            </div>

                <button type="submit" class="btn btn-outline-success my-4 btn-block">
                    {{ $reservation_passagers_paiement}}
                </button>

        </form>
</div>
<div class="container-fluid">
        <div style="width: 100% ;height: 400px; background-color: #002A4D; margin-top: -50px; border-radius: 20px">
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 55px">
                    @component('global_components.bouton_retour_precedent')
                        {{ $global_retour_choix_precedent }}
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 20px">
                    <a href="{{ route('index') }}">
                        <button type="button" class="btn btn-outline-retour-menu p-3">
                            {{ $global_retour_au_debut }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/ajout_passagers.js')}}"></script>
@endsection
