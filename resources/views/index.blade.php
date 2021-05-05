@extends('layouts.index-layout')
@section('title')
<title>Trang chủ</title>
@endsection
@section('cover')
<div class="cover">
    <div id="carouselExampleControls" class="carousel slide cover" data-ride="carousel">
        <div class="carousel-inner round">
            @foreach($slides as $key => $slide)
            @if($slide->slide == 1)

            @if($loop->first)
            <div class="carousel-item active"><a href="/comic/{{$slide->id}}">
                    @else
                    <div class="carousel-item"><a href="/comic/{{$slide->id}}">
                            @endif
                            <div class="carousel-caption d-none d-md-block bg-cover">
                                <h4>{{$slide->name}}</h4>
                            </div>
                            <img class="d-block w-100 " src="{{$slide->cover_img}}" style="height:450px">
                        </a></div>
                    @endif
                    @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="col-md-12">
    <div class="title-content col-md-12 bg-dark">
        <h3>TRUYỆN VỪA CẬP NHẬT</h3>
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
<div class="col-md-12">
    <div class="row justify-content-center">
        <div class="pagination">
            {{ $comics->appends(request()->query()) }}
        </div>

    </div>
</div>
@endsection