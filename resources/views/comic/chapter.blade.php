@extends('layouts.index-layout')
@section('title')
<title> Truyện {{$comic->name}}</title>
@endsection
@section('cover')
<div class="col-md-12 top-50">
    <div class="row justify-content-md-center">
        <h3>{{$comic->name}} - Chap {{$chapter->number}}: {{$chapter->name}}</h3>
    </div>

    <div class="row justify-content-md-center">

        <div class="col-md-5 ">
            <select class="form-control" onchange="window.location=this.value;">
                @foreach($chapters as $key => $currentChapter)
                @if($currentChapter->id == $chapter->id)
                <option value="/comic/{{$comic->id}}/chapter/{{$currentChapter->id}}" selected>Chap {{$currentChapter->number}} - {{$currentChapter->name}}</option>
                @else
                <option value="/comic/{{$comic->id}}/chapter/{{$currentChapter->id}}">Chap {{$currentChapter->number}} - {{$currentChapter->name}}</option>
                @endif
                @endforeach
            </select>
        </div>


    </div>

</div>

@endsection

@section('content')
<div class="content bottom-50 ">
    <div class="row justify-content-md-center">
        {!!$chapter->content!!}
    </div>
</div>
<div class="col-md-12 top-50">
    <div class="row justify-content-md-center">
        <h3>{{$comic->name}} - Chap {{$chapter->number}}: {{$chapter->name}}</h3>
    </div>


    <div class="row justify-content-md-center">

        <div class="col-md-5 ">
            <select class="form-control" onchange="window.location=this.value;">
                @foreach($chapters as $key => $currentChapter)
                @if($currentChapter->id == $chapter->id)
                <option value="/comic/{{$comic->id}}/chapter/{{$currentChapter->id}}" selected>Chap {{$currentChapter->number}} - {{$currentChapter->name}}</option>
                @else
                <option value="/comic/{{$comic->id}}/chapter/{{$currentChapter->id}}">Chap {{$currentChapter->number}} - {{$currentChapter->name}}</option>
                @endif
                @endforeach
            </select>
        </div>


    </div>

</div>

@endsection