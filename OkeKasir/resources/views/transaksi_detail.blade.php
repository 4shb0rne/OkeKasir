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
    <form action="{{url('updatetransaction/'.$items[0]->transaction_id)}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="d-flex align-items-center flex justify-content-end">
                <a href="/cart" class="text-muted"><i class="fas fa-cart-arrow-down me-3 fa-2x text-dark"></i></a>
                <a href="/updatetransaction"><button type="submit" class="btn btn-warning me-3">SAVE</button></a>
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
            <div class="col-1">
                Kategori
            </div>
            <div class="col-2  text-center">
                Harga
            </div>
            <div class="col-2 text-center">
                Qty
            </div>
            <div class="col-1">
                Action
            </div>
        </div>
        <!-- isi -->
        @foreach($items as $item)
        <div class="row p-2">
            <div class="col-1">
                <img src="{{asset('assets/profile_picture.jpeg')}}" alt="" width="50px">
            </div>
            <div class="col-3">
                {{ $item->item->itemname }}
            </div>
            <div class="col-2">
                {{ $item->item->id }}
            </div>
            <div class="col-1">
                {{ $item->item->item_categories->itemcategoryname }}
            </div>
            <div class="col-2 text-center">
                {{ $item->item->brutoprice }}
            </div>
            <div class="col-2">
                <div class="input-group d-flex justify-content-around">
                    <input type="hidden" value="{{ $item->item->id }}" name="itemid[]">
                    <input type="button" value="-" class="button-minus border rounded-circle icon-shape icon-sm bg-dark text-white" data-field="quantity">
                    <input type="number" step="1"  value="{{ $item->transactionquantity }}"name="qty[]" class="quantity-field border-0 w-25">
                    <input type="hidden" name="id[]" value="{{ $item->id }}">
                    <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm bg-dark text-white" data-field="quantity">
                 </div>
            </div>
        </form>
            <div class="col-1"> 
                <form action="{{url('deleteitem/'.$item->id.'/'.$item->transaction_id )}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
        </div>
        <hr class="text-secondary">
        @endforeach
    </table>
    
</div>
<script>
    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal)) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal > 0) {
            parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    $('.input-group').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.input-group').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });
</script>
@endsection

