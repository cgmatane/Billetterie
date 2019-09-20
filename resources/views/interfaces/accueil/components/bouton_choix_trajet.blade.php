<a href="{{ route('reservation_choix_vehicule') }}?destination={{$destination}}&heure={{$heure}}">
    <button type="button" class="btn btn-success mt-5 col-6 p-3" >
        {{ $destination }} : {{ $heure }}
    </button>
</a>
