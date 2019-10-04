@extends('interfaces.index')

@section('contenu')
    <body id="top" style="background-color: #d3d3d3;">
    <p class="h2 mb-4 font-weight-bold mb-5 mt-5 text-center" style="color: midnightblue">Récapitulatif du billet</p>
<div class="container bg-white text-center shadow-lg mt-3" style="border-radius: 0.5em;">
    <div class="row">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-3" style="margin-top: auto;margin-bottom: auto;">
                    <h5>DATE</h5>
                </div>
                <div class="col-6">
                    <div class="container-fluid">
                        <div class="row col-6">
                            <h5>depart</h5>
                        </div>
                        <div class="row col-6">
                            <h5>arrivé</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3" style="margin-top: auto;margin-bottom: auto;">
                    <h5>prix</h5>
                </div>
            </div>
        </div>
        <div class="container-fluid border border-secondary m-4" style="border-radius: 0.5em;">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Passagers</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Age</th>
                    <th scope="col">Tarif</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>18-60ans</td>
                    <td>55 $ CAD</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>18-60ans</td>
                    <td>55 $ CAD</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>18-60ans</td>
                    <td>55 $ CAD</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="container">
<a href="{{ route('reservation_paiement') }}">
    <button type="button" class="btn btn-outline-success my-4 btn-block">
        VALIDER LES INFORMATIONS DE MON BILLET
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
