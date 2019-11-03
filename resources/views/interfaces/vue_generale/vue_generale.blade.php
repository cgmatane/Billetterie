@extends('interfaces.administration.components.administration_index')

@section('titre')

    {{ $vue_generale_titre }}

@endsection

@section('contenu')
    <div>
        <div id="introduction" >
            <h1>Interface d'administration de la STQ</h1>
            <p>C'est ici que ce fait la gestion des stations, des trajets, des navires et des programmations.</p>
        </div>

        <div id="tableau-bord" ><h2>Tableau de bord</h2></div>
        <div class="article">
            <h3>Programmation</h3>
            <p class="lead">Voici les 5 prochains trajets qui vont être effectués </p>
            <hr class="my-4">
            <table class="table" id="table-prog">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Trajet</th>
                    <th scope="col">Date de départ</th>
                    <th scope="col">Date d'arrivé</th>
                    <th scope="col">
                            <div class="leg bg-info">Passagers</div>
                            <div class="leg bg-success">Vehicules</div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($donneesProgrammation as $donneeProgrammation )
                    <tr>
                        <td>{{ $donneeProgrammation['nom'] }}</td>
                        <td>{{ $donneeProgrammation['date_depart'] }}</td>
                        <td>{{ $donneeProgrammation['date_arrivee'] }}</td>
                        <td><div class="progress progress-striped">
                                <div class="progress-bar bg-info" role="progressbar"  data-nombre="{{$donneeProgrammation['nombrePassagers']}}" data-total="{{ $donneeProgrammation['nombrePlacesPassagers'] }}"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress progress-striped" id="progress-bottom">
                                <div class="progress-bar bg-success" role="progressbar" data-nombre="100" data-total="180" aria-valuemin="0" aria-valuemax="100">100/180</div>
                            </div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="lien">
                <a href="#">Gérer les programmations ></a>
            </div>
        </div>
        <div class="statistique">
            <div class="stat">
                <h3>Station</h3>
                <p class="lead">Nombres de stations</p>
                <hr class="my-4">
                <p class="nombre">5</p>
                <div class="lien">
                    <a href="#">Gérer les stations ></a>
                </div>
            </div>
            <div class="stat">
                <h3>Trajet</h3>
                <p class="lead">Nombres de trajets</p>
                <hr class="my-4">
                <p class="nombre">5</p>
                <div class="lien" style="text-align: right;">
                    <a href="#">Gérer les trajets ></a>
                </div>
            </div>
            <div class="stat">
                <h3>Navire</h3>
                <p class="lead">Nombres de navires</p>
                <hr class="my-4">
                <p class="nombre">5</p>
                <div class="lien">
                    <a href="#">Gérer les navires ></a>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="{{URL::asset('js/vue_generale.js')}}"></script>
@endsection
