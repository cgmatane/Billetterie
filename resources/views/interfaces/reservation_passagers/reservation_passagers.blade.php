@extends('interfaces.index')

@section('titre', $reservation_passagers_titre_page)

@section('contenu')

    <link rel="stylesheet" href="{{URL::asset('css/intlTelInput.css')}}">
    <script src="{{URL::asset('js/intlTelInput.js')}}"></script>
    <script src="{{URL::asset('/js/intlTelInput2.js')}}"></script>

    <div class="container">
        <form class="text-center border border-light p-5 mt-5 mb-5" method="get"
              action="{{ route('reservation_passagers') }}"
              onsubmit="return validerFormulaire()">

            <p class="h2 mb-4 font-weight-bold mb-5" id="texteHaut">
                {{ $reservation_passagers_renseigner_informations }}
            </p>

            <div id="passagers">
                <div class="passager mb-2" id="passager">
                    <div class="legendePassager">{{ $reservation_passagers_passager }}</div>
                    <div class="row p-0 my-2 mx-0">
                        <div class="col-sm px-0">
                            <div class="form-group champNom" id="champNom">
                                <label for="valeurNom" class="d-none">{{ $reservation_passagers_nom }}</label>
                                <input type="text" id="valeurNom" class="form-control medium"
                                       placeholder="{{ $reservation_passagers_nom }}">
                                <div class="alert alert-danger champErreur hidden" id="erreurNom">
                                    <small class="texteErreur">{{ $reservation_passagers_nom_invalide }}</small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm px-0">
                            <div class="form-group champPrenom" id="champPrenom">
                                <label for="valeurPrenom" class="d-none">{{ $reservation_passagers_prenom }}</label>
                                <input type="text" id="valeurPrenom" class="form-control medium"
                                       placeholder="{{ $reservation_passagers_prenom }}">
                                <div class="alert alert-danger champErreur hidden" id="erreurPrenom">
                                    <small class="texteErreur">{{ $reservation_passagers_prenom_invalide }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 px-0">
                            <div class="form-group champAge" id="champAge">
                                <label for="valeurAge" class="d-none">{{ $reservation_passagers_age }}</label>
                                <select class="browser-default custom-select" id="valeurAge">
                                    @foreach($intervalles_age as $intervalle_age)
                                        <option value="{{ $intervalle_age['id'] }}"
                                            @if ($intervalle_age['id'] == $reservation_passagers_index_intervalle_age_par_defaut)
                                                selected
                                            @endif>
                                            @if ($intervalle_age['age_min'] <= 0)
                                                {{ $reservation_passagers_moins_de }} {{ $intervalle_age['age_max'] + 1 }} {{ $reservation_passagers_ans }}
                                            @elseif ($intervalle_age['age_max'] >= 500)
                                                {{ $reservation_passagers_plus_de }} {{ $intervalle_age['age_min'] - 1 }} {{ $reservation_passagers_ans }}
                                            @else
                                                {{ $reservation_passagers_entre }} {{ $intervalle_age['age_min'] }} {{ $reservation_passagers_et }} {{ $intervalle_age['age_max'] }} {{ $reservation_passagers_ans }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="d-xs-none col-8"></div>
                <div class="col-xs col-lg">
                    <button type="button" id="boutonAjouterPassager" class="btn btn-success"
                            onclick="ajouterPassager();">{{ $reservation_passagers_ajouter_passager }}</button>
                </div>
                <div class="col-xs-6 col-lg-2" style="display: none;">
                    <button type="button" id="boutonRetirerPassager" class="btn btn-danger"
                            onclick="supprimerPassager();">{{ $reservation_passagers_retirer_passager }}</button>
                </div>
            </div>

            @if(isset($type_vehicule) && $type_vehicule != "pas de véhicule")
                <div class="vehicule mt-2" id="vehicule">
                    <div class="row p-0 my-1 mx-0">
                        <div class="col-sm px-0">
                            <div class="form-group champImmatriculation" id="champImmatriculation">
                                <label for="valeurImmatriculation" class="d-none">{{ $reservation_passagers_immatriculation }}</label>
                                <input type="text" id="valeurImmatriculation" class="form-control medium"
                                       placeholder="{{ $reservation_passagers_immatriculation }}" name="immatriculation">
                                <div class="alert alert-danger champErreur hidden" id="erreurImmatriculation">
                                    <small class="texteErreur">{{ $reservation_passagers_immatriculation_invalide }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm px-0">
                            <div class="form-group champMarqueVehicule" id="champMarqueVehicule">
                                <label for="valeurMarqueVehicule" class="d-none">{{ $reservation_passagers_marque_vehicule }}</label>
                                <input type="text" id="valeurMarqueVehicule" class="form-control medium"
                                       placeholder="{{ $reservation_passagers_marque_vehicule }}" name="marqueVehicule">
                                <div class="alert alert-danger champErreur hidden" id="erreurMarqueVehicule">
                                    <small class="texteErreur">{{ $reservation_passagers_marque_vehicule_invalide }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm px-0">
                            <div class="form-group champCouleurVehicule" id="champCouleurVehicule">
                                <label for="valeurCouleurVehicule" class="d-none">{{ $reservation_passagers_couleur_vehicule }}</label>
                                <input type="text" id="valeurCouleurVehicule" class="form-control medium"
                                       placeholder="{{ $reservation_passagers_couleur_vehicule }}" name="couleurVehicule">
                                <div class="alert alert-danger champErreur hidden" id="erreurCouleurVehicule">
                                    <small class="texteErreur">{{ $reservation_passagers_couleur_vehicule_invalide }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <div class="mt-1">
                <div class="row">
                    <div class="form-group col" id="champCourriel">
                        <label for="valeurCourriel" class="d-none">{{ $reservation_passagers_courriel }}</label>
                        <input name="mail" type="text" class="form-control medium"
                               id="valeurCourriel"
                               placeholder="{{ $reservation_passagers_courriel }}">
                        <div class="alert alert-danger champErreur hidden" id="erreurCourriel">
                            <small class="texteErreur">{{ $reservation_passagers_courriel_invalide }}</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col" id="champTelephone">
                        <label for="valeurTelephone" class="d-none">{{ $reservation_passagers_numero }}</label>
                        <input name="numero" type="tel" class="form-control medium"
                               id="valeurTelephone"
                               placeholder="{{ $reservation_passagers_numero }}">
                        <script>
                            var input = document.querySelector("#valeurTelephone");
                            var iti = window.intlTelInput(input);

                        </script>
                        <div class="alert alert-danger champErreur hidden" id="erreurTelephone">
                            <small class="texteErreur">{{ $reservation_passagers_numero_invalide }}</small>
                        </div>
                        <small class="form-text text-muted mb-4">
                            {{ $reservation_passagers_tel_necessaire }}
                        </small>
                    </div>
                </div>

            </div>

            <div class="row" @if($est_admin)style="visibility: hidden;position:absolute;" @endif>
                <div class="form-group col" id="checkboxMatieres">
                    <input type="checkbox" id="checkbox" style="z-index:-1;opacity:0;position:absolute;" @if($est_admin) checked @endif>
                    <span class="check">
                        <svg width="18px" height="18px" viewBox="0 0 18 18">
                            <path
                                d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                            <polyline points="1 9 7 14 15 4"></polyline>
                        </svg>
                    </span>
                    <label class="form-check-label" for="checkbox">
                        {{$reservation_passagers_confirmation_matieres }}
                    </label>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalMatiereDangereuse">?</button>
                    <div class="alert alert-danger champErreur hidden">
                        <small class="texteErreur">{{ $reservation_passagers_confirmation_matieres_invalide }}</small>
                    </div>
                </div>
            </div>
            <div class="row" @if($est_admin)style="visibility: hidden;position:absolute;" @endif>
                <div class="form-group col" id="checkboxAnimaux">
                    <input type="checkbox" id="checkbox2" style="z-index:-1;opacity:0;position:absolute;" @if($est_admin) checked @endif>
                    <span class="check">
                        <svg width="18px" height="18px" viewBox="0 0 18 18">
                            <path
                                d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                            <polyline points="1 9 7 14 15 4"></polyline>
                        </svg>
                    </span>
                    <label class="form-check-label" for="checkbox2">
                        {{$reservation_passagers_confirmation_animaux }}
                    </label>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAnimauxExotiques">?</button>
                    <div class="alert alert-danger champErreur hidden">
                        <small class="texteErreur">{{ $reservation_passagers_confirmation_animaux_invalide }}</small>
                    </div>
                </div>
            </div>

            @if($est_admin)
                <div class="row">
                    <div class="form-group col" id="champCommentaires">
                        <label for="valeurCommentaires" class="d-none">{{ $reservation_passagers_commentaires }}</label>
                        <input name="commentaires" type="text" class="form-control medium"
                               id="valeurCommentaires"
                               placeholder="{{ $reservation_passagers_commentaires }}"
                        >
                    </div>
                </div>
            @endif

            <button type="submit" class="btn btn-outline-success my-4 btn-block">
                {{ $reservation_passagers_paiement}}
            </button>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalMatiereDangereuse" tabindex="-1" role="dialog" aria-labelledby="checkbox" aria-hidden="true">
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
    <div class="modal fade" id="modalAnimauxExotiques" tabindex="-1" role="dialog" aria-labelledby="checkbox2" aria-hidden="true">
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
        @include('global_components.zone_bas_de_page')
    </div>
    @endsection

    @section('scripts')
        <script src="{{URL::asset('js/reservation_passagers.js')}}"></script>
        <noscript>{{ $global_activer_javascript }}</noscript>
@endsection
