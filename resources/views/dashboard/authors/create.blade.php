@extends('layouts.dashboard-layout')
@section('title','THÊM TÁC GIẢ')
@section('content')
<div class="col-md-12">
    <form action="/admin/authors/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-md-2">Tên tác giả :</label>
            <input type="text" name="name" class="col-md-6 form-control">
        </div>
        <div class="form-group row">
            <label class="col-md-2">Ngày sinh :</label>
            <input type="date" name="dayBirth" class="col-md-6 form-control">
        </div>
        <div class="form-group row">
            <label class="col-md-2">Mô tả :</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control col-md-6"></textarea>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Ảnh :</label>
            <input type="file" name="img" class="form-control col-md-6">
        </div>
        <button type="submit">Gửi</button>
        <a type="button" class="btn btn-primary" href="windown.onload()"></a>
    </form>
</div>
@endsection