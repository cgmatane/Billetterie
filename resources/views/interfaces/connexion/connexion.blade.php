@include('interfaces.administration.components.head')
@component('interfaces.administration.components.header')
    @section('titre'){{ $connexion_administration }}@endsection
    @slot('email'){{ $connexion_connexion }} @endslot
@endcomponent

    <div class="container mt-5 mb-4 ctn-connexion">
        <h1>{{ $connexion_titre }}</h1>

        @if($message = \Illuminate\Support\Facades\Session::get('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong>
            </div>
        @endif
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="border pt-4 pb-5 pl-5 pr-5" action="{{ route('administration.connexion') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputCourriel">{{ $connexion_courriel }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" id="inputCourriel" name="email" aria-describedby="emailHelp" placeholder="{{ $connexion_courriel }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputMotDePasse">{{ $connexion_mot_passe }}</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control" id="inputMotDePasse" placeholder="{{ $connexion_mot_passe }}">
                </div>
            </div>

            <div class="col text-center">
                <button type="submit" name="submit" value="connexion" class="btn btn-primary btn-lg">{{ $connexion_connexion }}</button>
            </div>


        </form>
    </div>




@include('global_components.foot')
