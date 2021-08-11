@php 
    $resourcePath = null;

    if($imgName != null)
        $resourcePath = $imgPath . $imgName;
    else
        $resourcePath = $imgPath . $imgDefault;
@endphp

<img src={{ asset($resourcePath) }}>