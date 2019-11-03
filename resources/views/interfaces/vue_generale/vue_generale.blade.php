@extends('interfaces.administration.components.administration_index')

@section('titre')

    {{ $vue_generale_titre }}

@endsection

@section('contenu')
    <div>
        <div id="introduction" style="text-align: center;">
            <h1>Interface d'administration de la STQ</h1>
            <p>C'est ici que ce fait la gestion des stations, des trajets, des navires et des programmations.</p>
        </div>

        <div style=" width: 90%; margin: 0 auto;"><h2>Tableau de bord</h2></div>
        <div class="article" style="width: 90%; padding: 20px; background-color: #DCDEE6; margin: 20px auto 10px auto; border-radius: 10px;">
            <h3>Programmation</h3>
            <p class="lead">Voici les 5 prochains trajets qui vont être effectués </p>
            <hr class="my-4">
            <table class="table" style="font-size: 16px">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Trajet</th>
                    <th scope="col">Date de départ</th>
                    <th scope="col">Date d'arrivé</th>
                    <th scope="col">
                            <div class="bg-info" style="width: 100px; display : inline-block;color: white; text-align: center;">Passagers</div>
                            <div class="bg-success" style="width: 100px;display : inline-block;color: white; text-align: center">Vehicules</div>
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
                                <div class="progress-bar bg-info" role="progressbar"  data-passagers="{{$donneeProgrammation['nombrePassagers']}}" data-places="{{ $donneeProgrammation['nombrePlacesPassagers'] }}"  aria-valuemin="0" aria-valuemax="100">{{ $donneeProgrammation['nombrePassagers'] }}/{{ $donneeProgrammation['nombrePlacesPassagers'] }}</div>
                            </div>
                            <div class="progress progress-striped" style="margin-top: 2px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">100/180</div>
                            </div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <script>
                progressBars = document.getElementsByClassName("progress-bar");
                [].forEach.call( progressBars, function(progressBar) {
                    var passagers = progressBar.getAttribute('data-passagers');
                    var places = progressBar.getAttribute('data-places');
                    var width = (passagers/places) * 100;
                    progressBar.style.width = ""+width+"%";
                    if(width<50){
                        progressBar.style.color = "red";
                    }
                });


            </script>
            <div class="lien" style="text-align: right;">
                <a href="#">Gérer les programmations ></a>
            </div>
        </div>
        <div class="statistique" style=" width: 90%; margin: 20px auto 10px auto;display: flex; justify-content: space-between; flex-wrap: wrap;">
            <div class="stat" style="width: 30%; min-width: 260px; background-color: #DCDEE6; padding: 20px; border-radius: 10px;">
                <h3>Station</h3>
                <p class="lead">Nombres de stations</p>
                <hr class="my-4">
                <p class="nombre" style=" width: 50%;margin: 10px auto; border-radius: 100%; padding: 50px 0px; text-align: center; border: #1b1e21 solid 1px;">5</p>
                <div class="lien" style="text-align: right;">
                    <a href="#">Gérer les stations ></a>
                </div>
            </div>
            <div class="stat" style="width: 30%; min-width: 260px; background-color: #DCDEE6;padding: 20px; border-radius: 10px;">
                <h3>Trajet</h3>
                <p class="lead">Nombres de trajets</p>
                <hr class="my-4">
                <p class="nombre" style=" width: 50%;margin: 10px auto; border-radius: 100%; padding: 50px 0px; text-align: center; border: #1b1e21 solid 1px;">5</p>
                <div class="lien" style="text-align: right;">
                    <a href="#">Gérer les trajets ></a>
                </div>
            </div>
            <div class="stat" style="width: 30%; min-width: 260px; background-color: #DCDEE6;padding: 20px; border-radius: 10px;">
                <h3>Navire</h3>
                <p class="lead">Nombres de navires</p>
                <hr class="my-4">
                <p class="nombre" style=" width: 50%;margin: 10px auto; border-radius: 100%; padding: 50px 0px; text-align: center; border: #1b1e21 solid 1px;">5</p>
                <div class="lien" style="text-align: right;">
                    <a href="#">Gérer les navires ></a>
                </div>
            </div>
        </div>

    </div>
@endsection
