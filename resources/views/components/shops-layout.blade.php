<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary sticky-top">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/">Laracon</a>
            <div class="d-flex dropdown ps-10 pe-10">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <!--<li class="nav-item"><a class="nav-link" href="#!">Về chúng tôi</a></li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh mục</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Tất cả sản phẩm</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#!">Nổi bật</a></li>
                            <li><a class="dropdown-item" href="#!">Hàng mới</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <input class="form-control form-control-sm input-sm mr-2" type="search" placeholder="Tìm sản phẩm" aria-label="Search">
                    <button class="btn btn-dark my-3 my-sm-0" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <div class="d-flex dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/cart" class="dropdown-item">
                                <i class="bi-cart-fill me-1"></i>
                                Giỏ hàng
                                <span class="badge bg-danger text-white ms-1 rounded-pill">0</span>
                            </a>
                        </li>
                        <li>
                            <a href="/register" class="dropdown-item">
                                <i class="bi bi-r-circle"></i>
                                Đăng ký
                            </a>
                        </li>
                        <li>
                            <a href="/login" class="dropdown-item">
                                <i class="bi bi-box-arrow-in-right"></i>
                                Đăng nhập
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <main>
        {{$slot}}
    </main>
    
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>