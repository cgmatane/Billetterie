<nav class="bg-light">
    <div class="container">
        <header class="blog-header py-3">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-4 col-xs-12 pt-1">
                    <a href="{{ route('index') }}"> <!-- Route à définir -->
                        <img class="mx-auto" src="/img/logo-stq.png" alt = "">
                    </a>
                </div>
                <div class="col-sm-4 col-xs-12 text-center">
                    <h3 class="text-center text-dark text-dark">{{ $nav_traverse }}</h3>
                </div>
                <div class="col-sm-4 col-xs-12 d-flex justify-content-end align-items-center text-dark ">
                    <a class="btn btn-primary mx-auto" href="{{ route('informations') }}">Informations</a> <!-- Route à définir -->
                </div>
            </div>
        </header>
    </div>
</nav>
