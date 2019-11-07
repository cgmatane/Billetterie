@extends('interfaces.index')

@section('contenu')

    <div class="container">
        <form class="text-center border border-light p-5 mt-5 mb-5" method="get"
              action="{{ route('reservation_passagers') }}"
              onsubmit="return validerFormulaire()">

            <p class="h2 mb-4 font-weight-bold mb-5" id="texteHaut">
                {{ $reservation_passagers_renseigner_informations }}
            </p>

            <span id="passagers">
                <fieldset class="passager mb-2" id="passager">
                    <div class="legendePassager">Passager</div>
                    <div class="row p-0 m-2">
                        <div class="col-sm px-0">
                            <div class="form-group champNom" id="champNom">
                                <label for="valeurNom" class="d-none">Nom</label>
                                <input type="text" id="valeurNom" class="form-control medium"
                                       placeholder="{{ $reservation_passagers_nom }}">
                                <div class="alert alert-danger champErreur hidden" id="erreurNom">
                                    <small class="texteErreur"></small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm px-0">
                            <div class="form-group champPrenom" id="champPrenom">
                                <label for="valeurPrenom" class="d-none">Prenom</label>
                                <input type="text" id="valeurPrenom" class="form-control medium"
                                       placeholder="{{ $reservation_passagers_prenom }}">
                                <div class="alert alert-danger champErreur hidden" id="erreurPrenom">
                                    <small class="texteErreur"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 px-0">
                            <div class="form-group champAge" id="champAge">
                                <label for="valeurAge" class="d-none">Age</label>
                                <select class="browser-default custom-select" id="valeurAge">
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
                <button type="button" id="boutonRetirerPassager" class="btn btn-danger pull-right hidden"
                        onclick="supprimerPassager();">
                    {{ $reservation_passagers_retirer_passager }}
                </button>
            </div>


            <fieldset class="mt-3">
                <div class="row">
                    <div class="form-group col" id="champCourriel">
                        <label for="valeurCourriel" class="d-none">Courriel</label>
                        <input name="email" type="text" class="form-control medium"
                               id="valeurCourriel"
                               placeholder="{{ $reservation_passagers_courriel }}">
                        <div class="alert alert-danger champErreur hidden" id="erreurCourriel">
                            <small class="texteErreur"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col" id="champTelephone">
                        <label for="valeurTelephone" class="d-none">Telephone</label>
                        <input name="numero" type="tel" class="form-control medium"
                               id="valeurTelephone"
                               placeholder="{{ $reservation_passagers_numero }}"
                               aria-describedby="defaultRegisterFormPhoneHelpBlock">
                        <div class="alert alert-danger champErreur hidden" id="erreurTelephone">
                            <small class="texteErreur"></small>
                        </div>
                        <small class="form-text text-muted mb-4">
                            {{ $reservation_passagers_tel_necessaire }}
                        </small>
                    </div>
                </div>
                @if($type_vehicule != "pas de véhicule" || !isset($type_vehicule))
                        <div class="row">
                            <div class="form-group col" id="champImmatriculation">
                                <label for="valeurImmatriculation"></label>
                                <input name="immatriculation" type="text" class="form-control medium"
                                       id="valeurImmatriculation"
                                       placeholder="{{ $reservation_passagers_immatriculation }}">
                                <div class="alert alert-danger champErreur" id="erreurImmatriculation" style="display:none">
                                    <small class="texteErreur"></small>
                                </div>
                            </div>
                        </div>
                @endif


            </fieldset>
            <div class="row">
                <div class="form-group col" id="checkboxMatieres">
                    <input type="checkbox" id="checkbox" class="hidden">
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
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalMatiereDangereuse">?</button>
                    <div class="alert alert-danger champErreur hidden">
                        <small class="texteErreur"></small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col" id="checkboxAnimaux">
                    <input type="checkbox" id="checkbox2" class="hidden">
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
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAnimauxExotiques">?</button>
                    <div class="alert alert-danger champErreur hidden">
                        <small class="texteErreur"></small>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-success my-4 btn-block">
                {{ $reservation_passagers_paiement}}
            </button>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalMatiereDangereuse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">{{ $reservation_passagers_infos_matiere_dangereuse_titre }}</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $reservation_passagers_infos_matiere_dangereuse }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAnimauxExotiques" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">{{ $reservation_passagers_infos_animaux_exotiques_titre }}</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $reservation_passagers_infos_animaux_exotiques }}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        @component('global_components.zone_bas_de_page')
        @endcomponent
    </div>
    @endsection

    @section('scripts')
        <script type="text/javascript" src="{{URL::asset('js/reservation_passagers.js')}}"></script>
@endsection
