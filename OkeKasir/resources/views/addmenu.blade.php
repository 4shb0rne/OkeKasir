@extends('layouts.master')

@section('nav-menu')
active
@endsection

@section('content')
<div class="containers">
    <h1 class="text-center font-weight-bold">TAMBAH MENU</h1>
    <form method="post" action="/addmenu" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column my-3">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" placeholder="Masukkan nama produk" class="p-2 my-2">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi" class="p-2 my-2">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="netto">Harga Netto</label>
            <input type="number" name="netto" id="netto" placeholder="Masukkan harga bersih (beli)" class="p-2 my-2">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="bruto">Harga Bruto</label>
            <input type="number" name="bruto" id="bruto" placeholder="Masukkan harga kotor (jual)" class="p-2 my-2">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="bruto">Kategori</label>
            <select class="form-select" aria-label="Default select example" name="categoryid">
                <option selected>Pilih kategori</option>
                @foreach($itemcategories as $itemcategory)
                    <option value="{{ $itemcategory->id }}">{{ $itemcategory->itemcategoryname }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex flex-column my-3">
            <label for="Qty">Qty</label>
            <input type="number" name="qty" id="Qty" placeholder="Masukkan stok barang" class="p-2 my-2" value="0">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="image" class="my-2 mt-3">Upload Gambar</label>
            <input type="file" name="image" id="image" class="my-2" onchange="loadFile(event)">
            <img src="" alt="Your Image" id="uploadImage">
        </div>
        <button type="submit" class="btn btn-dark px-3 py-1 my-3">Submit</button>
    </form>
</div>
<script>
    function loadFile(event){
        let output = document.querySelector('#uploadImage')
        output.src = URL.createObjectURL(event.target.files[0])
    }
</script>
@endsection

