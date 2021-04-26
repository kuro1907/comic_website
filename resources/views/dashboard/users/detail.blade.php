@extends('layouts.dashboard-layout')
@section('title','Thông tin người dùng')
@section('content')
<div class="col-md-12">
    <form action="/admin/users/create" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="form-group row">
            <label class="col-md-2">Tên đăng nhập:</label>
            <input type="text" name="username" value="{{$user->username}}" class="col-md-6 form-control" disabled>
            <div class="invalid-feedback">
                Vui lòng điền tên đăng nhập.
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Email:</label>
            <input type="email" name="email" value="{{$user->email}}" class="col-md-6 form-control" disabled>
            <div class="invalid-feedback">
                Vui lòng điền email đầy đủ và đúng định dạng
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Mật Khẩu:</label>
            <input type="password" name="password" value="{{$user->password}}" class="col-md-6 form-control" disabled>
            <div class="invalid-feedback">
                Vui lòng điền mật khẩu.
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Quyền :</label>
            <select class="form-control col-md-6" name="role" disabled>
                @if($user->role == "admin")

                <option value="user">Người dùng</option>
                <option value="admin" selected>Quản trị</option>
                @else

                <option value="user" selected>Người dùng</option>
                <option value="admin">Quản trị</option>
                @endif

            </select>
        </div>
        <div class="row justify-content-center">
            <button class="btn btn-primary mr-2" type="submit">Gửi</button>
            <a type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;">Hủy</a>
        </div>

    </form>
</div>
@endsection