<header id="site-header">

    <div id="header-left" class="flex-v-center">
        <div class="site-logo">
            @php echo file_get_contents(asset('images/electrohm_logo.svg')) @endphp 
        </div>

        <div class="divider"></div>
 
        @include('navbars.public-header-nav')
    </div>
    
    <div id="header-right" class="flex-v-center">
        @include('navbars.login-navbar')  
    </div>
</header>