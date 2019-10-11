@if(isset($email))
    @include('global_components.head')
    @component('interfaces.administration.components.nav')
        @slot('titre'){{ $administration_titre }}@endslot
        @slot('email'){{ $email}} @endslot
    @endcomponent
    @include('interfaces.administration.components.sidebar')

    @yield('contenu')

    @include('interfaces.administration.components.sidebar')
@else
    @php
        header("Location: " . URL::to('/connexion'), true, 302);
        exit();
    @endphp
@endif


