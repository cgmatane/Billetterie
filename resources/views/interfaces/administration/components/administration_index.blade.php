@if(isset($email))
    @include('interfaces.administration.components.head')
    @component('interfaces.administration.components.nav')
        @slot('email'){{ $email}} @endslot
    @endcomponent
    @include('interfaces.administration.components.sidebar')

    <div class="container container-admin">
        @yield('contenu')
    </div>


    @include('interfaces.administration.components.sidebar')
    @include('interfaces.administration.components.foot')
@else
    @php
        header("Location: " . URL::to('administration/connexion'), true, 302);
        exit();
    @endphp
@endif


