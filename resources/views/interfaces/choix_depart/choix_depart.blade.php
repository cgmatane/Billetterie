@extends('interfaces.index')

@section('titre', $choix_depart_titre_page)

@section('contenu')
        <div class="container-fluid" id="imageFond">
            <div class="text-center row justify-content-center" id="noMargin">
                <div class="col-sm-6 col-xs-8 shadow-lg rounded-lg  mt-6" id="midnightBlue">
                    @component('interfaces.accueil.components.titre_principal')
                        {{ $choix_depart_titre }}
                    @endcomponent
                </div>
            </div>
            <div class="text-center row justify-content-center">
                <div class="bg-white col-sm-6 col-xs-8 bg-light pb-5 shadow-lg rounded-lg">
                    @foreach($tab_items as $item)
                        @component('interfaces.choix_depart.components.bouton_liste_options')
                            @slot('typeInformation') {{ $type_information }} @endslot
                            @slot('contenu') {{ $item }} @endslot
                        @endcomponent
                    @endforeach
                </div>
            </div>
            <div class="row text-center justify-content-around">
                @component('interfaces.choix_depart.components.bouton_retour_accueil')
                    @slot('route')
                        {{ route('index') }}
                    @endslot
                    {{ $global_retour_accueil }}
                @endcomponent
            </div>
        </div>

@endsection
