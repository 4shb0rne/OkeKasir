@extends('layouts.master')

@section('nav-restock')
active
@endsection

@section('content')
<div class="containers">
    <h1 class="text-center font-weight-bold">TAMBAH STOK</h1>
    <form method="post" >
        <div class="d-flex flex-column my-3">
            <label for="id_produk">ID</label>
            <input type="text" name="id_produk" id="id_produk" placeholder="Masukkan ID produk" class="p-2 my-2">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="nama_menu">Nama Produk</label>
            <input type="text" name="nama_menu" id="nama_menu" placeholder="Masukkan nama menu" class="p-2 my-2" value="Nama produk dari id">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="Qty">Qty</label>
            <input type="number" name="Qty" id="Qty" placeholder="Masukkan stok barang" class="p-2 my-2" value="0">
        </div>
        <button class="btn btn-dark px-3 py-1 my-3">Add</button>
    </form>
    <table class="table">
        <!-- header -->
        <div class="row bg-dark p-2 text-white font-weight-bold my-2">
            <div class="col-4">
                Nama Produk
            </div>
            <div class="col-2">
                ID Produk
            </div>
            <div class="col-3">
               Kategori
            </div>
            <div class="col-2">
                Qty
            </div>
            <div class="col-1">
                Action
            </div>
        </div>
        <!-- isi -->
        <div class="row p-2">
            <div class="col-4">
                Celana jeans warna hitam
            </div>
            <div class="col-2">
                IT001
            </div>
            <div class="col-3">
               Celana
            </div>
            <div class="col-2">
                5
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
            </div>
        </div>
        <hr class="text-secondary">
      </table>
      <div class=" d-flex justify-content-center">
        <button class="btn btn-dark px-3 py-1 my-3">Submit</button>
      </div>
      
</div>
@endsection

