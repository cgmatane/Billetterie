@extends('interfaces.administration.components.administration_index')

@section('titre')

    {{ $vue_generale_titre }}

@endsection

@section('contenu')
        <div id="introduction" >
            <h1>Interface d'administration de la STQ</h1>
            <p>C'est ici que ce fait la gestion des stations, des navires et des trajets.</p>
        </div>

        <div id="tableau-bord" class="titre-gen" ><h2>Tableau de bord</h2></div>
        <div class="article">
            <h3>Trajets</h3>
            <p class="lead">Voici les 5 trajets à venir :</p>
            <hr class="my-4">
            <table class="table" id="table-prog">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Trajet</th>
                    <th scope="col">Date de départ</th>
                    <th scope="col">Date d'arrivée</th>
                    <th scope="col">
                            <div class="leg bg-info">Passagers</div>
                            <div class="leg bg-success">Véhicules</div>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($donneesTrajet as $donneeTrajet )
                    <tr>
                        <td>{{ $donneeTrajet['nom'] }}</td>
                        <td>{{ $donneeTrajet['date_depart'] }}</td>
                        <td>{{ $donneeTrajet['date_arrivee'] }}</td>
                        <td><div class="progress progress-striped">
                                <div class="progress-bar bg-info" role="progressbar"  data-nombre="{{$donneeTrajet['nombrePassagers']}}" data-total="{{ $donneeTrajet['nombrePlacesPassagers'] }}"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="progress progress-striped" id="progress-bottom">
                                <div class="progress-bar bg-success" role="progressbar"  data-nombre="{{$donneeTrajet['nombreVehicules']}}" data-total="{{ $donneeTrajet['nombrePlacesVehicules'] }}"  aria-valuemin="0" aria-valuemax="100"></div>
                            </div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="lien">
                <a href="{{route('administration.trajet')}}">Gérer les trajets ></a>
            </div>
        </div>

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

        <div id="information-generale" class="titre-gen" ><h2>Informations générales</h2></div>
        <div class="article" id="article-generale">
            <h3>Historique</h3>
            <p class="lead">Voici les informations générales de la STQ</p>
            <hr class="my-4">
            <div class="flex-donnee">
                @foreach($donneesGenerales as $donneeGenerale)
                    <div class="donnee">
                            <h3>{{$donneeGenerale['titre']}}</h3>
                            <p class="lead">Nombre total de {{$donneeGenerale['titre']}}s @if($donneeGenerale['titre'] == 'ticket') achetés  @else  transportés @endif</p>
                            <p class="nombre">{{$donneeGenerale['nombre']}}</p>
                            <div class="lien">
                                <a href="{{route("administration.".$donneeGenerale['titre']."")}}">Gérer les {{$donneeGenerale['titre']}}s ></a>
                            </div>
                    </div>

                @endforeach
            </div>
        </div>

    <script type="text/javascript" src="{{URL::asset('js/vue_generale.js')}}"></script>
@endsection
