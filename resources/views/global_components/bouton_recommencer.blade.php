<a href="{{ route('index') }}" style="pointer-events: initial">
    <div id="boutonRecommencer" class="btn btn-outline-retour-menu p-3 mb-5">
        <em class="fas fa-undo-alt"></em>
        {{ $slot }}
    </div>
</a>
