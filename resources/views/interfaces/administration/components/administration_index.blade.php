    @include('interfaces.administration.components.head')
    @component('interfaces.administration.components.header')
        @slot('email'){{ $email}} @endslot
    @endcomponent
    @include('interfaces.administration.components.sidebar')

    <div class="container-admin">
        @yield('contenu')
    </div>

    @include('interfaces.administration.components.foot')



