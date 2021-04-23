@extends('layouts.index-layout')
@section('title','Trang chủ')
@section('cover')
<div class="cover">
    <div id="carouselExampleControls" class="carousel slide cover" data-ride="carousel">
        <div class="carousel-inner round">
            @foreach($comics as $key => $comic)
            @if($comic->slide == 1)

            @if($loop->first)
            <div class="carousel-item active"><a href="/comic/{{$comic->id}}">
                    @else
                    <div class="carousel-item"><a href="/comic/{{$comic->id}}">
                            @endif
                            <div class="carousel-caption d-none d-md-block bg-cover">
                                <h4>{{$comic->name}}</h4>
                            </div>
                            <img class="d-block w-100 " src="{{$comic->cover_img}}" style="height:450px">
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
                <div class="name-comic"><a class="text-comic" href="/comic/{{$comics[$i]->id}}">{{$comics[$i]->name}}</a></div>
                <div class="chapter"> <a class="text-comic" href="/comic/{{$comics[$i]->id}}/"> Chap {{$lastestChapterList[$i]->number}} - {{$lastestChapterList[$i]->name}} </a></div>

        </div>
        @endfor
    </div>
</div>
@endsection