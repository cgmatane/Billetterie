@extends('interfaces.index')

@section('contenu')
        <div class="container-fluid" style="background: url(/img/fond.jpg) 0 0 fixed no-repeat;background-size: 100% 100%;">
            <div class="row">
                <h1 class="col-12 mt-5 mb-5 text-center text-warning font-weight-bold">
                    {{ $choix_liste_titre }}
                </h1>
            </div>
            <div class="text-center row justify-content-center">
                <div class="bg-white col-sm-6 col-xs-8 bg-light pb-5 shadow-lg rounded-lg">
                    @foreach($tab_items as $item)
                        @component('interfaces.choix_liste.components.bouton_liste_options')
                            @slot('typeInformation') {{ $type_information }} @endslot
                            @slot('valeur') {{ $item['valeur'] }} @endslot
                            @slot('contenu') {{ $item['contenu'] }} @endslot
                        @endcomponent
                    @endforeach
                </div>
            </div>
            <div class="row text-center justify-content-around">
                <a href="{{ route('index') }}">
                    <button type="button" class="btn btn-info m-5 px-5 py-lg-5 py-xs-2">
                        {{ $global_retour_accueil }}
                    </button>
                </a>
            </div>
        </div>

@endsection
