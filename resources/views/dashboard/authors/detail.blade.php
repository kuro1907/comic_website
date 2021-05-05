@extends('layouts.dashboard-layout')
@section('title')
<title>Chi tiết tác giả {{$author->name}}</title>
@endsection

@section('title-section')
Chi tiết tác giả {{$author->name}}
@endsection
@section('content')
<div class="col-md-12">
    <form action="/admin/authors/edit/{{$author->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group row">
            <label class="col-md-2">Tên tác giả :</label>
            <input type="text" name="name" value="{{$author->name}}" class="col-md-6 form-control" disabled>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Ngày sinh :</label>
            <input type="date" name="dayBirth" value="{{$author->dayBirth}}" class="col-md-6 form-control" disabled>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Mô tả :</label>
            <textarea name="description" cols="30" rows="10" class="form-control col-md-6" disabled>{{$author->description}}</textarea>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Ảnh tác giả :</label>
            <img class="col-md-6" src="{{$author->img}}" width="150px" alt="">
        </div>


        <div class="row justify-content-center">
            <button class="btn btn-primary mr-2" type="submit">Gửi</button>
            <a type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;">Hủy</a>
        </div>

    </form>
</div>
@endsection