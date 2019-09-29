@extends('interfaces.index')

@section('contenu')
    <div class="container mt-5 mb-4 ctn-connexion">
        <h1>{{ $inscription_titre }}</h1>
        <form class="border pt-4 pb-5 pl-5 pr-5">
            <div class="form-group">
                <label>{{ $inscription_nom_prenom }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-circle"></i></span>
                    </div>
                    <input type="text" class="form-control" id="inputNom" aria-describedby="emailHelp" placeholder="{{ $inscription_nom }}">
                    <input type="text" class="form-control" id="inputPrenom" aria-describedby="emailHelp" placeholder="{{ $inscription_prenom }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputCourriel">{{ $inscription_courriel }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" id="inputCourriel" aria-describedby="emailHelp" placeholder="{{ $inscription_courriel }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputMotDePasse">{{ $inscription_mot_passe }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" id="inputMotDePasse" placeholder="{{ $inscription_mot_passe }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputConfirmeMotDePasse">{{ $inscription_confirme_mot_passe }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control" id="inputConfirmeMotDePasse" placeholder="{{ $inscription_confirme_mot_passe }}">
                </div>
            </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-primary btn-lg">{{ $inscription_inscription }}</button>
            </div>

        </form>
    </div>



@endsection
