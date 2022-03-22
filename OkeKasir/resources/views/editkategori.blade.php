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
        <div class="row p-2 text-center">
            <div class="col-6">
                Celana
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-danger btn-sm "><i class="fas fa-trash-alt"></i></button>
            </div>
        </div>
        <hr class="text-secondary">
      </table>
</div>
@endsection

