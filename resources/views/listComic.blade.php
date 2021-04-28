@extends('layouts.index-layout')
@section('title','Danh sách truyện')
@section('cover')
<div class="cover">
    <img src="/storage/img/513535.jpg" width="100%" height="450px" alt="">
</div>
@endsection
@section('content')

<div class="col-md-12">
    <div class="title-content col-md-12 bg-dark">
        <h3>DANH SÁCH TRUYỆN</h3>
    </div>
    <div class="row justify-content-center">
        @for($i = 0; $i < count($comics); $i++) <div class="col-lg-2 col-md-3 col-4 comic-item">
            <div class="img-comic">
                <img src="{{$comics[$i]->img}}" style="height: 100%;width:100%" alt="">
            </div>
            <div class="name-comic text-center "><a class="text-comic" href="/comic/{{$comics[$i]->id}}">{{$comics[$i]->name}}</a></div>
            <div class="chapter">
                @if(isset($lastestChapterList[$i]))
                <a class="text-comic" style="color: #fff" href="/comic/{{$comics[$i]->id}}/chapter/{{$lastestChapterList[$i]->id}}"> Chap {{$lastestChapterList[$i]->number}} - {{$lastestChapterList[$i]->name}} </a>
                @else
                <a class=" text-comic" style="color: #fff" href="#">Chưa cập nhật</a>
                @endif
            </div>

    </div>
    @endfor
</div>
</div>
@endsection