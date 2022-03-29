@extends('layouts.master')

@section('nav-riwayat')
active
@endsection

@section('content')
<div class="containers">
    <div class="top mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <select class="custom-select bg-dark text-white">
                    <option selected>Kategori</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            
            <div class="">
                <nav class="navbar">
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0  border-dark text-dark" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </form>
                  </nav>
            </div>
        </div>
    </div>
    <table class="table">
        <!-- header -->
        <div class="row bg-dark p-2 text-white font-weight-bold mb-2">
            <div class="col-2">
                ID Stok
            </div>
            <div class="col-3">
                Nama Produk
            </div>
            <div class="col-2">
                ID Produk
            </div>
            <div class="col-2">
                Kategori
            </div>
            <div class="col-1">
                Qty
            </div>
            <div class="col-2 text-center">
                Total
            </div>
        </div>
        <!-- isi -->
        <div class="row p-2">
            <div class="col-2">
                TR001
            </div>
            <div class="col-3">
                Celana jeans warna hitam
            </div>
            <div class="col-2">
                ST001
            </div>
            <div class="col-2">
               Celana
            </div>
            <div class="col-1">
                5
            </div>
            <div class="col-2 text-center">
                200.000
            </div>
        </div>
        <div class="row p-2">
            <div class="col-2">
                TR001
            </div>
            <div class="col-3">
                Celana jeans warna hitam
            </div>
            <div class="col-2">
                IT001
            </div>
            <div class="col-2">
               Celana
            </div>
            <div class="col-1">
                5
            </div>
            <div class="col-2 text-center">
                200.000
            </div>
        </div>
        <div class="row p-2">
            <div class="col-2">
                TR001
            </div>
            <div class="col-3">
                Celana jeans warna hitam
            </div>
            <div class="col-2">
                IT001
            </div>
            <div class="col-2">
               Celana
            </div>
            <div class="col-1">
                5
            </div>
            <div class="col-2 text-center">
                200.000
            </div>
        </div>
        <div class="row p-2">
            <div class="col-2">
                TR001
            </div>
            <div class="col-3">
                
            </div>
            <div class="col-2">
                
            </div>
            <div class="col-2">
               
            </div>
            <div class="col-1">
                15
            </div>
            <div class="col-2 text-center">
                600.000
            </div>
        </div>
        <hr class="text-secondary">
      </table>
</div>
@endsection

