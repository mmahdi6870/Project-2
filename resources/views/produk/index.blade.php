@extends('template.main')
@section('container')
<div class="container py-5">
    <div class="row">

        <div class="col-lg-3">
            <div class="dropdown">
                <a style="font-family: serif" class="text-decoration-none text-dark fs-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Kategori
                </a>
                <ul class="dropdown-menu">
                    @foreach ($category as $cate)
                       <li><a class="dropdown-item" href="/product?category={{ $cate->slug }}">{{ $cate->name }}</a></li> 
                    @endforeach
                </ul>
              </div>
            <div class="dropdown py-4">
                <a style="font-family: serif" class="text-decoration-none text-dark fs-2 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Merek
                </a>
                <ul class="dropdown-menu">
                    @foreach ($merek as $m)
                       <li><a class="dropdown-item" href="/product?merek={{ $m->slug  }}">{{ $m->name }}</a></li> 
                    @endforeach
                </ul>
              </div>
        </div>

        <div class="col-lg-9">
            <div class="row">
              
                <div class="col-md-9 ">
                    <div class="d-flex">
                 <form action="/product" >      
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif   
                    @if (request('merek'))
                        <input type="hidden" name="merek" value="{{ request('merek') }}">
                    @endif   
            <div class="input-group mb-3">
              
                <input type="text" name="search" class="form-control" placeholder="Silahkan Cari ..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn" style="background-color: pink" type="submit" id="button-addon2">Temukan</button>
          
             </div>
            </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <form action="" method="GET">
                <div class="input-group">
                    <select class="form-select" id="tampil" name="tampil" aria-label="Example select with button addon">
    <option selected>pilih...</option>
    <option value="6">6</option>
    <option value="12">12</option>
    <option value="24">24</option>
  </select>
  <button class="btn"  style="background-color:pink;" type="submit">OK</button>
</div>
</div>
</form>
                <div class="d-flex justify-content-end">
                    {{ $produk->links() }}
                </div>
               
            </div>
            <div class="row">
                @foreach ($produk as $pd)
                <div class="col-md-4">
                    <div class="card mb-4 product-wap rounded-0" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="card rounded-0 " >
                            <img class="card-img rounded-0 img-fluid" src="/assets/img/{{ $pd->image }}">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white mt-2" href="/dashboard/produk/{{ $pd->slug }}"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body text-center" style="background-color:pink;">
                            <a href="shop-single.html" class="h3 text-decoration-none">{{ $pd->title }}</a>
                            
                            <ul class="list-unstyled d-flex justify-content-evenly mt-2">
                                <li>
                                   <p>{{ $pd->category->name }}</p>  
                                </li>
                                <li class="px-2"> 
                                    <p class="text-danger fw-bold">{{ $pd->merek->name }}</p>  
                                </li>
                            </ul>
                            <p class="text-center mb-0 " style="margin-top: -20px">@currency($pd->harga)</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
         
        </div>

    </div>
</div>
<!-- End Content -->

<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Brand Kami</h1>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand2.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand3.webp" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand4.webp" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand2.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand4.webp" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand3.webp" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand3.webp" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand2.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand4.webp" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="/assets/img/brand.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Third slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Brands-->
@endsection