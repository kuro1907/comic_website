@extends('layouts.user-layout')
@section('title','Quên mật khẩu')
@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Quên mật khẩu ?</h1>
                                    <p class="mb-4">Nhập email để thiết lập lại mật khẩu.</br>
                                        Chúng tôi sẽ gửi email thiết lập lại mật khẩu qua email của bạn</br>
                                        Vui lòng kiểm tra email để nhận link.
                                    </p>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nhập email ...">
                                    </div>
                                    <a href="login.html" class="btn btn-primary btn-user btn-block">
                                        Gửi email
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/register">Tạo tài khoản !</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="/login">Đã có tài khoản ? Đăng nhập !</a>
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