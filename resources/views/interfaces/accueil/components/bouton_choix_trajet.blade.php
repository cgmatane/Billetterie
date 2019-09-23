<a href="{{ route('reservation_choix_vehicule') }}?destination={{$destination}}&heure={{$heure}}">
    <button type="button" class="btn btn-outline-success mt-3 col-11 pt-3" >
        <div class="display-4">
            <p> destination {{ $destination }} départ à {{ $heure }}</p>
        </div>
    </button>
</a>
