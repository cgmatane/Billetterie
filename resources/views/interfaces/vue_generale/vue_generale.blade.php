@extends('interfaces.administration.components.administration_index')

@section('titre')

    {{ $vue_generale_titre }}

@endsection

@section('contenu')
        <div id="introduction" >
            <h1>Interface d'administration de la STQ</h1>
            <p>C'est ici que ce fait la gestion des stations, des trajets et des navires.</p>
        </div>

        <div id="tableau-bord" ><h2>Tableau de bord</h2></div>
        {{--
        <div class="article">
            <h3>ObsoleteProgrammation</h3>
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
                            <div class="leg bg-success">Véhicules</div>
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
                                <div class="progress-bar bg-success" role="progressbar"  data-nombre="{{$donneeProgrammation['nombreVehicules']}}" data-total="{{ $donneeProgrammation['nombrePlacesVehicules'] }}"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="lien">
                <a href="{{route('administration.programmation')}}">Gérer les programmations ></a>
            </div>
        </div>
        --}}
        <div class="statistique">
            @foreach($donneesStats as $donneeStats)
                <div class="stat">
                    <h3>{{$donneeStats['titre']}}</h3>
                    <p class="lead">Nombres de {{$donneeStats['titre']}}s</p>
                    <hr class="my-4">
                    <p class="nombre">{{$donneeStats['nombre']}}</p>
                    <div class="lien">
                        <a href="{{route("administration.".$donneeStats['titre']."")}}">Gérer les {{$donneeStats['titre']}}s ></a>
                    </div>
                </div>
            @endforeach
        </div>
    <script type="text/javascript" src="{{URL::asset('js/vue_generale.js')}}"></script>
@endsection
