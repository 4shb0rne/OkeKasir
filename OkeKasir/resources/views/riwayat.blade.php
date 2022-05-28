@extends('layouts.master')

@section('nav-riwayat')
active
@endsection

@section('content')
<div class="containers">
    <div class="d-flex justify-content-center align-items-center flex-column" style="height: 80vh;" >
        <a href="/penjualan" class="btn btn-dark btn-lg active m-4 text-white" role="button" aria-pressed="true" style="font-size: 60px;">Riwayat Penjualan</a>
        <a href="/stok" class="btn btn-dark btn-lg active m-4 text-white" role="button" aria-pressed="true" style="font-size: 60px;">Riwayat Stok</a>
    </div>
    
</div>
@endsection

