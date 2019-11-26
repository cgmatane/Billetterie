<div>
    <a href="?idTrajet={{ $trajet['id'] }}" class="btn btn-outline-success mt-3 col-11">
        <div class="display-4" style="text-transform: uppercase">
            <p class="mt-1 mb-1">
                <em class="fas fa-map-marker-alt" style="color:blue"></em> {{ $trajet['station_arrivee'] }}
                <em class="far fa-clock" style="color:tomato"></em> {{ $trajet['heure_depart'] }}
                @isset($urgent)
                    <small><em class="fas fa-circle" style="color:red"></em></small>
                @endisset
            </p>
        </div>
    </a>
    <button id="myBtn" class="align-middle d-inline-block idInformation" style="visibility: hidden;" data-target="#modal-infos" data-toggle="modal" onclick="remplirModalInfos(this);">
        <span style="visibility: initial" tabindex="0">
            <i class="fa fa-info-circle float-right fa-2x" style="color:blue"></i>
            <span class="infos-caches" style="display:none;">
                <span class="date-arrivee">{{ $trajet['date_arrivee'] }}</span>
                <span class="heure-arrivee">{{ $trajet['heure_arrivee'] }}</span>
                <span class="navire">{{ $trajet['navire'] }}</span>
                <span class="nombre-places-restantes-passagers">{{ $trajet['places_restantes_passagers'] }}</span>
                <span class="nombre-places-restantes-vehicules">{{ $trajet['places_restantes_vehicules'] }}</span>
            </span>
        </span>
    </button>
</div>