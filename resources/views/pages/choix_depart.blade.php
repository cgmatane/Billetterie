@include('partials.head')
@include('partials.nav')

<body id="top" class="" style="background-color: #004882">
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-warning p-4 font-weight-bold">Sélectionnez un lieu de départ</h1>
        </div>
    </div>
    <div class="text-center row justify-content-center">
        <div class="col-sm-6 col-xs-8  pb-5">
            <a href="{{ route('index') }}?jour=4"><button type="button" class="btn btn-info mt-5 col-6 p-3" >Matane</button></a><br>
            <a href="{{ route('index') }}?jour=5"><button type="button" class="btn btn-info mt-5 col-6 p-3" >Baie Comeau</button></a><br>
            <a href="{{ route('index') }}?jour=6"><button type="button" class="btn btn-info mt-5 col-6 p-3" >Godbout</button></a><br>
        </div>
    </div>

    <div class="row text-center justify-content-center">
        <a href="{{ route('index') }}"><button type="button" class="btn btn-info m-5 px-5 py-lg-5 py-xs-2">
                Accueil</button></a>
    </div>
</div>

@include('partials.footer')
@include('partials.foot')
