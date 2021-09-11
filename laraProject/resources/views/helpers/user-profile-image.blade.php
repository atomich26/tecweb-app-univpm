@php
    $userImgName = Auth::user()->file_img;

    if(is_null($userImgName))
        $userImgName = Config::get('images.default.user');

@endphp
<img src="{{ asset(Config::get('images.paths.user') . $userImgName)}}" class="user-img">
