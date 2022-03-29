@extends('layouts.master')

@section('nav-riwayat')
active
@endsection

@section('content')
<div class="containers">
    <div class="d-flex justify-content-center align-items-center flex-column" style="height: 80vh;" >
        <a href="/penjualan" class="btn btn-primary btn-lg active m-4 bg-dark text-white" role="button" aria-pressed="true" style="font-size: 60px;">Laporan Penjualan</a>
        <a href="/stok" class="btn btn-primary btn-lg active m-4 bg-dark text-white" role="button" aria-pressed="true" style="font-size: 60px;">Laporan Stok</a>
    </div>
    
</div>
@endsection

