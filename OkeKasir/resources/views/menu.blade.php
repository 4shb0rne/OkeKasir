@extends('layouts.master')

@section('nav-menu')
active
@endsection

@section('content')
<div class="containers">
    <div class="top mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <select class="custom-select bg-dark text-white" name="category" id="category">
                    <option selected>Kategori</option>
                    @foreach($itemcategories as $itemcategory)
                        <option value="{{ $itemcategory->id }}">{{ $itemcategory->itemcategoryname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <nav class="navbar">
                    <form class="form-inline" action="/searchitem" method="POST">
                        @csrf
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                      <button class="btn btn-outline-success my-2 my-sm-0 border-dark text-dark" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </form>
                  </nav>
            </div>
            <div class="d-flex align-items-center flex justify-content-end">
                <a href="/editkategori" class="text-muted"><button type="button" class="btn btn-warning text-white me-3">EDIT KATEGORI</button></a>
                <a href="/addkategori" class="text-muted"><button type="button" class="btn btn-primary me-3">ADD KATEGORI</button></a>
                <a href="/addmenu" class="text-muted"><button type="button" class="btn btn-success">ADD MENU</button></a>
            </div>
        </div>
    </div>
    <table class="table" id="menutable">
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
        @foreach($items as $item)
        <div class="row p-2 item-row">
            <div class="col-1">
                <img src="{{ asset('storage/Assets/'.$item->itempicture) }}" alt="" width="50px">
            </div>
            <div class="col-2">
                {{ $item->itemname }}
            </div>
            <div class="col-2">
                IT{{ $item->id }}
            </div>
            <div class="col-2">
               {{ $item->item_categories->itemcategoryname }}
            </div>
            <div class="col-1">
                {{ $item->brutoprice }}
            </div>
            <div class="col-2 text-center">
                {{ $item->itemquantity }}
            </div>
            <div class="col-2 text-center">
                <form action="{{url('deleteitem/'.$item->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <a href="{{url('edititem/'.$item->id)}}" class="text-muted"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button></a>
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
        </div>
        <hr class="text-secondary table-hr">
        @endforeach
      </table>
</div>
@endsection

