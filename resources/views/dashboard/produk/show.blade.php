    
@extends('template.main')
@section('container')

<style>
    .checked{
        color: #FCBE11;
    }
</style>
    <!-- Open Content -->
    <section class="bg-light pt-4">
        <div class="container pb-5">
            @if (session()->has('success'))
           <div class="row justify-content-center">
            <div class="col-lg-6">
               <div class="alert alert-success alert-dismissible text-center fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
           </div>   
          @endif
            @if (session()->has('nosuccess'))
           <div class="row justify-content-center">
            <div class="col-lg-6">
               <div class="alert alert-danger alert-dismissible text-center fade show mt-2" role="alert">
                {{ session('nosuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
           </div>   
          @endif
            <div class="row">
                <div class="col-lg-5 ">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" data-aos="zoom-in" data-aos-duration="1000" style="width:85%; margin-left:40px;" src="/assets/img/{{ $produk->image }}" alt="Card image cap" id="product-detail">
                    </div>
                    
                       
                </div>
                <!-- col end -->
                <div class="col-lg-7 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="row gx-0">
                                <div class="col-lg-6">.
                                    <div class="text-start">
                                        <h1 class="h2">{{ $produk->title }}</h1>
                                        <div class="row gx-0">
                                            <div class="col-lg-6">
                                                <p>{{ $rating->count() }} Ratings ||</p>
                                            </div>
                                            <div class="col-lg-6">
                                                @php $rate = number_format($star) @endphp
                                                <div class="rating" style="margin-left: -80px">
                                                    @for($i =1; $i<= $rate; $i++)
                                                    <i class="fa fa-star checked"></i>
                                                    @endfor
                                                    @for($j = $rate+1; $j<=4; $j++)
                                                    <i class="fa fa-star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    <p class="h3 py-2">@currency($produk->harga)</p>
                                    </div>
                                    
                                    <h6 class="h3">Kategori : <span class="text-primary">{{ $produk->category->name }}</span></h6>
                                    <h6 class="h3">Merek : <span class="text-primary">{{ $produk->merek->name }}</span></h6>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Beri Tinjauan
                                      </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        Komentar Tinjauan
                                      </button>
                                </div>
                                <div class="col">
                                    <h6>Deskripsi:</h6>
                            <p >{!! $produk->deskripsi  !!}</p>
                            
                                </div>
                            </div>
                            
                            

                          
                            <div class="card-footer" style="background-color:pink:"> 
                            <form action="/dashboard/keranjangs/{{ $produk->id }}" method="POST">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Jumlah
                                                <input type="hidden" name="jumlah" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item "><span  id="btn-minus"><i style="cursor: pointer;" class="bi bi-dash-circle-fill fs-5"></i></span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class=" " id="btn-plus"><i style="cursor: pointer;" class="bi bi-plus-circle-fill fs-5"></i></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <style>@media (min-width: 992px) {  
                                   .haha{ 
                                    height: 69px; 
                                    margin-left:40px!important
                                   }
                                }
                                </style>
                               
                                    <div class="row justify-content-center">
                                        <div class="col-lg-3 pt-2">
                                            <button class="btn btn-outline-success shadow rounded-pill " style="font-weight:700;" >Tambahkan Ke Keranjang</button>
                                        </div>
                                        <div class="col-lg-3 pt-2">
                                           <a class="btn btn-outline-danger shadow rounded-pill fw-semibold"  href="https://wa.link/aqgnm4"><i class="bi bi-whatsapp"></i> Beli via Whatsapp</a>
                                        </div>
                                        <div class="col-lg-3 pt-2">
                                           <a class="btn btn-outline-warning shadow rounded-pill fw-semibold" href="https://www.instagram.com/forever19.id/"><i class="bi bi-instagram"></i> Beli via Instagram </a>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5" style=" background-color:pink;">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4 class="text-center py-3">Produk-Produk Lainnya</h4>
            </div>
<div class="row gx-0 d-flex justify-content-center "data-aos="fade-up-left" data-aos-duration="2000">
    @foreach ($allproduk as $item)
    <div class="col-lg-4 px-2">
         <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/assets/img/{{ $item->image }}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body text-center">
              <h5 class="card-title  py-3">{{ $item->title }}</h5>
              <div class="row">
                <div class="col-lg-6">
                    <p class="card-text">Kategori: {{$item->category->name}}</p>
                </div>
                <div class="col-lg-6">
                    <p class="card-text">Merek: {{$item->merek->name}}</p>
                </div>
              </div>
              <h4 class="py-2 text-danger">@currency($item->harga)</h4>
              <p class="card-text"><small class="text-muted">Di Posting : {{ $item->created_at->diffForhumans() }}</small></p>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    @endforeach
</div>
            
        </div>
    </section>
    <!-- End Article -->
        <!-- Button trigger modal -->

  @if ($cis == Null)
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tinjauan Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6 text-center">
                <h6><span class="fw-bold">Nama Produk :</span><br>  {{ $produk->title }}</h6>
                <img  class="img-fluid" data-aos="zoom-in" data-aos-duration="1000" src="/assets/img/{{ $produk->image }}" alt="">
            </div>
            <div class="col-lg-6 text-center">
                <h6 class="pb-2">Kualitas Barang</h6>
                <form action="/rating/save/{{ $produk->id }}" method="POST">
                    @csrf               
                    <select name="star"  class="form-select form-select-md  text-center mb-3" aria-label=".form-select-lg example">
                        <option  selected>Silahkan Pilih ...</option>
                        <option value="1" >Tidak Bagus</option>
                        <option value="2" >Cukup Bagus</option>
                        <option value="3" >Bagus</option>
                        <option value="4" >Sangat Bagus</option>
                      </select>  
                   
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Komentar Pembeli</label>
                        <textarea name="komentar" class="form-control @error('komentar') is-invalid @enderror" id="exampleFormControlTextarea1"  rows="3"></textarea>
                        @error('komentar')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                      </div>
                      <button class="btn btn-success">Selesai</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tinjauan Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6 text-center">
                <h6><span class="fw-bold">Nama Produk :</span><br>  {{ $produk->title }}</h6>
                <img  class="img-fluid" data-aos="zoom-in" data-aos-duration="1000" src="/assets/img/{{ $produk->image }}" alt="">
            </div>
            <div class="col-lg-6 text-center">
                <h6 class="pb-2">Kualitas Barang</h6>
                <form action="/rating/save/{{ $produk->id }}" method="POST">
                    @csrf               
                    <select name="star"  class="form-select form-select-md  text-center mb-3" aria-label=".form-select-lg example">
                        @if ($user_rating[0]->star == 1)
                        <option value="1" selected>Tidak Bagus</option>
                        <option value="2" >Cukup Bagus</option>
                        <option value="3" >Bagus</option>
                        <option value="4" >Sangat Bagus</option>
                        @elseif($user_rating[0]->star == 2)
                        <option value="1" >Tidak Bagus</option>
                        <option value="2" selected>Cukup Bagus</option>
                        <option value="3" >Bagus</option>
                        <option value="4" >Sangat Bagus</option>
                        @elseif($user_rating[0]->star == 3)
                        <option value="1" >Tidak Bagus</option>
                        <option value="2" >Cukup Bagus</option>
                        <option value="3" selected>Bagus</option>
                        <option value="4" >Sangat Bagus</option>
                        @elseif($user_rating[0]->star == 4)
                        <option value="1" >Tidak Bagus</option>
                        <option value="2" >Cukup Bagus</option>
                        <option value="3" >Bagus</option>
                        <option value="4" selected>Sangat Bagus</option>
                        @endif  
                      </select>  
                      @if ($user_rating[0] == Null)
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Komentar Pembeli</label>
                        <textarea name="komentar" class="form-control @error('komentar') is-invalid @enderror" id="exampleFormControlTextarea1"  rows="3"></textarea>
                        @error('komentar')
                      <div class="invalid-feedback mb-2">
                        {{ $message }}
                        </div>
                      @enderror
                      </div>

                      @else
                      <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Komentar Pembeli</label>
                      <textarea name="komentar" class="form-control @error('komentar') is-invalid @enderror" id="exampleFormControlTextarea1"   rows="3">{{ $user_rating[0]->komentar }}</textarea>
                      @error('komentar')
                    <div class="invalid-feedback mb-2">
                      {{ $message }}
                      </div>
                    @enderror
                      </div>
                      @endif
                     
                      <button class="btn btn-success">Selesai</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Komentar Produk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
          <div class="row">
            <div class="col-lg-6">
              @foreach ($rating as $item)
                  @php $rate = $item->star @endphp
                  <div class="rating" >
                      @for($i =1; $i<= $rate; $i++)
                      <i class="fa fa-star checked"></i>  
                      @endfor
                      @for($j = $rate+1; $j<=4; $j++)
                      <i class="fa fa-star"></i>
                      @endfor
                  </div>
                  <p>{{ $item->komentar }}</p>
                  @endforeach
            </div>
            <div class="col-lg-4">
              @foreach ($rating as $item)
             <h6 class="pt-3">Pemberi Komentar : <span class="text-capitalize">{{ $item->user->nama }}</span></h6> 
          @endforeach
         
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
@endsection