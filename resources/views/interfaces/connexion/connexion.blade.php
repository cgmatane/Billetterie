@extends('interfaces.index')

@section('contenu')
    <div class="container mt-5 mb-4 ctn-connexion">
        <h1>{{ $connexion_titre }}</h1>
        <form class="border pt-4 pb-5 pl-5 pr-5">
            <div class="form-group">
                <label for="inputCourriel">{{ $connexion_courriel }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" id="inputCourriel" aria-describedby="emailHelp" placeholder="{{ $connexion_courriel }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputMotDePasse">{{ $connexion_mot_passe }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" id="inputMotDePasse" placeholder="{{ $connexion_mot_passe }}">
                </div>
            </div>
            <div class="form-group">
                <input type="checkbox" id="checkbox" style="display: none;">
                <label for="checkbox" class="check">
                    <svg width="18px" height="18px" viewBox="0 0 18 18">
                        <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                        <polyline points="1 9 7 14 15 4"></polyline>
                    </svg>
                </label>
                <label class="form-check-label" for="checkbox">{{ $connexion_souvenir}}</label>
            </div>
            <div class="col text-center">
                <button type="submit" class="btn btn-primary btn-lg">{{ $connexion_connexion }}</button>
            </div>
            <div class="row">
                <small class=" col text-center">
                    @component('interfaces.connexion.components.lien_vue_mot_de_passe_oublier')
                        @slot('route'){{ route('index') }}@endslot
                        @slot('slot') Mot de passe oublié @endslot
                    @endcomponent
                </small>
            </div>

        </form>
        <div class="text-center">
            @component('interfaces.connexion.components.lien_vue_inscription')
                @slot('route'){{ route('inscription') }}@endslot
                @slot('text_lien') Créer un compte @endslot
                @slot('slot') Pas encore de compte ? @endslot
                @slot('slot1') rapidement @endslot
            @endcomponent
        </div>
    </div>



@endsection
