<a href="{{ route('index') }}">
    <button id="boutonRecommencer" type="button" class="btn btn-outline-retour-menu p-3 mb-5">
        <em class="fas fa-undo-alt"></em>
        {{ $slot }}
    </button>
</a>
