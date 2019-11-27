{{-- Permet d'avoir l'affichage de l'interface administration --}}
@extends('interfaces.administration.components.administration_index')

@section('titre')
    {{-- Une donnee statique est prefixe par le nom de la template (ici gardien) - Les variables statiques de cette page sont dans app/Statics/Views/interfaces/gardien --}}
    {{ $gardien_titre }}
@endsection

@section('contenu')
    {{-- ...Les donnees dynamiques n'ont pas de prefixe - Elles sont set dans le controleur dans app\Http\Controllers\Pages\GardienController, dans la methode setDonneesDynamiques --}}
    
    <div class="contenu-table">
        <h1>Info Billet:</h2>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="row"># Du ticket</th>
                <th scope="row"># Du Trajet</th>
                <th scope="row">Identifiant QR</th>
                <th scope="row">Date de l'achat</th>
                <th scope="row">Téléphone</th>
                <th scope="row">Commentaires</th>
                
            </tr>
            </thead>
            <tbody style="font-size: 2em;">
                
                <tr>
                    <td scope="row">{{ $id_ticket }}</td>
                    <td scope="row">{{ $id_trajet }}</td>
                    <td scope="row">{{ $qr_code }}</td>
                    <td scope="row">{{ $date_achat }}</td>
                    <td scope="row">{{ $telephone }}</td>
                    <td scope="row">{{ $commentaires }}</td>
                </tr>
                
            </tbody>
        </table>
        <h1>@if($nombre_passagers > 1)Passagers: @else Passager: @endif</h2>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="row">Prenom</th>
                <th scope="row">Nom</th>
                <th scope="row">Groupe d'age</th>
                
            </tr>
            </thead>
            <tbody style="font-size: 2em;">
                @for($i = 0; $i < $nombre_passagers; $i++)
                    <tr>
                        <td scope="row">{{ $passagers[$i]["prenom"] }}</td>
                        <td scope="row">{{ $passagers[$i]["nom"] }}</td>
                        <td scope="row">{{ $passagers[$i]["intervalle"] }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <h1>Vehicule:@if($vehicule == null) Aucun @endif</h2>
        @if($vehicule != null)
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="row">Marque</th>
                <th scope="row">Couleur</th>
                <th scope="row">Immatriculation</th>
                
            </tr>
            </thead>
            <tbody style="font-size: 2em;">
                
                <tr>
                    <td scope="row">{{ $vehicule["marque"] }}</td>
                    <td scope="row">{{ $vehicule["couleur"] }}</td>
                    <td scope="row">{{ $vehicule["immatriculation"] }}</td>
                </tr>

            </tbody>
        </table>
        @endif
    </div>
    <script>
        var qrcode = '{{ $qr_code }}';
    </script>
    <script src="{{URL::asset('js/gardien.js')}}"></script>
    <noscript>{{ $global_activer_javascript }}</noscript>


    
        
        
@endsection


