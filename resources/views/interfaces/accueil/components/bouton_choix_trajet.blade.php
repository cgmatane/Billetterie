<a href="{{ route('reservation_choix_vehicule') }}?destination={{$destination}}&heure={{$heure}}">
    <button type="button" class="btn btn-outline-success mt-3 col-11" >
        <div class="display-4" style="text-transform: uppercase">
            <p class = "mt-1 mb-1"> destination {{ $destination }} départ à {{ $heure }}</p>
        </div>
    </button>
</a>
