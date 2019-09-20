<nav class="bg-white">
    <div class="container-fluid">
        <header class="blog-header py-3">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-4 col-xs-12 pt-1">
                    <a href="{{ route('index') }}"> <!-- Route à définir -->
                        <img class="mx-auto pl-5" src="/img/logo-stq.png">
                    </a>
                </div>
                <div class="col-sm-4 col-xs-12 text-center">
                    <h1 class="text-center text-dark text-dark">{{ $nav_traverse }}</h1>
                </div>
                <div class="col-sm-4 col-xs-12 d-flex justify-content-end align-items-center text-dark ">
                    <a class="mx-auto btn btn-lg btn-outline-primary" href="{{ route('informations') }}">Informations</a> <!-- Route à définir -->
                </div>
            </div>
        </header>
    </div>
</nav>
