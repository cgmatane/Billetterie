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

            <li class="collapsed {{ (request()->is('administration/trajet')) ? 'active' : '' }}">
                <a href="{{route('administration.trajet')}}"><i class="fas fa-ship"></i> Trajet</a>
            </li>


            <li class="collapsed {{ (request()->is('administration/planification')) ? 'active' : '' }}">
                <a href="{{route('administration.planification')}}"><i class="fas fa-clock-o"></i> Planification</a>
            </li>


            <li class="collapsed {{ (request()->is('administration/prametres')) ? 'active' : '' }}">
                <a href="{{route('administration.parametre')}}"><i class="fas fa-cog"></i> Paramètre</a>
            </li>

            <li>
                <a href=""><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </li>

        </ul>
    </div>
</div>
