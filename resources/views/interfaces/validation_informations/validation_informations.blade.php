@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #d3d3d3;">
    <p class="h2 mb-4 font-weight-bold my-5 text-center"
       style="color: midnightblue">{{ $validation_informations_recapitulatif_billet }}</p>


    <div class="container bg-white text-center shadow-lg mt-3 p-1" style="border-radius: 0.5em;">
        <div class="m-1">
            <div class="container-fluid border border-secondary mt-4 mb-2" style="border-radius: 0.5em;">
                <h5>Traversée</h5>
                <div class="row">
                    <div class="col">
                        Date :
                    </div>
                    <div class="col">
                        {{ $date }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Départ :
                    </div>
                    <div class="col">
                        {{ $depart }}
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        Heure de départ :
                    </div>
                    <div class="col">
                        {{ $heure }}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Arrivée :
                    </div>
                    <div class="col">
                        {{ $destination }}
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        Prix :
                    </div>
                    <div class="col">
                        XXX CAD
                    </div>
                </div>

            </div>

            <div class="container-fluid border border-secondary mb-2" style="border-radius: 0.5em;">
                <h5>Passagers</h5>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">{{ $validation_informations_nom }}</th>
                        <th scope="col">{{ $validation_informations_prenom }}</th>
                        <th scope="col">{{ $validation_informations_age }}</th>
                        <th scope="col">{{ $validation_informations_tarif }}</th>
                    </tr>
                    </thead>
                    <tbody>


                    @for($i = 0;$i<count($noms);$i++)
                        <tr>
                            <td>{{ $noms[$i] }}</td>
                            <td>{{ $prenoms[$i] }}</td>
                            <td>{{ $ages[$i] }}</td>
                            <td>20.00 CAD</td> {{-- temporaire --}}
                        </tr>
                    @endfor

                    </tbody>

                </table>
            </div>
            @isset($type_vehicule)
                <div class="container-fluid border border-secondary mb-2" style="border-radius: 0.5em;">
                    <h5>Véhicule</h5>
                    <div class="row">
                        <div class="col">
                            Véhicule :
                        </div>
                        <div class="col">
                            {{ $type_vehicule }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Charge lourde (> XXX KG) :
                        </div>
                        <div class="col">
                            @if($poids_eleve)
                                Oui
                            @else
                                Non
                            @endif
                        </div>
                    </div>
                </div>
            @endisset

            <div class="container-fluid border border-secondary mb-2" style="border-radius: 0.5em;">
                <h5>Pour vous contacter</h5>
                <div class="row">
                    <div class="col">{{ $validation_informations_courriel }}</div>
                    <div class="col">{{ $email }}</div>
                </div>
                <div class="row">
                    <div class="col">{{ $validation_informations_numero_telephone }}</div>
                    <div class="col">{{ $numero }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <a href="{{ route('reservation_paiement') }}">
            <button type="button" class="btn btn-outline-success my-4 btn-block">
                {{ $validation_informations_valider_informations_billet }}
            </button>
        </a>
    </div>
    <div class="container-fluid">
        <div style="width: 100% ;height: 400px; background-color: #002A4D; margin-top: 50px; border-radius: 20px">
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 55px">
                    @component('global_components.bouton_retour_precedent')
                        {{ $global_retour_choix_precedent }}
                    @endcomponent
                </div>
            </div>
            <div class="row">
                <div style="float: left; margin-left: 5%; margin-top: 20px">
                    <a href="{{ route('index') }}">
                        <button type="button" class="btn btn-outline-retour-menu p-3">
                            {{ $global_retour_au_debut }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
