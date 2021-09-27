@php
    $imgName = $image;

    if(is_null($imgName))
        $imgName = Config::get('images.default.product');

    $imgPath = Config::get('images.paths.product') . $imgName;
@endphp


<img class="{{ $class ?? ''}}" src="{{ asset($imgPath) }}">
