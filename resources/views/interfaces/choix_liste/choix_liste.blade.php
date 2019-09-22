@extends('interfaces.index')

@section('contenu')
    <body id="top" class="" style="background-color: #004882">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-warning p-4 font-weight-bold">
                    {{ $choix_liste_titre }}
                </h1>
            </div>
        </div>
        <div class="text-center row justify-content-center">
            <div class="col-sm-6 col-xs-8  pb-5">
                @foreach($tab_items as $item)
                    @component('interfaces.choix_liste.components.bouton_liste_options')
                        @slot('typeInformation') {{ $type_information }} @endslot
                        @slot('valeur') {{ $item['valeur'] }} @endslot
                        @slot('contenu') {{ $item['contenu'] }} @endslot
                    @endcomponent
                @endforeach
            </div>
        </div>

        <div class="row text-center justify-content-center">
            <a href="{{ route('index') }}">
                <button type="button" class="btn btn-info m-5 px-5 py-lg-5 py-xs-2">
                    {{ $global_retour_accueil }}
                </button>
            </a>
        </div>
    </div>
@endsection
