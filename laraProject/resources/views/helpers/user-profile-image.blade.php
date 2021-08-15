@php
    $userImgName = Auth::user()->file_img;

    if($userImgName == null)
        $userImgName = "default-user.jpg";

@endphp
<img src="{{ asset('storage/images/profiles/' . $userImgName)}}" width="{{ is_numeric($width) ? $width : 40 }}px" height="{{ is_numeric($width) ? $width : 40 }}px" style="border-radius:50%"> 