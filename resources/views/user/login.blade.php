@extends('layouts.user-layout')
@section('title','Đăng nhập')
@section('content')
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">ĐĂNG NHẬP</h1>
                                </div>
                                <form class="user" method="post" action="/login">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" placeholder="Nhập tài khoản ...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Nhập mật khẩu ...">
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/forgot_password">Quên mật khẩu ?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="/register">Chưa có tài khoản ? Tạo tài khoản !</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection