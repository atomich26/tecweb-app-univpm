<header id="site-header">

    <div id="header-left" class="flex-v-center">
        <div class="site-logo">
            @php echo file_get_contents(asset('images/electrohm_logo.svg')) @endphp 
        </div>

        <div class="divider"></div>
 
        @include('navbars.publicHeaderNav')
    </div>
    
    <div id="header-right" class="flex-v-center">
        @include('navbars.loginNavbar')  
    </div>
</header>