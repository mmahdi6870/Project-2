`@extends('template.main')

@section('container')
    
<style>
    .checked{
        color: #FCBE11;
    }
</style>

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>


<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators ">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img style="width:600px" class="img-fluid" src="assets/img/depan-tes.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center" style="text-align: justify">
                            <h1 style="color: pink" class="h1 "><b>Forever19</b> OlShop</h1>
                            <h3 class="h2">Body Care</h3>
                            <p>
                                Body Care adalah memberikan perlindungan bagi kulit kamu agar tidak kusam dan tetap cerah juga terawat. Kandungan Glutathione (Mother of Antioxidant), Vitamin E dan buliran scrub halus yang terdapat didalam Scarlett Whitening Shower Scrub Cucumber apabila digunakan secara rutin dapat membantu meregenerasi, melembabkan serta mencerahkan kulit tubuh secara lebih maksimal.</a>,
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" style="width:600px" src="assets/img/depan-tes2.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center" style="text-align: justify">
                        <div class="text-align-left">
                            <h1 style="color: pink" class="h1 "><b>Forever19</b> OlShop</h1>
                            <h3 class="h2">Face Care</h3>
                            <p>
                                Skincare sendiri adalah menutrisi kulit setelah seharian beraktivitas. Hasilnya kulit terlihat lebih sehat dan terawat karena adanya kandungan pada skincare. Beberapa kandungan skincare yang baik untuk kulit, yakni AHA-BHA yang mampu mencerahkan kulit, hyaluronic acid yang dapat melembapkan, vitamin C yang mampu mengurangi dampak radikal bebas pada kulit, dan kolagen yang bisa mengencangkan kulit.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid"  style="width:600px" src="./assets/img/depan-tes3.png" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div style="text-align: justify">
                            <h1 style="color: pink" class="h1 "><b>Forever19</b> OlShop</h1>
                            <h3 class="h2">Hair Care</h3>
                            <p>
                                Hair care atau hair treatment memiliki peran penting untuk memperbaiki, melembapkan, dan melindungi rambut dari kerusakan eksternal. Sebagai contoh, mengecat rambut, mengeriting, penggunaan hair dryer, bahkan paparan sinar UV.
                                untuk melembapkan folikel rambut, mengurangi rambut bercabang, melindungi kulit kepala, mengurangi kerusakan pada kulit kepala, serta mempermudah menata rambut.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="fw-semibold">Kategori Produk</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($category as $data)
            
        <div class="col-12 col-md-4 p-5 mt-3" data-aos="flip-right">
            <a href="/product?category={{ $data->slug }}"><img src="/assets/img/{{ $data->image }}" class="rounded-circle img-fluid border"></a>
            <h5 class="text-center mt-3 mb-3">{{ $data->name }}</h5>
            <p class="text-center"><a class="btn btn-success" href="/product?category={{ $data->slug }}" >Menuju Item</a></p>
        </div>
        @endforeach
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="fw-semibold">Produk Terbaru</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mb-4" data-aos="zoom-in" data-aos-duration="1000">
                <div style="background-color: pink" class="text-dark card h-100">
                    <a href="/dashboard/produk/{{ $produk[0]->slug }}">
                        <img src="/assets/img/{{ $produk[0]->image }}" class="card-img-top" alt="...">
                    </a>
                    <div class="text-center card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class=" text-end fw-bold">@currency($produk[0]->harga)</li>
                            <li class=" text-end fw-bold">{{ $produk[0]->merek->name }}</li>
                            @php $rate = number_format($hes) @endphp
                            <div class="rating" >
                                @for($i =1; $i<= $rate; $i++)
                                <i class="fa fa-star checked"></i>
                                @endfor
                                @for($j = $rate+1; $j<=4; $j++)
                                <i class="fa fa-star"></i>
                                @endfor
                            </div>
                        </ul>
                        <a href="/dashboard/produk/{{ $produk[0]->slug }}" class="h2 text-decoration-none text-dark">
                            {{ $produk[0]->title }}
                        </a>
                       
                        <p class="">Reviews ({{ $h }})</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4" data-aos="zoom-in" data-aos-duration="1000">
                <div style="background-color: pink" class="text-dark card h-100">
                    <a href="/dashboard/produk/{{ $produk[1]->slug }}">
                        <img src="/assets/img/{{ $produk[1]->image }}" class="card-img-top" alt="...">
                    </a>
                    <div class="text-center card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class=" text-end fw-bold">@currency($produk[1]->harga)</li>
                            <li class=" text-end fw-bold">{{ $produk[1]->merek->name }}</li>
                            @php $rate = number_format($hes2) @endphp
                            <div class="rating" >
                                @for($i =1; $i<= $rate; $i++)
                                <i class="fa fa-star checked"></i>
                                @endfor
                                @for($j = $rate+1; $j<=4; $j++)
                                <i class="fa fa-star"></i>
                                @endfor
                            </div>
                        </ul>
                        <a href="/dashboard/produk/{{ $produk[1]->slug }}" class="h2 text-decoration-none text-dark">
                            {{ $produk[1]->title }}
                        </a>
                       
                        <p class="">Reviews ({{ $h2 }})</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4" data-aos="zoom-in" data-aos-duration="1000">
                <div style="background-color: pink" class="text-dark card h-100">
                    <a href="/dashboard/produk/{{ $produk[2]->slug }}">
                        <img src="/assets/img/{{ $produk[2]->image }}" class="card-img-top" alt="...">
                    </a>
                    <div class="text-center card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class=" text-end fw-bold">@currency($produk[2]->harga)</li>
                            <li class=" text-end fw-bold">{{ $produk[2]->merek->name }}</li>
                            @php $rate = number_format($hes3) @endphp
                            <div class="rating" >
                                @for($i =1; $i<= $rate; $i++)
                                <i class="fa fa-star checked"></i>
                                @endfor
                                @for($j = $rate+1; $j<=4; $j++)
                                <i class="fa fa-star"></i>
                                @endfor
                            </div>
                        </ul>
                        <a href="/dashboard/produk/{{ $produk[2]->slug }}" class="h2 text-decoration-none text-dark">
                            {{ $produk[2]->title }}
                        </a>
                        
                        <p class="">Reviews ({{ $h3 }})</p>
                    </div>
                </div>
            </div>
           
            
        </div>
    </div>
</section>
 <!-- Start Footer -->
 <footer class="bg-dark" id="tempaltemo_footer">
    <div class="container " id="kontak">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 style="color: pink" class="h2 border-bottom pb-3 border-light logo">Forever19.ID</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        <a class="text-decoration-none beru" href="https://goo.gl/maps/7RBVvMyD99ZVyc8E6">Jl. Karya Darma GG. Amal</a>
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none beru" href="https://wa.link/aqgnm4">0813-9631-6187</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none beru" href="mailto:nabilashr0105@gmail.com">nabilashr0105@gmail.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Kategori</h2>
                <ul class="text-capitalize list-unstyled text-light footer-link-list">
                    @foreach ($category as $data)
                        
                    <li><a class="text-decoration-none beru" href="/product?category={{ $data->slug }}">{{ $data->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Informasi Fitur</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none beru" href="/dashboard">Beranda</a></li>
                    <li><a class="text-decoration-none beru" href="#">Lokasi Online Shop</a></li>
                    <li><a class="text-decoration-none beru" href="#kontak">Kontak</a></li>
                </ul>
            </div>

        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
           
            <div class="col-auto me-auto">
              
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/forever19.id/"><i class="fab fa-instagram fa-lg fa-fw  beru"></i></a>
                   
                        <a class="text-light text-decoration-none" target="_blank" href="https://wa.link/aqgnm4"><i class="fab fa-whatsapp fa-lg fa-fw beru"></i></a>
                    
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; 2022 Forever19.ID 
                        | Designed by M Lutfi Akbar
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

@endsection
<!-- End Featured Product -->