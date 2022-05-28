<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MASTER</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- {{-- bootstrap --}} -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- {{-- font awesome --}} -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"
    integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg=="
    crossorigin="anonymous"></script>
    <!-- {{-- css --}} -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- {{-- QuilJs CSS --}} -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        @if(Auth::user())
        <div id="sidebar">
            <div class="sidebar-header py-4 text-center">
                <img src="{{asset('assets/profile_picture.jpeg')}}" alt="User avatar" width="100px" class="mx-3 rounded-circle">
                <h3 class="mt-3">{{ Auth::user()->username }}</h3>
            </div>
            <ul class="text-white list-unstyled components">
                <li class="@yield('nav-transaksi')">
                    <a href="/transaksi" class="ps-4 @yield('nav-transaksi')">
                        <i class="fas fa-money-check-alt me-2"></i>
                        Transaksi
                    </a>
                </li>
                <li class="@yield('nav-menu')"> 
                    <a href="/menu" class="ps-4 @yield('nav-menu')">
                        <i class="fas fa-list-alt me-2"></i>
                        Menu
                    </a>
                </li>
                <li class="@yield('nav-restock')"> 
                    <a href="/restock" class="ps-4 @yield('nav-restock')">
                        <i class="fas fa-boxes me-2"></i>
                        Restock
                    </a>
                </li>
                <li class="@yield('nav-laporan')"> 
                    <a href="/laporan" class="ps-4 @yield('nav-laporan')">
                        <i class="fas fa-newspaper me-2"></i>
                        Laporan
                    </a>
                </li>
                <li class="@yield('nav-riwayat')"> 
                    <a href="/riwayat" class="ps-4 @yield('nav-riwayat')">
                        <i class="fas fa-history me-2"></i>
                        Riwayat
                    </a>
                </li>
                <li class="@yield('nav-catatan')"> 
                  <a href="/catatan" class="ps-4 @yield('nav-catatan')">
                      <i class="fas fa-clipboard me-2"></i>
                      Catatan
                  </a>
              </li>
            </ul>
        </div>
        @endif
        <div id="content">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <div class="row w-100">
                        <div class="col-4 ps-2">
                            <button type="button" id="sidebarCollapse" class="btn btn-dark">
                                <i class="fas fa-align-left "></i>
                            </button>
                        </div>
                        <div class="col-4">
                            <center>
                                <img src="{{ asset('assets/Logo.png') }}" alt="Logo" width="30px">
                                {{-- <span>Nama Aplikasi</span> --}}
                            </center>
                        </div>
                        
                        @if(Auth::user())
                        <div class="col-4">
                          <a href="/logout" class="d-flex flex-row-reverse">Logout</a>
                        </div>
                        @else
                        <div class="col-2">
                          <a href="/login" class="d-flex flex-row-reverse">Login</a>
                        </div>
                        <div class="col-2">
                          <a href="/register" class="d-flex flex-row-reverse">Register</a>
                        </div>
                        @endif
                    </div>

                </div>
              </nav>
               @yield('content')
        </div>
    </div>
{{-- Jquery Slim --}}
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> </script>

{{-- Bundle Boostrap 5 JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

{{-- Popper Boostrap 5 --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"> </script>

{{-- Quill Js --}}
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript">
    $('#sidebarCollapse').on('click',function(){
        $("#sidebar, #content").toggleClass("active");
    });

    var quill = new Quill('#editor', {
    theme: 'snow'
    });
</script>
</body>
</html>