<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('/storage/css/index.css')}}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light navbar-size fixed-top menu">
            <a class="navbar-brand ml-5 " href="/">Comic</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item mr-3">
                        <form class="form-inline my-lg-0" method="GET" action="/search">
                            @csrf
                            <input class="form-control mr-sm-2" style="width: 500px;" type="search" placeholder="Nhập từ khóa" name="keyword">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm </button>
                        </form>
                    </li>
                    <li class="nav-item dropdown mr-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thể loại
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="padding:0px">
                            <table class="table" style="margin-bottom:0px">
                                <tbody>
                                    <tr>
                                        @foreach($categories as $key => $category)

                                        <td class="dropdown-item" style="display:revert"><a class="dropdown-item" href="#">{{$category->name}}</a></td>

                                        @if($key == 2||$key == 5||$key == 8||$key == 11)
                                    </tr>
                                    <tr>
                                        @endif
                                        @endforeach
                                    </tr>

                            </table>
                        </div>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link disabled" href="#">Fanpage</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="#">Đăng nhập</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="#">Đăng ký</a>
                    </li>
                </ul>

            </div>
        </nav>
    </header>
    @yield('cover')
    <div class="container-fluid top-20">
        @yield('content')
    </div>
    <footer class=" bg-dark text-center text-lg-start text-light">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Liên Hệ</h5>

                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                        molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
                        aliquam voluptatem veniam, est atque cumque eum delectus sint!
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Điều khoản</h5>

                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                        molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
                        aliquam voluptatem veniam, est atque cumque eum delectus sint!
                    </p>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-light" href="https://mdbootstrap.com/">Nguyễn Nam Vũ - CodegymVN</a>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>