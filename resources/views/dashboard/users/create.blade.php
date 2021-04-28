@extends('layouts.dashboard-layout')
@section('title','THÊM NGƯỜI DÙNG')
@section('content')
<div class="col-md-12">
    <form action="/admin/users/create" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="form-group row">
            <label class="col-md-2">Tên đăng nhập:</label>
            <input type="text" name="username" class="col-md-6 form-control" required>
            <div class="invalid-feedback">
                Vui lòng điền tên đăng nhập.
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Email:</label>
            <input type="email" name="email" class="col-md-6 form-control" required>
            <div class="invalid-feedback">
                Vui lòng điền email đầy đủ và đúng định dạng
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Mật Khẩu:</label>
            <input type="password" name="password" class="col-md-6 form-control" required>
            <div class="invalid-feedback">
                Vui lòng điền mật khẩu.
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Lặp lại mật khẩu:</label>
            <input type="password" name="password" class="col-md-6 form-control" required>
            <div class="invalid-feedback">
                Vui lòng nhập lại mật khẩu.
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Quyền :</label>
            <select class="form-control col-md-6" name="role">
                <option value="user">Người dùng</option>
                <option value="admin">Quản trị</option>
            </select>
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-primary mr-2" type="submit">Gửi</button>
            <a type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;">Hủy</a>
        </div>

    </form>
</div>
@endsection