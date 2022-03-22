@extends('layouts.master')

@section('nav-menu')
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
                      <button class="btn btn-outline-success my-2 my-sm-0 border-dark text-dark" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </form>
                  </nav>
            </div>
            <div class="d-flex align-items-center flex justify-content-end">
                <a href="/editkategori" class="text-muted"><button type="button" class="btn btn-warning me-3">EDIT KATEGORI</button></a>
                <a href="/addkategori" class="text-muted"><button type="button" class="btn btn-primary me-3">ADD KATEGORI</button></a>
                <a href="/addmenu" class="text-muted"><button type="button" class="btn btn-success">ADD MENU</button></a>
            </div>
        </div>
    </div>
    <table class="table">
        <!-- header -->
        <div class="row bg-dark p-2 text-white font-weight-bold mb-2">
            <div class="col-1">
                Photo
            </div>
            <div class="col-2">
                Nama Produk
            </div>
            <div class="col-2">
                ID Produk
            </div>
            <div class="col-2">
                Kategori
            </div>
            <div class="col-1">
                Harga
            </div>
            <div class="col-2 text-center">
                Sisa Qty
            </div>
            <div class="col-2 text-center">
                Action
            </div>
        </div>
        <!-- isi -->
        <div class="row p-2">
            <div class="col-1">
                <img src="assets/profile_picture.jpeg" alt="" width="50px">
            </div>
            <div class="col-2">
                felicia sania
            </div>
            <div class="col-2">
                IT001
            </div>
            <div class="col-2">
               Celana Panjang
            </div>
            <div class="col-1">
                1.000.000
            </div>
            <div class="col-2 text-center">
                100
            </div>
            <div class="col-2 text-center">
                <a href="/editmenu" class="text-muted"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button></a>
                <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
            </div>
        </div>
        <hr class="text-secondary">
      </table>
</div>
@endsection

