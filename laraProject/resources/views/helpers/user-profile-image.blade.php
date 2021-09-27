@php
    $userImgName = $image;

    if(is_null($userImgName))
        $userImgName = Config::get('images.default.user');

@endphp
<img src="{{ asset(Config::get('images.paths.user') . $userImgName)}}" class="{{ $class ?? '' }}">
