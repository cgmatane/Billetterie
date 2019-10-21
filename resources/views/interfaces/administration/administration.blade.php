@extends('interfaces.administration.components.administration_index')

@section('titre')

    {{ $gestion_titre }}

@endsection

@section('contenu')

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
                    <td><a href=""><i class="fas fa-edit mr-3"></i></a><a data-target="#myModal" data-toggle="modal" href=""><i class="fas fa-trash-alt"></i></a></td>
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
                <div class="modal-body">
                    Voulez-vous vraiment supprimer ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <a href="" class="btn btn-primary" data-dismiss="modal">Valider</a>
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
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom {{ $gestion_type }}</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
