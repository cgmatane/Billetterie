@extends('interfaces.administration.components.administration_index')

@section('titre')

    {{ $gestion_titre }}

@endsection

@section('contenu')


    @if($messages = \Illuminate\Support\Facades\Session::get('cascades'))
        @if($messages["trajets"])
            @foreach($messages["trajets"] as $message)
                <strong>{{$message->id_trajet}}</strong>
            @endforeach
            <br>
        @endif

        @if($messages["planifications"])
            @foreach($messages["planifications"] as $message)
                <strong>{{$message->id_programation}}</strong>
            @endforeach
        @endif

    @endif

    <h1>Gestion des {{ $gestion_type }}s</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            @foreach($gestion_colonnes as $colonne)
                <th scope="row">{{ $colonne }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody style="font-size: 1.2em;">
            @foreach($valeurs as $valeur)
                <tr>
                    <th scope="row">{{ $valeur[$attributs[0]] }}</th>
                    @for($i=1; $i< sizeof($attributs) ; $i++ )
                        <td> {{ $valeur[$attributs[$i]] }}</td>
                    @endfor
                    <td><a href=""><i class="fas fa-edit mr-3"></i></a><a style="color: #3490dc; cursor: pointer;" data-target="#myModal" data-toggle="modal" class="open-supprimer" data-id="{{ $valeur[$attributs[0]] }}"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary btn-lg btn-block" data-target="#myModal1" data-toggle="modal" style="color: white; cursor: pointer;">Ajouter {{ $gestion_type }}</a>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body body-supprimer">
                    <form method="post" action="{{ route("administration.station") }}">
                        {{ csrf_field() }}
                        <label>Voulez-vous vraiment supprimer Matane ?</label>
                        <input type="text" name="id" id="supprimer-id" style="visibility: hidden;">
                        <input type="text" value="no-cascade" name="type" style="visibility: hidden;">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" value="supprimer" name="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter {{ $gestion_type }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route("administration.station") }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputNom">Nom {{ $gestion_type }}</label>
                            <input type="text" name="nom" class="form-control" id="inputNom">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" value="ajouter" name="submit" class="btn btn-primary">Valider</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>

        links = document.getElementsByClassName("open-supprimer");
        [].forEach.call(links, function(link) {
            link.addEventListener("click", function() {
                var id = link.getAttribute('data-id');
                document.getElementById("supprimer-id").value = id;
            })
        })


    </script>

@endsection
