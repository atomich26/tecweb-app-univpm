@php 
    $userImgName = Auth::user()->file_img;

    if($userImgName == null)
        $userImgName = "default-user.jpg";
@endphp

<div id="login-nav">
    <img src="{{ asset('storage/images/profiles/' . $userImgName) }}" width="50px" height="50px" style="border-radius:50%"> 
</div>