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

        <h2>Tableau de bord</h2>
        <div class="article" style="width: 90%; padding: 20px; background-color: #DCDEE6; margin: 20px auto 10px auto; border-radius: 10px;">
            <h3>Programmation</h3>
            <p class="lead">Voici les 5 prochains trajets qui vont être effectués </p>
            <hr class="my-4">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
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
