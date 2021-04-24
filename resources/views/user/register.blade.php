@extends('layouts.user-layout')
@section('title','Đăng ký')
@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">TẠO TÀI KHOẢN </h1>
                        </div>
                        <form class="user needs-validation" method="post" action="/register" novalidate>
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="username" placeholder="Nhập tài khoản" required>
                                <div class="invalid-feedback">
                                    Vui lòng điền tên đăng nhập.
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email" placeholder="Nhập email" required>
                                <div class="invalid-feedback">
                                    Vui lòng điền email đầy đủ và đúng định dạng.
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" name="password" placeholder="Mật khẩu" required>
                                    <div class="invalid-feedback">
                                        Vui lòng điền mật khẩu.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" name="repeatPassword" placeholder="Lặp lại mật khẩu" required>
                                    <div class="invalid-feedback">
                                        Vui lòng nhập lại mật khẩu.
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success btn-user btn-block">Tạo tài khoản</button>
                            <hr>
                            <a href="/forgot_password" class="btn btn-google btn-user btn-block">
                                <i>Quên mật khẩu ?</i>
                            </a>
                            <a href="/login" class="btn btn-facebook btn-user btn-block">
                                <i>Đã có tài khoản ? Đăng nhập !</i>
                            </a>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection