@extends('layouts.master')

@section('nav-menu')
active
@endsection

@section('content')
<div class="containers">
    <h1 class="text-center font-weight-bold">TAMBAH KATEGORI</h1>
    <form method="post" action="/additemcategory" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column my-3">
            <label for="nama_kategori">Nama</label>
            <input type="text" name="nama_kategori" id="nama_kategori" placeholder="Masukkan nama kategori" class="p-2 my-2">
        </div>
        <button class="btn btn-dark px-3 py-1 my-3" type="submit">Submit</button>
    </form>
</div>
@endsection

