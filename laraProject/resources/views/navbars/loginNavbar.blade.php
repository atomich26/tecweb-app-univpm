<div id="header-login" class="flex-v-center">
    @guest
        @if(!Route::is('login-form'))
            <a href="{{ route('login-form') }}" class="button header-btn login-btn">
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
        @php 
            $userImgName = Auth::user()->file_img;

            if($userImgName == null)
                $userImgName = "default-user.jpg";
         @endphp
        <div class="header-user-info flex-v-center">
            <img src="{{ asset('storage/images/profiles/' . $userImgName)}}" width="40px" height="40px" style="border-radius:50%"> 
            <a href="#">
                @if(Auth::user()->checkRole('admin'))
                    {{ __('Amministratore') }}
                @else
                    {{ __(Auth::user()->nome . " " . Auth::user()->cognome) }} 
                @endif
            </a>
        </div>
        <div class="user-logout">
            <a class="button header-btn logout-btn" href="{{ route('user-logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Esci') }}</a>
            <form id="logout-form" action="{{ route('user-logout') }}" method="POST" style="display: none;">
                    @csrf
            </form>
        </div>
    @endauth
</div>
