<nav class="bg-white shadow-lg">
    <div class="container-fluid">
        <header class="blog-header py-3">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-4 col-xs-12 pt-1">
                    <a href="{{ route('index') }}"> <!-- Route à définir -->
                        <img class="mx-auto pl-5" src="/img/logo-stq.png">
                    </a>
                </div>
                <div class="col-sm-4 col-xs-12 text-center">
                    <h1 class="text-center text-dark text-dark">{{ $global_traverse }}</h1>
                </div>
                <div class="col-sm-4 col-xs-12 d-flex justify-content-end align-items-center text-dark ">
                    <a class="mx-auto btn btn-lg btn-outline-primary" href="{{ route('informations') }}">Informations</a> <!-- Route à définir -->

                    <div class="btn-group">
                        <a class="mx-auto btn btn-lg btn-outline-primary" href="{{ route('connexion') }}">Mon compte</a>
                        <button type="button" class="mx-auto btn btn-lg btn-outline-primary dropdown-toggle" style="border-left: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('connexion') }}">Se connecter</a></li>
                            <li><a class="dropdown-item" href="#">S'inscrire</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </header>
    </div>
</nav>
