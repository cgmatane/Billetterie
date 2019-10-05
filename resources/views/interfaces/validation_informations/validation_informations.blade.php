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
                            <h5>Départ</h5>
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
        <div class="container-fluid border border-secondary mt-4 mb-2 ml-4 mr-4" style="border-radius: 0.5em;">
            <h5 class="float-left">votre billet sera envoyé à l'adresse :</h5>
            @if($data = \Illuminate\Support\Facades\Session::get('info_passager'))
                {{$data['email']}}
            @endif
        </div>
        <div class="container-fluid border border-secondary mb-4 ml-4 mr-4" style="border-radius: 0.5em;">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Age</th>
                    <th scope="col">Tarif</th>
                </tr>
                </thead>
                <tbody>
                @if($data = \Illuminate\Support\Facades\Session::get('info_passager'))
                    @if(isset($data[0][0]))

                        @foreach($data as $info)
                        <tr>
                            <td>{{$info['nom']}}</td>
                            <td>{{$info['prenom']}}</td>
                            <td>{{$info['age']}}</td>
                            <td>TODO</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>{{$data['nom']}}</td>
                            <td>{{$data['prenom']}}</td>
                            <td>{{$data['age']}}</td>
                            <td>TODO</td>
                        </tr>
                    @endif

                @endif
                <!--
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
                -->
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
