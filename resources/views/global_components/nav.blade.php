<nav class="bg-white shadow-lg">
    <div class="container-fluid">
        <header class="blog-header py-3">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-12 col-md-4 pt-1">
                    <a href="{{ route('index') }}"> <!-- Route à définir -->
                        <img class="mx-auto pl-5" src="/img/logo-stq.png">
                    </a>
                </div>
                <div class="col-sm-12 col-md-4 text-center">
                    <h1 class="text-center text-dark text-dark">{{ $global_traverse }}</h1>
                </div>
                <div class="col-sm-12 col-md-4 d-flex align-items-center text-dark ">
                    <a class="mx-auto btn btn-lg btn-outline-primary" href="{{ route('informations') }}">Informations</a> <!-- Route à définir -->

                    <div class="btn-group">
                        <a class="mx-auto btn btn-lg btn-outline-primary" href="{{ route('connexion') }}"> Mon compte</a>
                        <button type="button" class="mx-auto btn btn-lg btn-outline-primary dropdown-toggle" style="border-left: none;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" style="font-size: 18px;">
                            <li><a class="dropdown-item  border-bottom " href="{{ route('connexion') }}"><i class="fas fa-sign-in-alt"></i> Se connecter</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-plus"></i> S'inscrire</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </header>
    </div>
</nav>
