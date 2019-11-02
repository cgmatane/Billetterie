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
                                <input type="text" id="valeurNom" class="form-control" style="border-width:medium"
                                       placeholder="{{ $reservation_passagers_nom }}">
                                <div class="alert alert-danger champErreur" id="erreurNom" style="display:none">
                                    <small class="texteErreur"></small>
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm px-0">
                            <div class="form-group champPrenom" id="champPrenom">
                                <input type="text" id="valeurPrenom" class="form-control"
                                       style="border-width:medium" placeholder="{{ $reservation_passagers_prenom }}">
                                <div class="alert alert-danger champErreur" id="erreurPrenom" style="display:none">
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
                        <input name="email" type="text" class="form-control"
                               style="border-width:medium" id="valeurCourriel"
                               placeholder="{{ $reservation_passagers_courriel }}">
                        <div class="alert alert-danger champErreur" id="erreurCourriel" style="display:none">
                            <small class="texteErreur"></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col" id="champTelephone">
                        <input name="numero" type="tel" class="form-control"
                               style="border-width:medium" id="valeurTelephone"
                               placeholder="{{ $reservation_passagers_numero }}"
                               aria-describedby="defaultRegisterFormPhoneHelpBlock">
                        <div class="alert alert-danger champErreur" id="erreurTelephone" style="display:none">
                            <small class="texteErreur"></small>
                        </div>
                        <small class="form-text text-muted mb-4">
                            {{ $reservation_passagers_tel_necessaire }}
                        </small>
                    </div>
                </div>
                @if ($type_vehicule == "Voiture avec remorque")
                    <div> YUWFUGWUOGWFULYGFWYUWFGOFWGYWFOUIGPWFIUGFW</div>
                @endif


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
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalMatiereDangereuse">?</button>
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
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalAnimauxExotiques">?</button>
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
    <!-- Modal -->
    <div class="modal fade" id="modalMatiereDangereuse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $reservation_passagers_infos_matiere_dangereuse_titre }}</h5>
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ $reservation_passagers_infos_animaux_exotiques_titre }}</h5>
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
