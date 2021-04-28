@extends('layouts.index-layout')
@section('title')
<title>Truyện {{$entities->name}}</title>
@endsection
@section('cover')
<div class="cover">
    <img src="{{$entities->cover_img}}" width="100%" height="450px" alt="">
</div>
@endsection
@section('content')
<div class="container-fruid top-20">
    <div class="col-md-12">
        <div class="row justify-content-md-center">
            <div class="col-md-3 col-sm-6 img-title">
                <img src="{{$entities->img}}" width="100%" height="100%" alt="">
            </div>
            <div class="col-md-8 col-sm-6">
                <h4>Tên truyện : {{$entities->name}}</h4>
                <p><strong> Thể loại :</strong></p>
                <p><strong> Tác giả : </strong>{{$author}}</p>
                <p><strong> Tình trạng : </strong>
                    @switch($entities->status)
                    @case(1)
                    Đang tiến hành
                    @break

                    @case(2)
                    Đã hoàn thành
                    @break

                    @case(2)
                    Tạm dừng
                    @break

                    @endswitch
                </p>
                <p><strong> Mô tả :</strong> {{$entities->description}}</p>

            </div>
        </div>
    </div>
</div>
<div class="container justify-content-md-center">
    <table class="table table-striped table-bordered top-20 table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên chương</th>
                <th scope="col">Giờ cập nhật</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chapters as $key => $chapter)
            <tr>
                <td scope="row">{{++$key}}</td>
                <td><a class="text-comic" href="/comic/{{$entities->id}}/chapter/{{$chapter->id}}">Chap {{$chapter->number}}: {{$chapter->name}}</a></td>
                <td>{{$chapter->dayRelease}}</td>
            </tr>
            @endforeach
            @if(count($chapters)== 0)
            <tr>
                <td></td>
                <td>Đang cập nhật</td>
                <td></td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection