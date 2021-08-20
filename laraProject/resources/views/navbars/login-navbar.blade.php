<div id="header-user" class="flex-v-center">
    @guest
        @if(!Route::is('login-form'))
            <a href="{{ route('login-form') }}" class="button header-btn login-btn" style="margin-right: 15px">
                {{ __('Accedi') }}
            </a>
        @endif
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @endguest
        
    @auth
        
        @can('isAdmin')
            <a class="button header-btn manage-btn" href="#">Gestione dati</a>
        @endcan

        <div class="user-info flex-v-center">
            
            @include('helpers.user-profile-image', ['width' => 40, 'height' => 40])            
                
            @if(Auth::user()->checkRole('admin'))
                <span class="username" style="color:#fff">{{ __('Amministratore') }}</span>
            @else
                <a class="username" href="{{ route('user-profile') }}">{{ __(Auth::user()->nome . " " . Auth::user()->cognome) }} </a>
            @endif

            <div class="user-login">
                <a class="button header-btn logout-btn" href="{{ route('user-logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Esci') }}</a>
                <form id="logout-form" action="{{ route('user-logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    @endauth
</div>
