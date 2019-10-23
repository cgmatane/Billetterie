@extends('interfaces.index')

@section('contenu')

    <body id="top" style="background-color: #d3d3d3;">
    <div class="container">


        <form class="text-center border border-light p-5 mt-5 mb-5" method="get"
              action="{{ route('reservation_passagers') }}"
              onsubmit="return validerFormulaire()">

            <p class="h2 mb-4 font-weight-bold mb-5" style="color: midnightblue">
                {{ $reservation_passagers_renseigner_informations }}
            </p>

            <span id="passagers">
                <fieldset class="passager mb-2" id="passager" style="border: #1b1e21 dashed thin;display:none;">
                    <div class="legendePassager">Passager</div>
                    <div class="row p-0 m-2">
                        <div class="col-sm px-0">
                            <div class="form-group champNom" id="champNom">
                                <input type="text" class="form-control" style="border-width:medium"
                                       placeholder="{{ $reservation_passagers_nom }}">
                                <div class="alert alert-danger champErreur" style="display:none">
                                    <small class="texteErreur"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm px-0">
                            <div class="form-group champPrenom" id="champPrenom">
                                <input type="text" class="form-control"
                                       style="border-width:medium" placeholder="{{ $reservation_passagers_prenom }}">
                                <div class="alert alert-danger champErreur" style="display:none">
                                    <small class="texteErreur"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 px-0">
                            <div class="form-group champAge" id="champAge">
                                <select class="browser-default custom-select">
                                    @foreach($reservation_passagers_intervalles_age as $cle => $intervalle_age)
                                        <option value="{{ $intervalle_age }}"
                                            @if ($cle == $reservation_passagers_index_intervalle_age_par_defaut)
                                                selected
                                            @endif
                                        >
                                            {{ $intervalle_age }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </span>

            <div class="text-right">
                <button type="button" id="boutonAjouterPassager" class="btn btn-success"
                        onclick="ajouterPassager();">
                    {{ $reservation_passagers_ajouter_passager }}
                </button>
                <button type="button" id="boutonRetirerPassager" class="btn btn-danger pull-right" style="display:none"
                        onclick="supprimerPassager();">
                    {{ $reservation_passagers_retirer_passager }}
                </button>
            </div>


            <fieldset class="mt-3">
                <div class="row">
                    <div class="form-group col" id="champCourriel">
                        <input name="email" type="email" class="form-control"
                               style="border-width:medium"
                               placeholder="{{ $reservation_passagers_courriel }}">
                        <div class="alert alert-danger champErreur" style="display:none">
                            <small class="texteErreur"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col" id="champTelephone">
                        <input name="numero" type="tel" class="form-control"
                               style="border-width:medium"
                               placeholder="{{ $reservation_passagers_numero }}"
                               aria-describedby="defaultRegisterFormPhoneHelpBlock">
                        <div class="alert alert-danger champErreur" style="display:none">
                            <small class="texteErreur"></small>
                        </div>
                        <small class="form-text text-muted mb-4">
                            {{ $reservation_passagers_tel_necessaire }}
                        </small>
                    </div>
                </div>

            </fieldset>
            <div class="row">
                <div class="form-group col" id="checkboxMatieres">
                    <input type="checkbox" id="checkbox" style="display: none;">
                    <label for="checkbox" class="check">
                        <svg width="18px" height="18px" viewBox="0 0 18 18">
                            <path
                                d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                            <polyline points="1 9 7 14 15 4"></polyline>
                        </svg>
                    </label>
                    <label class="form-check-label" for="checkbox">
                        {{$reservation_passagers_confirmation_matieres }}
                    </label>
                    <div class="alert alert-danger champErreur" style="display:none">
                        <small class="texteErreur"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col" id="checkboxAnimaux">
                    <input type="checkbox" id="checkbox2" style="display: none;">
                    <label for="checkbox2" class="check">
                        <svg width="18px" height="18px" viewBox="0 0 18 18">
                            <path
                                d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                            <polyline points="1 9 7 14 15 4"></polyline>
                        </svg>
                    </label>
                    <label class="form-check-label" for="checkbox2">
                        {{$reservation_passagers_confirmation_animaux }}
                    </label>
                    <div class="alert alert-danger champErreur" style="display:none">
                        <small class="texteErreur"></small>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success my-4 btn-block">
                {{ $reservation_passagers_paiement}}
            </button>
        </form>

    </div>
    <div class="container-fluid">
        <div style="width: 100% ;height: 400px; background-color: midnightblue; margin-top: -50px; border-radius: 20px">
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
                        <button type="button" class="btn btn-outline-retour-menu p-3"> <i class="fas fa-undo-alt "></i>
                            {{ $global_retour_au_debut }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
        <script type="text/javascript" src="{{URL::asset('js/reservation_passagers.js')}}"></script>
@endsection
