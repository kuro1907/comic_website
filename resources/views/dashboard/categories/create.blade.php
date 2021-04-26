@extends('layouts.dashboard-layout')
@section('title','THÊM THỂ LOẠI')
@section('content')
<div class="col-md-12">
    <form action="/admin/categories/create" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="form-group row">
            <label class="col-md-2">Tên thể loại</label>
            <input type="text" name="name" class="col-md-6 form-control" required>
            <div class="invalid-feedback">
                Vui lòng điền tên thể loại.
            </div>
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-primary mr-2" type="submit">Gửi</button>
            <a type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;">Hủy</a>
        </div>

    </form>
</div>
@endsection