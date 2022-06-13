@extends('layouts.master')

@section('nav-transaksi')
active
@endsection

@section('content')
<div class="containers">
    <div class="top mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <select class="custom-select bg-dark text-white">
                    <option selected>Kategori</option>
                    @foreach($itemcategories as $itemcategory)
                        <option value="{{ $itemcategory->id }}">{{ $itemcategory->itemcategoryname }}</option>
                    @endforeach
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
            <form action="/addtransaksi" method="POST">
                @csrf
            <div class="d-flex align-items-center flex justify-content-end">
                <a href="/cart" class="text-muted"><i class="fas fa-cart-arrow-down me-3 fa-2x text-dark"></i></a>
                <a href="/addtransaksi"><button type="submit" class="btn btn-success">ADD</button></a>
            </div>
        </div>
    </div>
    <div class="">
        <div class="form-group row">
            <label for="staffname" class="col-sm-2 col-form-label">Staff Name</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="staffname" placeholder="staff name" name="staffname">
            </div>
            <label for="customername" class="col-sm-2 col-form-label">Customer Name</label>
                <div div class="col-sm-4">
            <input type="text" class="form-control" id="customername" placeholder="customer name" name="customername">
          </div>
        </div>
    </div>
    <table class="table">
        <!-- header -->
        <div class="row bg-dark p-2 text-white font-weight-bold mb-2">
            <div class="col-1">
                Photo
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
            <div class="col-2">
                Harga
            </div>
            <div class="col-2 text-center">
                Qty
            </div>
        </div>
        <!-- isi -->
        @foreach($items as $item)
        <div class="row p-2">
            <div class="col-1">
                <img src="{{asset('assets/'.$item->itempicture)}}" alt="" width="50px">
            </div>
            <div class="col-3">
                {{ $item->itemname }}
            </div>
            <div class="col-2">
                IT{{ $item->id }}
            </div>
            <div class="col-2">
                {{ $item->item_categories->itemcategoryname }}
            </div>
            <div class="col-2">
                {{ $item->brutoprice }}
            </div>
            <div class="col-2">
                <div class="input-group d-flex justify-content-around">
                    <input type="button" value="-" class="button-minus border rounded-circle icon-shape icon-sm bg-dark text-white" data-field="quantity">
                    <input type="hidden" value="{{ $item->id }}" name="itemid[]" id="item_id">
                    <input type="number" step="1" max="10" value="0" name="qty[]" class="quantity-field border-0 text-center w-25">
                    <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm bg-dark text-white" data-field="quantity">
                 </div>
            </div>
        </div>
        <hr class="text-secondary">
        @endforeach
      </table>
      </form>
      
</div>

@endsection

