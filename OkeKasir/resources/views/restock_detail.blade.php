@extends('layouts.master')

@section('nav-restock')
active
@endsection

@section('content')
<div class="containers">
    <h1 class="text-center font-weight-bold">TAMBAH STOK</h1>
    <form action="{{url('addrestock/'.$restocks->id)}}" method="POST">
        @csrf
        <div class="d-flex flex-column my-3">
            <label for="id_produk">ID</label>
            <input type="text" name="id_produk" id="id_produk" placeholder="Masukkan ID produk (hanya angka)" class="p-2 my-2">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="Qty">Qty</label>
            <input type="number" name="qty" id="Qty" placeholder="Masukkan stok barang" class="p-2 my-2" value="0">
        </div>
        <button class="btn btn-dark px-3 py-1 my-3" type="submit">ADD</button>
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
        @foreach ($items as $item)
        <div class="row p-2">
            <div class="col-4">
                {{$item->item->itemname}}
            </div>
            <div class="col-2">
                {{$item->itemid}}
            </div>
            <div class="col-3">
                {{ $item->item->item_categories->itemcategoryname }}
            </div>
            <div class="col-2">
                {{$item->restockquantity}}
            </div>
            
            <div class="col-1">
                <form action="{{url('deleterestockitem/'.$item->id.'/'.$item->restock_id )}}" method="POST">
                    @csrf
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
        </div>
        <hr class="text-secondary">
        @endforeach
        
      </table>
    
      <div class=" d-flex justify-content-center">
          {{-- submit ke riwayat --}}
        <form  action="{{url('saverestock/'.$restocks->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            <a href="/restock"><button class="btn btn-dark px-3 py-1 my-3" type="submit" >Submit</button></a>
        </form>
        
      </div>
   
      
</div>
@endsection

