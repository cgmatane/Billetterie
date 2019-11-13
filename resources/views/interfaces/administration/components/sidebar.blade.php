<div class="nav-side-menu">
    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">
            <li class="collapsed {{ (request()->is('administration/vue_generale')) ? 'active' : '' }}">
                <a href="{{route('administration.vue_generale')}}">
                    <i class="fas fa-eye"></i> Vue générale
                </a>
            </li>

            <li class="collapsed {{ (request()->is('administration/station')) ? 'active' : '' }}">
                <a href="{{route('administration.station')}}"><i class="fas fa-map-pin"></i> Station</a>
            </li>

            <li class="collapsed {{ (request()->is('administration/navire')) ? 'active' : '' }}">
                <a href="{{route('administration.navire')}}"><i class="fas fa-ship"></i> Navire</a>
            </li>

            <li class="collapsed {{ (request()->is('administration/trajet')) ? 'active' : '' }}">
                <a href="{{route('administration.trajet')}}"><i class="fas fa-route"></i> Trajet</a>
            </li>

            <li class="collapsed {{ (request()->is('administration/ticket')) ? 'active' : '' }}">
                <a href="{{route('administration.ticket')}}"><i class="fas fa-credit-card"></i> Ticket</a>
            </li>

            <li class="collapsed {{ (request()->is('administration/passager')) ? 'active' : '' }}">
                <a href="{{route('administration.passager')}}"><i class="fas fa-user"></i> Passager</a>
            </li>

            <li class="collapsed {{ (request()->is('administration/vehicule')) ? 'active' : '' }}">
                <a href="{{route('administration.vehicule')}}"><i class="fas fa-car"></i> Véhicule</a>
            </li>

            <li>
                <a href=""><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </li>

        </ul>
    </div>
</div>

