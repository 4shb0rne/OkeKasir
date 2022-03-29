@extends('layouts.master')

@section('nav-menu')
active
@endsection

@section('content')
<div class="containers">
    <table class="table">
        <!-- header -->
        <div class="row bg-dark p-2 text-white font-weight-bold mb-2 text-center">
            <div class="col-6">
                Nama Kategori
            </div>
            <div class="col-6">
                Action
            </div>
        </div>
        <!-- isi -->
        @foreach($itemcategories as $itemcategory)
        <div class="row p-2 text-center">
            <div class="col-6">
                {{ $itemcategory->itemcategoryname }}
            </div>
            <div class="col-6">
                <form action="{{url('deleteitemcategory/'.$itemcategory->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm "><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
            
        </div>
        <hr class="text-secondary">
        @endforeach
      </table>
</div>
@endsection

