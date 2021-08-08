<header id="site-header">
    @include('navbars.publicNavbar')
    
    <ul class="navbar-nav ml-auto">
        @guest
            @if(Route::current()->getName() != 'login-form')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login-form') }}">{{ __('Login') }}</a>
                </li>
            @endif
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @endguest
        @auth
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @if(Auth::user()->checkRole('admin'))
                        {{ __('Amministratore') }}
                    @else
                        {{ Auth::user()->nome . " " . Auth::user()->cognome}} 
                    @endif
                    <span class="caret"></span>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user-logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('user-logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endauth
    </ul>
</header>