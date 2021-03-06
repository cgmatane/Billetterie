@extends('interfaces.index')

@section('titre', $choix_date_titre_page)
@section('contenu')
        <div class="container-fluid" id="imageFond">
            <div class="text-center row justify-content-center" id="noMargin">
                <div class="col-sm-6 col-xs-8 shadow-lg rounded-lg  mt-6" id="midnightBlue">
                    @component('interfaces.accueil.components.titre_principal')
                        {{ $choix_date_titre }}
                    @endcomponent
                </div>
            </div>
            <form onsubmit="return soumettreFormulaire508(this);">
                <label class="d-none" for="date508">{{ $choix_date_date_depart }}</label>
                <input type="date" name="date" id="date508" style="opacity:0;position:absolute;" onfocus="this.style.opacity=1;" onblur="this.style.opacity=0;">
                <input type="submit" class="d-none">
            </form>
            <div class="text-center row justify-content-center">
                <div class="bg-white col-sm-6 col-xs-8 bg-light pb-5 shadow-lg rounded-lg">
                    <div id="v-cal">
                        <div class="vcal-header">
                            <div class="vcal-btn" data-calendar-toggle="previous">
                                <p class="d-none">précedent</p>
                                <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                                </svg>
                            </div>

                            <div class="vcal-header__label" data-calendar-label="month">

                            </div>


                            <div class="vcal-btn" data-calendar-toggle="next">
                                <p class="d-none">suivant</p>
                                <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="vcal-week">
                            <span>{{ $choix_date_lundi }}</span>
                            <span>{{ $choix_date_mardi }}</span>
                            <span>{{ $choix_date_mercredi }}</span>
                            <span>{{ $choix_date_jeudi }}</span>
                            <span>{{ $choix_date_vendredi }}</span>
                            <span>{{ $choix_date_samedi }}</span>
                            <span>{{ $choix_date_dimanche }}</span>
                        </div>
                        <div class="vcal-body" data-calendar-area="month"></div>
                    </div>
                </div>
            </div>


            <div class="row text-center justify-content-around">
                @component('interfaces.choix_date.components.bouton_retour_accueil')
                    @slot('route')
                        {{ route('index') }}
                    @endslot
                    {{ $global_retour_accueil }}
                @endcomponent
            </div>
        </div>

        <span class="d-none">
            @foreach($global_mois as $mois)
                <span class="mois">{{ $mois }}</span>
            @endforeach
        </span>

@endsection

@section('scripts')
    <script src="{{URL::asset('js/choix_date.js')}}"></script>
    <noscript>{{ $global_activer_javascript }}</noscript>
@endsection
