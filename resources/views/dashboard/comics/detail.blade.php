@extends('layouts.dashboard-layout')
@section('title','THÔNG TIN TRUYỆN')
@section('content')

<div class="col-md-12">
    <form action="/admin/comics/edit/{{$comic->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-md-2">Tên truyện :</label>
            <input type="text" name="name" value="{{$comic->name}}" class="col-md-6 form-control" disabled>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Mô tả :</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control col-md-6" disabled>{{$comic->description}}</textarea>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Slide Chính :</label>
            <select class="form-control col-md-6" name="slide" disabled>
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
            <select class="form-control col-md-6" name="status" disabled>
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
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Ảnh bìa:</label>
            <div class="col-md-6">
                <img src="{{$comic->cover_img}}" width="100%">
            </div>
        </div>
    </form>
    <hr>
    <h3>Danh sách chap</h3>
    <table class="table table-striped table-bordered top-20 table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên chương</th>
                <th scope="col">Ngày giờ cập nhật</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chapters as $key => $chapter)
            <tr>
                <td scope="row">{{++$key}}</td>
                <td><a class="text-comic" href="/comic/{{$comic->id}}/chapter/{{$chapter->id}}">Chap {{$chapter->number}}: {{$chapter->name}}</a></td>
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
    <div class="row justify-content-center">
        <a class="btn btn-success mr-2" href="/admin/comics/details/{{$comic->id}}/addchapter">Thêm chap mới</a>

        <a type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;">Trở về</a>
    </div>
</div>
@endsection