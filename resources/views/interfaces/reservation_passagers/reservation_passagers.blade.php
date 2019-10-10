@extends('interfaces.index')

@section('contenu')

    <body id="top" style="background-color: #d3d3d3;">
    <div class="container">


        <form class="text-center border border-light p-5 mt-5 mb-5" method="get" action="{{ route('reservation_passagers') }}"
              onsubmit="return validerFormulaire()">
            {{ csrf_field() }}
            <p class="h2 mb-4 font-weight-bold mb-5"
               style="color: midnightblue">{{ $reservation_passagers_renseigner_informations }}</p>

            <span class="mb-2 mt-2" id="passagers">
    <fieldset class="form-group passager" id="passager" style="border: #1b1e21 dashed thin;display: none;">
        <div class="row p-0 m-2">
            <legend class="legendePassager">Passager</legend>
            <input type="text" class="form-control champNom col-sm-5" id="champNom"
                   style="border-width:medium" placeholder="{{ $reservation_passagers_nom }}">
            <input type="text" class="form-control champPrenom col-sm-5" id="champPrenom"
                   style="border-width:medium" placeholder="{{ $reservation_passagers_prenom }}">
            <select class="browser-default custom-select champAge col-sm-2" id="champAge">
                @foreach($reservation_passagers_intervalles_age as $cle => $intervalle_age)
                    <option value="{{ $intervalle_age }}"
                            @if ($cle == $reservation_passagers_index_intervalle_age_par_defaut)
                            selected
                    @endif
                    >{{ $intervalle_age }}</option>
                @endforeach
            </select>
        </div>
    </fieldset>
</span>

            <button id="bouton-plus" type="button" class="btn btn-success" style="display: inline-block;" onclick="ajouterPassager();">
                {{ $reservation_passagers_ajouter_passager }}
            </button>
            <button id="bouton-moins" type="button" class="btn btn-danger" style="display: none;" onclick="supprimerPassager();">
                {{ $reservation_passagers_retirer_passager }}
            </button>

            <fieldset class="form-group mt-3">

                <input name="email" type="email" class="form-control m-2" id="champCourriel" style="border-width:medium"
                       placeholder="{{ $reservation_passagers_courriel }}">

                <input name="numero" type="tel" class="form-control m-2" id="champTelephone" style="border-width:medium"
                       placeholder="{{ $reservation_passagers_numero }}"
                       aria-describedby="defaultRegisterFormPhoneHelpBlock">
                <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                    {{ $reservation_passagers_tel_necessaire }}
                </small>

            </fieldset>

            <div class="form-group">
                <input type="checkbox" id="checkbox" style="display: none;">
                <label for="checkbox" class="check">
                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                        <path
                            d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                </label>
                <label class="form-check-label" for="checkbox">{{$reservation_passagers_confirmation_matieres }}</label>
            </div>

            <div class="form-group">
                <input type="checkbox" id="checkbox2" style="display: none;">
                <label for="checkbox2" class="check">
                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                        <path
                            d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
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
