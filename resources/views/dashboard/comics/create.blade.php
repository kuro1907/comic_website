@extends('layouts.dashboard-layout')
@section('title')
<title>Thêm truyện</title>
@endsection

@section('title-section')
Thêm truyện
@endsection
@section('content')
<div class="col-md-12">
    <form action="/admin/comics/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-md-2">Tên truyện :</label>
            <input type="text" name="name" class="col-md-6 form-control">
        </div>
        <div class="form-group row">
            <label class="col-md-2">Mô tả :</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control col-md-6"></textarea>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Tình trạng :</label>
            <select class="form-control col-md-6" name="status">
                <option value="1">Đang tiến hành</option>
                <option value="2">Đã hoàn thành</option>
                <option value="3">Tạm dừng</option>

            </select>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Ảnh đại diện:</label>
            <input type="file" name="img" class="form-control col-md-6">
        </div>
        <div class="form-group row">
            <label class="col-md-2">Ảnh bìa:</label>
            <input type="file" name="cover_img" class="form-control col-md-6">
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-primary mr-2" type="submit">Gửi</button>
            <a type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;">Hủy</a>
        </div>

    </form>
</div>
@endsection