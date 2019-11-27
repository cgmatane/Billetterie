<div>
    <a href="?idTrajet={{ $trajet['id'] }}" class="btn btn-outline-success mt-3 col-11">
        <div class="display-4" style="text-transform: uppercase">
            <p class="mt-1 mb-1">
                <em class="fas fa-map-marker-alt" style="color:blue"></em> {{ $trajet['station_arrivee'] }}
                <em class="far fa-clock" style="color:tomato"></em> {{ $trajet['heure_depart'] }}
            </p>
        </div>
    </a>
    <button id="myBtn" class="align-middle d-inline-block idInformation" style="visibility: hidden;"
            data-target="#modal-infos" data-toggle="modal" onclick="remplirModalInfos(this);">
        <span style="visibility: initial" tabindex="0">
            <em class="fa fa-info-circle float-right fa-2x"
                @if(isset($urgent))
                style="color:red"
                @else
                style="color:blue"
                @endisset ></em>
            <span class="infos-caches" style="display: none">
                @if(isset($message_urgent))
                    <span class="urgent">{{ $message_urgent }}</span>
                @else
                    <span class="urgent"></span>
                @endisset
                <span class="date-arrivee">{{ $trajet['date_arrivee'] }}</span>
                <span class="heure-arrivee">{{ $trajet['heure_arrivee'] }}</span>
                <span class="navire">{{ $trajet['navire'] }}</span>
                <span class="nombre-places-restantes-passagers">{{ $trajet['places_restantes_passagers'] }}</span>
                <span class="nombre-places-restantes-vehicules">{{ $trajet['places_restantes_vehicules'] }}</span>
            </span>
        </span>
    </button>
</div>