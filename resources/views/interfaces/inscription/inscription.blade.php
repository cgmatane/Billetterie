@extends('interfaces.index')

@section('contenu')
    <div class="container mt-5 mb-4 ctn-connexion">
        <h1>{{ $inscription_titre }}</h1>
        <form class="border pt-4 pb-5 pl-5 pr-5">
            <div class="form-group">
                <label>{{ $inscription_nom_prenom }}</label>
                <div class="input-group mb-3 has-danger">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" onkeyup="verifNom(this,'alert-nom','{{ $inscription_erreur_nom }}')" id="inputNom" aria-describedby="emailHelp" placeholder="{{ $inscription_nom }}">
                    <input type="text" class="form-control form-control-danger" onkeyup="verifNom(this,'alert-prenom','{{ $inscription_erreur_prenom }}')" id="inputPrenom" aria-describedby="emailHelp" placeholder="{{ $inscription_prenom }}">
                </div>
                <div class="alert-danger " id="alert-nom"></div>
                <div class="alert-danger" id="alert-prenom"></div>
            </div>
            <div class="form-group">
                <label for="inputCourriel">{{ $inscription_courriel }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" onkeyup="verifMail(this,'alert-courriel','{{ $inscription_erreur_courriel }}')" id="inputCourriel" aria-describedby="emailHelp" placeholder="{{ $inscription_courriel }}">
                </div>
                <div class="alert-danger " id="alert-courriel"></div>
            </div>
            <div class="form-group">
                <label for="inputMotDePasse">{{ $inscription_mot_passe }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" onkeyup="verifMDP(this,'alert-password','{{ $inscription_erreur_mot_passe }}')" class="form-control" id="inputMotDePasse" placeholder="{{ $inscription_mot_passe }}">
                </div>
                <div class="alert-danger " id="alert-password"></div>
            </div>
            <div class="form-group">
                <label for="inputConfirmeMotDePasse">{{ $inscription_confirme_mot_passe }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" onkeyup="verifConfirmationMDP(this,'inputMotDePasse','alert-confirm-password','{{ $inscription_erreur_confirme_mot_passe }}')" class="form-control" id="inputConfirmeMotDePasse" placeholder="{{ $inscription_confirme_mot_passe }}">
                </div>
                <div class="alert-danger " id="alert-confirm-password"></div>
            </div>
            <div class="form-group">
                <input type="checkbox" id="checkbox" style="display: none;">
                <label for="checkbox" class="check">
                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                </label>
                @component('interfaces.inscription.components.lien_modal')
                    @slot('slot') {{ $inscription_accepter_texte}} @endslot
                    @slot('slot1') {{ $inscription_accepter_lien}} @endslot
                @endcomponent

            </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-primary btn-lg">{{ $inscription_inscription }}</button>
            </div>
        </form>
        @component('interfaces.inscription.components.modal')
            @slot('modal_titre') {{ $inscription_modal_titre}} @endslot
            @slot('modal_slot') {{ $inscription_modal_texte}} @endslot
        @endcomponent
    </div>



@endsection
