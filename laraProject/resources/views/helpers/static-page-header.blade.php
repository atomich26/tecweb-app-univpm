@php
    if($imgCover == null) 
        $imgCover = "default_cover.jpg"
@endphp

<div class="page-header">
    <img src=" {{ asset('storage/images/covers/' . $imgCover)}}" class="page-cover-header">
    <div class="page-header-content flex-v-center">
        <h1 class="page-title">{{$title}}</h1>
    </div>
</div>