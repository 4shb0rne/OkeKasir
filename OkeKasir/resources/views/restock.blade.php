@extends('layouts.master')

@section('nav-restock')
active
@endsection

@section('content')
<div class="containers">
    <h1 class="text-center font-weight-bold">TAMBAH STOK</h1>
    <form action="/addbillrestock" method="POST" class="mt-5 mb-5">
        @csrf
    <div class="form-group row ">
        <label for="staffname" class="col-sm-2 col-form-label">Staff Name</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="staffname" placeholder="staff name" name="staffname">
        </div>
        <button type="submit" class="btn btn-success btn-sm col-sm-1 col-form-label"><i class="fas fa-check"></i></button>
    </div>
    </form>

    <table class="table">
        <!-- header -->
        <div class="row bg-dark p-2 text-white font-weight-bold mb-2">
            <div class="col-2 text-center">
                ID
            </div>
            <div class="col-5 text-center"">
                Staff Name
            </div>
            <div class="col-5 text-center">
                Action
            </div>
        </div>
        <!-- isi -->
        @foreach($restocks as $restock)
        <div class="row p-2">
            <div class="col-2 text-center"">
                RS{{$restock->id}}
            </div>
            <div class="col-5 text-center"">
                {{$restock->staffname}}
            </div>
            <div class="col-5 text-center d-flex justify-content-center">
                    <a href="{{url('addbillrestock/'.$restock->id)}}" class="text-muted"><button type="button" class="btn btn-primary btn-sm me-2">
                    <i class="fas fa-pencil-alt"></i></button></a>
                {{-- <form action="{{url('deletetransaction/'.$transaction->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <a href="{{url('cart/'.$transaction->id)}}" class="text-muted"><button type="button" class="btn btn-primary btn-sm me-2"><i class="fas fa-pencil-alt"></i></button></a> --}}
                    {{-- <form action="{{url('deletetransaction/'.$transaction->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <a href="{{url('cart/'.$transaction->id)}}" class="text-muted"><button type="button" class="btn btn-primary btn-sm me-2"><i class="fas fa-pencil-alt"></i></button></a>
                        <button type="submit" class="btn btn-danger btn-sm me-2"><i class="fas fa-trash-alt"></i></button>
                    </form> --}}
                    <form action="{{url('deleterestock/'.$restock->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm me-2"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <form  action="{{url('saverestock/'.$restock->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                    </form>
                
            </div>
        </div>
        <hr class="text-secondary">
        @endforeach
  </table>
</div>
@endsection

