@extends('layouts.master')

@section('nav-restock')
active
@endsection

@section('content')
<div class="containers">
    <h1 class="text-center font-weight-bold">TAMBAH STOK</h1>
    <form action="/addbillrestock" method="POST" class="mt-5">
        @csrf
    <div class="form-group row ">
        <label for="staffname" class="col-sm-2 col-form-label">Staff Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="staffname" placeholder="staff name" name="staffname">
        </div>
        <button type="submit" class="btn btn-success btn-sm col-sm-1 col-form-label"><i class="fas fa-check"></i></button>
    </div>
    </form>

      
</div>
@endsection

