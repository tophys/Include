
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper cyan">
            <ul>
             <li><a href="{{url('/home')}}" class="brand-logo"><img src="../images/logo-large.png"></a></li>
            </ul>
            <ul class="right">
                <li><a class="dropdown-button" href="#!" data-activates="menu-dropdown"><i class="material-icons">more_vert</i></a></li>
                <ul id="menu-dropdown" class="dropdown-content">
                    <li><a href="{{ url('/perfil')}}" class="grey-text text-darken-2"><i class="material-icons left">account_circle</i> <span class="left"> Perfil</span></a></li>
                    <!--<li><a href="#!" class="grey-text text-darken-2"><i class="material-icons left">settings</i> <span class="left"> Ajustes</span></a></li>
                    <li><a href="#!" class="grey-text text-darken-2"><i class="material-icons left">help</i> <span class="left"> Ajuda</span></a></li>-->
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="grey-text text-darken-2"><i class="material-icons left">exit_to_app</i> <span class="left"> Sair</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </li>
                </ul>
            </ul>
        </div>
    </nav>
</div>
