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
        <a class="button header-btn profile-btn" href="#">Area utente</a>
        @php 
            $userImgName = Auth::user()->file_img;

            if($userImgName == null)
                $userImgName = "default-user.jpg";
         @endphp
        <div class="user-info flex-v-center">
            <img src="{{ asset('storage/images/profiles/' . $userImgName)}}" width="40px" height="40px" style="border-radius:50%"> 
            
            <a id="username" href="#">
                @if(Auth::user()->checkRole('admin'))
                    {{ __('Amministratore') }}
                @else
                    {{ __(Auth::user()->nome . " " . Auth::user()->cognome) }} 
                @endif
            </a>

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
