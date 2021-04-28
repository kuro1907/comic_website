@extends('layouts.index-layout')
@section('title','Truyện')
@section('cover')
<div class="col-md-12 top-50">
    <div class="row justify-content-md-center">
        <h3>{{$comic->name}} - Chap {{$chapter[0]->number}}: {{$chapter[0]->name}}</h3>
    </div>
    <div class="row justify-content-md-center">
        <a class="col-md-2 btn btn-dark" href="/comic/{{$comic->id}}/chapter/">Chap trước</a>
        <div class="col-md-5 ">
            <select class="form-control" onchange="window.location=this.value;">
                @foreach($chapters as $key => $currentChapter)
                @if($currentChapter->id == $chapter[0]->id)
                <option value="/comic/{{$comic->id}}/chapter/{{$currentChapter->id}}" selected>Chap {{$currentChapter->number}} - {{$currentChapter->name}}</option>
                @else
                <option value="/comic/{{$comic->id}}/chapter/{{$currentChapter->id}}">Chap {{$currentChapter->number}} - {{$currentChapter->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <a class="col-md-2 btn btn-dark" href="">Chap sau</a>

    </div>

</div>

@endsection

@section('content')
<div class="content bottom-50 ">
    <div class="row justify-content-md-center">
        {!!$chapter[0]->content!!}
    </div>
</div>
<div class="container-fruid">
    <div class="col-md-12 top-50">

        <div class="row justify-content-md-center">
            <a class="col-md-2 btn btn-dark" href="">Chap trước</a>
            <div class="col-md-5 ">
                <select class="form-control" onchange="window.location=this.value;">
                    @foreach($chapters as $key => $currentChapter)
                    @if($currentChapter->id == $chapter[0]->id)
                    <option value="/comic/{{$comic->id}}/chapter/{{$currentChapter->id}}" selected>Chap {{$currentChapter->number}} - {{$currentChapter->name}}</option>
                    @else
                    <option value="/comic/{{$comic->id}}/chapter/{{$currentChapter->id}}">Chap {{$currentChapter->number}} - {{$currentChapter->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <a class="col-md-2 btn btn-dark" href="">Chap sau</a>

        </div>

    </div>
</div>

@endsection