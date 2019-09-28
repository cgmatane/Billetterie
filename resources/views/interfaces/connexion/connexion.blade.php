@extends('interfaces.index')

@section('contenu')
    <div class="container mt-5 mb-4 " style="max-width: 760px;">
        <h1>{{ $connexion_titre }}</h1>
        <form class="border pt-4 pb-5 pl-5 pr-5">
            <div class="form-group">
                <label for="inputCourriel">{{ $connexion_courriel }}</label>
                <input type="email" class="form-control" id="inputCourriel" aria-describedby="emailHelp" placeholder="{{ $connexion_courriel }}">
            </div>
            <div class="form-group">
                <label for="inputMotDePasse">{{ $connexion_mot_passe }}</label>
                <input type="password" class="form-control" id="inputMotDePasse" placeholder="{{ $connexion_mot_passe }}">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">{{ $connexion_souvenir}}</label>
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
                @slot('route'){{ route('index') }}@endslot
                @slot('text_lien') Créer un compte @endslot
                @slot('slot') Pas encore de compte ? @endslot
                @slot('slot1') rapidement @endslot
            @endcomponent
        </div>
    </div>



@endsection
