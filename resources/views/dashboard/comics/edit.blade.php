@extends('layouts.dashboard-layout')
@section('title')
<title>Chi tiết truyện {{$comic->name}}</title>
@endsection

@section('title-section')
Chi tiết truyện {{$comic->name}}
@endsection
@section('content')
<div class="col-md-12">
    <form action="/admin/comics/edit/{{$comic->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group row">
            <label class="col-md-2">Tên truyện :</label>
            <input type="text" name="name" value="{{$comic->name}}" class="col-md-6 form-control">
        </div>
        <div class="form-group row">
            <label class="col-md-2">Mô tả :</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control col-md-6">{{$comic->description}}</textarea>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Slide Chính :</label>
            <select class="form-control col-md-6" name="slide">
                @if($comic->slide == 1)
                <option value="1" selected>Có</option>
                <option value="0">Không</option>
                @endif
                @if($comic->slide == 0)
                <option value="1">Có</option>
                <option value="0" selected>Không</option>
                @endif
            </select>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Tình trạng :</label>
            <select class="form-control col-md-6" name="status">
                @if($comic->status == 1)
                <option value="1" selected>Đang tiến hành</option>
                <option value="2">Đã hoàn thành</option>
                <option value="3">Tạm dừng</option>
                @endif
                @if($comic->status == 2)
                <option value="1">Đang tiến hành</option>
                <option value="2" selected>Đã hoàn thành</option>
                <option value="3">Tạm dừng</option>
                @endif
                @if($comic->status == 3)
                <option value="1">Đang tiến hành</option>
                <option value="2">Đã hoàn thành</option>
                <option value="3" selected>Tạm dừng</option>
                @endif
            </select>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Ảnh đại diện:</label>
            <div class="col-md-6">
                <img src="{{$comic->img}}" width="150px">
                <input type="file" name="img" class="form-control col-md-6">

            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Ảnh bìa:</label>
            <div class="col-md-6">
                <img src="{{$comic->cover_img}}" width="100%">
                <input type="file" name="cover_img" class="form-control col-md-6">

            </div>
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-primary mr-2" type="submit">Gửi</button>
            <a type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;">Trở về</a>
        </div>

    </form>
</div>
@endsection