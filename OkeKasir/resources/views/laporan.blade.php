@extends('layouts.master')

@section('nav-laporan')
active
@endsection

@section('content')
<div class="containers">
    <div class="top mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                {{-- <select class="custom-select bg-dark text-white">
                    <option selected>Kategori</option>
                    <option value="1">Hari</option>
                    <option value="2">Bulan</option>
                    <option value="3">Tahun</option>
                </select> --}}
            </div>
            <div class="">
                <nav class="navbar">
                    <form class="form-inline">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0 border-dark text-dark" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </form>
                  </nav>
            </div>
        </div>
    </div>
    <table class="table">
        <!-- header -->
        <div class="row bg-dark p-2 text-white font-weight-bold text-center mb-2">
            <div class="col-2 text-left">
                Tahun
            </div>
            <div class="col-3">
                Penjualan Kotor
            </div>
            <div class="col-4">
                Harga Pokok
            </div>
            <div class="col-3">
                Penjualan Bersih
            </div>
        </div>
        <!-- isi -->
        {{-- foreach per tahun --}}
        <?php $sumKotor = 0; $sumBersih = 0; $flag = 0?>
        @foreach ($transactions as $transaction)
            @foreach ($items as $item)
            {{-- <div class="row p-2 text-center">
                <div class="col-2 text-left"> --}}
                    {{-- {{ \Carbon\Carbon::parse($transaction['updated_at'])->year }} --}}
                {{-- </div>
                <div class="col-3"> --}}
                    <?php $sumKotor = $sumKotor + $item->item->brutoprice; ?>
                {{-- </div>
                <div class="col-4">
                    
                </div>
                <div class="col-3"> --}}
                    <?php $sumBersih = $sumBersih + $item->item->nettoprice; ?>
                {{-- </div>
            </div> --}}
            @endforeach
        @endforeach
        @foreach ( $transactions as $transaction )
            {{-- <?php if(isset($_GET['updated_at'])): ?> --}}
            <div class="row p-2 text-center">
                <div class="col-2 text-left">
                    {{ \Carbon\Carbon::parse($transaction['updated_at'])->year }}
                </div>
                <div class="col-3">
                    {{$sumKotor}}
                </div>
                <div class="col-4">
                    {{$sumBersih}}
                </div>
                <div class="col-3">
                    {{$sumKotor-$sumBersih}}
                </div>
            </div>
            <hr class="text-secondary">
        {{-- <?php endif; ?> --}}
        @break
        @endforeach
        
      </table>
</div>
@endsection

