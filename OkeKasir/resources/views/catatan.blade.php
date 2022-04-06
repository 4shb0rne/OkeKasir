@extends('layouts.master')

@section('nav-catatan')
active
@endsection

@section('content')
<div class="containers">
    <div class="top mb-4">
        <h1 class="text-center font-weight-bold">CATATAN</h1>
        <div class="d-flex align-items-center flex justify-content-end">
            <a href="/addcatatan" class="text-muted"><button type="button" class="btn btn-success">ADD +</button></a>
        </div>
        
    </div>
    <table class="table">
        <!-- header -->
        <div class="row bg-dark p-2 text-white font-weight-bold mb-2">
            <div class="col-2">
                Judul Catatan
            </div>
            <div class="col-3">
                Keterangan
            </div>
            <div class="col-2">
                Tanggal
            </div>
            <div class="col-2">
                Staff
            </div>
            <div class="col-2">
                Status
            </div>
        </div>
        <!-- isi -->
        @foreach ($notes as $note)
        <div class="row p-2">
            <div class="col-2">
                {{$note->scheduleTitle}}
            </div>
            <div class="col-3">
                {{$note->scheduledescription}}
            </div>
            <div class="col-2">
                {{$note->scheduledate}}
            </div>
            <div class="col-2">
                {{$note->staffname}}
            </div>
            <div class="col-2 font-weight-bold">
                {{$note->schedulestatus}}
            </div>
            <div class="col-1 text-center d-flex">
                <a href="{{url('editcatatan/'.$note->id)}}" class="text-muted"><button type="button" class="btn btn-primary btn-sm me-2"><i class="fas fa-pencil-alt"></i></button></a>
                <form action="{{url('deleteschedule/'.$note->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
        </div>
        <hr class="text-secondary">
        @endforeach
      </table>
</div>
@endsection

