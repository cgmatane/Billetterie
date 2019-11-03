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
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Date de départ</th>
                    <th scope="col">Date d'arrivé</th>
                    <th scope="col">
                            <div class="bg-info" style="width: 100px; display : inline-block;color: white; text-align: center;">Passagers</div>
                            <div class="bg-success" style="width: 100px;display : inline-block;color: white; text-align: center">Vehicules</div>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Matane - Godbou</td>
                    <td>2019-11-02 22:00</td>
                    <td>2019-11-03 01:00</td>
                    <td><div class="progress progress-striped">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">400/500</div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">100/180</div>
                        </div></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Matane - Godbou</td>
                    <td>2019-11-02 22:00</td>
                    <td>2019-11-03 01:00</td>
                    <td><div class="progress progress-striped">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">400/500</div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">100/180</div>
                        </div></td>
                </tr>
                </tbody>
            </table>
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
