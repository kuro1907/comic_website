<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-size">
    <a class="navbar-brand ml-5" href="#">Đụt Comic</a>
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
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class=" dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class=" dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class=" dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link disabled" href="#">Fanpage</a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link" href="#">Đăng nhập</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Đăng ký</a>
            </li>

        </ul>

    </div>
</nav>