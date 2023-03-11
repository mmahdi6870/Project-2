<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/templatemo.css">
    <link rel="stylesheet" href="/assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>
<style>
                .beru:hover{
                    color:pink!important;
                }
            </style>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:nabilashr0105@gmail.com">nabilashr0105@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="https://wa.me/+6281396316187">081396316187</a>
                </div>
                <div>
                    <a class="text-light" href="https://www.instagram.com/forever19.id/?hl=id/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://wa.me/+6281396316187" target="_blank"><i class="fab fa-whatsapp fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->
    
    
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
    
            <a style="color: pink" class="navbar-brand logo h1 align-self-center" href="index.html">
                FOREVER19.ID
            </a>
    
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link beru" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link beru" href="/product">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link beru" href="#kontak">Kontak</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    @auth
                    <a class="nav-icon position-relative text-decoration-none" href="/dashboard/keranjang">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                      
                    </a>

                    @endauth
                    @auth
                    <div class="dropdown">
                        <a class="nav-item dropdown-toggle text-decoration-none fs-6" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Halo <span class="text-capitalize">{{ auth()->user()->nama }}</span>
                        </a>
                        <ul class="dropdown-menu" style="font-family: serif;" >
                          <li><a class="dropdown-item fs-6" href="/dashboard"><i class="bi bi-house-door"></i> Halaman Beranda</a></li>
                          <li>
                            <form action="/logout" method="POST">
                                @csrf
                            <button type="submit" class="dropdown-item fs-6" href="/logout"><i class="bi bi-box-arrow-right"></i> Keluar</button>
                        </form>
                        </li>
                        </ul>
                      </div>
                      @else
                    <a class="nav-icon position-relative text-decoration-none" href="/login">
                        Login <i class="bi bi-box-arrow-in-right"></i>
                    </a>
                    @endauth
                </div>
            </div>
    
        </div>
    </nav>
    <!-- Close Header -->
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
    @yield('container')
</div>
   
    <!-- Start Script -->
   
    <script src="/assets/js/jquery-1.11.0.min.js"></script>
    <script src="/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="/assets/js/templatemo.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
    <!-- End Script -->
</body>

</html>