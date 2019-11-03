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
                <a href="{{route('administration.trajet')}}"><i class="fas fa-route"></i> Trajet</a>
            </li>

            <li class="collapsed {{ (request()->is('administration/navire')) ? 'active' : '' }}">
                <a href="{{route('administration.navire')}}"><i class="fas fa-ship"></i> Navire</a>
            </li>


            <li class="collapsed {{ (request()->is('administration/programmation')) ? 'active' : '' }}">
                <a href="{{route('administration.programmation')}}"><i class="fas fa-clock-o"></i> Programmation</a>
            </li>

            <li>
                <a href=""><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
            </li>

        </ul>
    </div>
</div>
<script>
    window.onscroll = function() {myFunction()};

    function myFunction() {
        var navSide = document.getElementsByClassName("nav-side-menu")[0];
        var x = document.body.scrollTop || document.documentElement.scrollTop;

        console.log(x);


        if (x > 0){
            navSide.style.top = "0" ;
        }else{
            navSide.style.top = "55px" ;
        }
    }

</script>
