<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OkeKasir - Landing Page</title>
    @production
    <link rel="stylesheet" href="{{secure_asset('css/style.css')}}">
    <script src="{{secure_asset('js/jquery.min.js')}}"></script>
    <script src="{{secure_asset('js/script.js')}}"></script>
    @else
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    @endproduction

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
  </head>
  <body>
    <header class="sticky-top">
      <div class="container d-flex flex-wrap justify-content-center py-3">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
          <img src="{{ asset('assets/logo 2.png') }}" alt="OkeKasir" class="logo" width="170px" height="100%" />
        </a>

        <div class="col-md-6 ">
          <ul class="nav justify-content-end align-items-center">
            <li class="nav-item"><a href="#page1" class="nav-link link-dark" id="homeBtn">Home</a></li>
            <li class="nav-item"><a href="#tujuan" class="nav-link link-dark" id="tujuanBtn">Tujuan</a></li>
            <li class="nav-item"><a href="#fitur" class="nav-link link-dark" id="fiturBtn">Fitur-fitur</a></li>
            <li><a href="/login"><button type="button" class="boldBtn">Masuk</button></a></li>
            <li><a href="/register"><button class="btnBewarna" style="height: 40px; width: 100px" type="button">Daftar</button></a></li>
          </ul>
        </div>
    </div>
    </header>

    <div class="container">
      <div id="page1" style="margin-bottom: 110px; margin-top: 50px">
        <div class="row align-items-center">
          <div class="col  animate__animated animate__fadeInLeft">
            <h1 class="fw-semibold">
              Lakukan <span style="color: #0052e8">pembukuan perusahaan Anda</span>
              bersama kami.
            </h1>
            <p class="fw-light text-muted" style="padding-bottom: 10px;">OkeKasir bersedia untuk membantu Anda dalam mengatur data-data perusahaan dengan teratur, aman, dan nyaman hanya dengan satu sentuhan.</p>
            <a href="/register"><button class="btnBewarna" style="height: 40px; width: 200px; font-size: 16px" type="button">Coba Sekarang</button></a>
          </div>
          <div class="col animate__animated animate__fadeInRight">
            <img src="{{asset('assets/rafiki.svg')}}" alt="" style="height: 547.65px; width: 100%" class="illustrasi" />
          </div>
        </div>
      </div>
    </div>

    <div id="tujuan" style="background-color: #f7f8fc; padding: 110px 60px">
      <div class="container" style="padding: 0 200px;">
        <div class="row align-items-center justify-content-center">
          <img src="{{asset('assets/Group 1000003576.svg')}}" alt="" style="height: 100%; width: 928px;" class="illustrasi" />
          <h1 class="fw-semibold text-center">Membantu pembukuan secara <span style="color: #0052e8">cepat dan tepat</span></h1>
          <p class="fw-light text-muted text-center">Fitur - fitur yang kami sediakan dapat membantu Anda untuk mencatat semua aktivitas seperti transaksi ataupun restock barang dengan sangat cepat dengan minim error.</p>
        </div>
      </div>
    </div>

    <div class="container">
      <div id="fitur" style="margin-bottom: 110px; margin-top: 50px">
        <div class="row align-items-center">
          <div class="col">
            <img src="{{asset('assets/rafiki2.svg')}}" alt="" style="height: 547.65px; width: 100%" class="illustrasi"/>
          </div>
          <div class="col">
            <h1 class="fw-semibold">Pendataan <span style="color: #0052e8">transaksi</span> hanya dengan satu sentuhan</h1>
            <p class="fw-light text-muted">OkeKasir menyediakan fitur transaksi yang dapat membantu Anda untuk mencatat setiap transaksi yang berlangsung dengan data-data yang detail hanya dengan satu sentuhan.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="content" style="background-color: #f7f8fc; padding: 80px 0">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col">
            <h1 class="fw-semibold">Mengatur pendataan <span style="color: #0052e8">restok barang</span> bersama kami.</h1>
            <p class="fw-light text-muted">Dengan OkeKasir, pendataan restok barang menjadi lebih mudah untuk diatur yang dapat mencegah kesalahan pembelian restok barang.</p>
          </div>
          <div class="col">
            <img src="{{asset('assets/rafiki3.svg')}}" alt="" style="height: 581.79px; width: 100%" class="illustrasi" />
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="content" style="margin-bottom: 110px; margin-top: 50px">
        <div class="row align-items-center">
          <div class="col">
            <img src="{{asset('assets/rafiki4.svg')}}" alt="" style="height: 547.65px; width: 100%" class="illustrasi"/>
          </div>
          <div class="col">
            <h1 class="fw-semibold">Dapat <span style="color: #0052e8">mencatat progress</span> pekerjaan yang berlangsung</h1>
            <p class="fw-light text-muted">Dalam suatu perusahaan sangat dibutuhkan pencatatan pekerjaan yang berlangsung agar dapat melihat progress yang sedang berjalan ataupun mengurangi penugasan yang berulang.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="content" style="background-color: #f7f8fc; padding: 80px 0">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col">
            <h1 class="fw-semibold">Yuk segera gunakan <span style="color: #0052e8">OkeKasir</span> pada perusahaanmu!</h1>
            <a href="/register"><button class="btnBewarna" style="height: 40px; width: 200px; font-size: 16px; margin-top: 20px" type="button">Coba Sekarang</button></a>
          </div>
          <div class="col">
            <img src="{{asset('assets/rafiki5.svg')}}" alt="" style="height: 512.51px; width: 100%" class="illustrasi"/>
          </div>
        </div>
      </div>
    </div>

    <div class="footer" style="background-color: #f7f8fc; padding:20px">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-auto me-auto-scroll">
            <a href="/">
              <img src="{{asset('assets/logo 2.png')}}" alt="OkeKasir" class="logo" width="170px" height="100%" />
            </a>
          </div>
          <div class="col">
            <p class="fw-light text-muted text-end">Copyright, OkeKasir 2022. All rights reserved.</p>
          </div>
        </div>
      </div>
      </div>
    </div>
     
  </body>
</html>
