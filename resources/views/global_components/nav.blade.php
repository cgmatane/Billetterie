<nav class="bg-white shadow-lg">
    <div class="container-fluid">
        <header class="blog-header py-3">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-12 col-md-4 pt-1">
                    <a href="{{ route('index') }}"> <!-- Route à définir -->
                        <img class="mx-auto pl-5" src="/img/logo-stq.png" alt="Logo de la STQ">
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 text-center">
                    <h1 class="text-center text-dark text-dark">{{ $global_traverse }}</h1>
                </div>

                <div class="col-sm-12 col-md-4 d-flex align-items-center text-dark ">
                    <a class="mx-auto btn btn-lg btn-outline-param" href="{{ route('informations') }}">{{ $global_informations }}</a> <!-- Route à définir -->
                </div>
            </div>
            <!--
            <div>
                <a href="{{ route('changer_langue') }}?langue=0&provenance={{ Request::url() }}"> FR </a>
                <a href="{{ route('changer_langue') }}?langue=1&provenance={{ Request::url() }}"> EN </a>
            </div>
            -->
            <div class="dropdown">
                <button class="btn btn-outline-param dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Changer de langue
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('changer_langue') }}?langue=0&provenance={{ Request::url() }}">
                        Francais</a>
                    <a class="dropdown-item" href="{{ route('changer_langue') }}?langue=1&provenance={{ Request::url() }}">
                        English</a>
                </div>
            </div>
        </header>
    </div>
</nav>