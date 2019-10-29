@extends('interfaces.administration.components.administration_index')

@section('titre')

    {{ $gestion_titre }}

@endsection

@section('contenu')


    {{--
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
        <div class="modal" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route("administration.station") }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="alert alert-danger" id="confirmer-texte" role="alert">
                                    <label>La suppression de ce champ entrainera la suppression des champs suivants :</label>
                                    @if($messages["trajets"])
                                        <strong>Trajets :</strong>
                                        <ul>
                                        @foreach($messages["trajets"] as $message)
                                            <li>#{{$message->id_trajet}}</li>
                                        @endforeach
                                        </ul>
                                        <br>
                                    @endif
                                    @if($messages["planifications"])
                                        <strong>Planifications :</strong>
                                        <ul>
                                        @foreach($messages["planifications"] as $message)
                                            <li>#{{$message->id_programmation}}</li>
                                        @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <input type="text" name="id" id="confirmer-id" value="{{$messages["id"]}}" style="visibility: hidden;">
                                <input type="text" value="cascade" name="type" style="visibility: hidden;">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" value="supprimer" name="submit" class="btn btn-primary">Confirmer</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <script>

            jQuery(document).ready(function ($) {
                jQuery.noConflict();
                $('#myModal11').modal('show');
            });

        </script>

    @endif
        --}}

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
        {{--
            @foreach($valeurs as $valeur)
                <tr>
                    <th scope="row">{{ $valeur[$attributs[0]] }}</th>
                    @for($i=1; $i< sizeof($attributs) ; $i++ )
                        <td> {{ $valeur[$attributs[$i]] }}</td>
                    @endfor
                    <td><a href=""><i class="fas fa-edit mr-3"></i></a><a style="color: #3490dc; cursor: pointer;" data-target="#myModal" data-toggle="modal" class="open-supprimer" data-id="{{$valeur[$attributs[0]] }}"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            @endforeach
            --}}
        </tbody>
    </table>
    <a class="btn btn-primary btn-lg btn-block" data-target="#myModal1" onclick="remplirModalAjoutEdition()" data-toggle="modal" style="color: white; cursor: pointer;">Ajouter {{ $gestion_type }}</a>

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
                    <form method="post" action="{{ route("administration.navire") }}">
                        {{ csrf_field() }}
                        <label>Voulez-vous vraiment supprimer ce champ ?</label>
                        <div class="alert alert-primary" id="supprimer-texte" role="alert"></div>
                        <input type="text" name="id" id="supprimer-id" style="display:none;">
                        <input type="text" value="no-cascade" name="type" style="display:none;">
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
                <form method="post" action="{{ route("administration.navire") }}">
                    {{ csrf_field() }}

                    <div class="modal-body">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" value="ajouter" name="submit" class="btn btn-primary">Valider</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div id = "donnees-masquees" style="display:none">
        <div id = "entrees">
            @foreach($entrees as $id=>$entree)
                <div class="entree">
                    <div class="id-entree">{{ $id }}</div>
                    <div class="valeurs">
                        @foreach ($entree as $valeur)
                            <div class="valeur">{{ $valeur }}</div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div id = "colonnes">
            @foreach($colonnes as $colonne)
                <div class="colonne">
                    <div class="attribut-colonne">{{ $colonne['attribut'] }}</div>
                    <div class="nom-colonne">{{ $colonne['nom'] }}</div>
                    <div class="type-colonne">{{ $colonne['type'] }}</div>
                </div>
            @endforeach
        </div>
        <div id ="cles-etrangeres">
            @foreach($tables_cles_etrangeres as $nom_table=>$table_cle_etrangere)
                <div class="cles-etrangeres-table">
                    <div class = "nom-table">{{ $nom_table }}</div>
                    <div class = "attributs-lies">
                        @foreach($table_cle_etrangere['attributs_lies'] as $attribut_lie)
                            <div class = "attribut-lie">{{ $attribut_lie }}</div>
                        @endforeach
                    </div>
                    <div class="cles-etrangeres">
                        @foreach($table_cle_etrangere['cles_etrangeres'] as $id_cle=>$cle_etrangere)
                            <div class = "cle-etrangere">
                                <div class = "cle-etrangere-id">{{ $id_cle }}</div>
                                <div class = "cle-etrangere-nom">{{ $cle_etrangere }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script type="text/javascript" src="{{URL::asset('js/administration.js')}}"></script>

@endsection
