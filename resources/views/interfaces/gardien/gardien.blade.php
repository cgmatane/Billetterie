{{-- Permet d'avoir l'affichage de l'interface administration --}}
@extends('interfaces.administration.components.administration_index')

@section('titre')
    {{-- Une donnee statique est prefixe par le nom de la template (ici gardien) - Les variables statiques de cette page sont dans app/Statics/Views/interfaces/gardien --}}
    {{ $gardien_titre }}
@endsection

@section('contenu')
    {{-- ...Les donnees dynamiques n'ont pas de prefixe - Elles sont set dans le controleur dans app\Http\Controllers\Pages\GardienController, dans la methode setDonneesDynamiques --}}
    @if( $json_billet == "Pas de billet scanné")
        <h1> {{ $json_billet }}</h1>
    
    @endif
    <div class="contenu-table">
        <h2>Passager(s):</h2>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="row">Prenom</th>
                <th scope="row">Nom</th>
                <th scope="row">Groupe d'age</th>
                
            </tr>
            </thead>
            <tbody style="font-size: 1.2em;">
                @for($i = 0; $i < $nombre_passagers; $i++)
                    <tr>
                        <td scope="row"> {{ $passagers[$i]["prenom"] }} </td>
                        <td scope="row"> {{ $passagers[$i]["nom"] }} </td>
                        <td scope="row"> {{ $passagers[$i]["intervalle"] }} </td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <h2>Vehicule:@if($vehicule == null) Aucun @endif</h2>
        @if($vehicule != null)
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="row">Marque</th>
                <th scope="row">Couleur</th>
                <th scope="row">Immatriculation</th>
                
            </tr>
            </thead>
            <tbody style="font-size: 1.2em;">
                
                <tr>
                    <td scope="row"> {{ $vehicule["marque"] }} </td>
                    <td scope="row"> {{ $vehicule["couleur"] }} </td>
                    <td scope="row"> {{ $vehicule["immatriculation"] }} </td>
                </tr>

            </tbody>
        </table>
        @endif
    </div>
    
    
        
        
@endsection



@section('scripts')
    <script src="{{URL::asset('js/gardien.js')}}"></script>
    <noscript>{{ $global_activer_javascript }}</noscript>
@endsection