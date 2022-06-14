@extends('layouts.master')

@section('nav-riwayat')
active
@endsection

@section('content')
<div class="containers">
    <div class="top mb-4">
        <div class="d-flex justify-content-center">
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
        </div>
    </div>
    <table class="table">
        <!-- header -->
        <div class="row bg-dark p-2 text-white font-weight-bold mb-2">
            <div class="col-2">
                Date
            </div>
            <div class="col-2">
                ID Transaksi
            </div>
            <div class="col-2">
                Customer Name
            </div>
            <div class="col-3">
                Nama Produk
            </div>
            <div class="col-1">
                Qty
            </div>
            <div class="col-2 text-center">
                Total
            </div>
        </div>
        <!-- isi -->
        @foreach ($transactions as $transaction)
            <?php $count = 0; $qty = 0; $flag = 0?>
            @foreach ($items as $item)
                @if ($transaction->id == $item->transaction_id)
                <div class="row p-2">
                    @if ($flag == 0)
                    <div class="col-2">
                        {{ \Carbon\Carbon::parse($transaction['updated_at'])->format('j F Y') }}
                    </div>
                    <div class="col-2">
                        TR{{ $transaction->id }}
                    </div>
                    <div class="col-2">
                        {{ $transaction->customername }}
                    </div>
                    <?php $flag = 1?>
                    @else
                    <div class="col-2">
                    </div>
                    <div class="col-2">   
                    </div>
                    <div class="col-2">   
                    </div>
                    @endif
                    
                    
                    <div class="col-3">
                        {{ $item->item->itemname }}
                    </div>
                    <div class="col-1">
                        {{ $item->transactionquantity}}
                    </div>
                    <div class="col-2 text-center">
                        {{ $item->transactionquantity * $item->item->brutoprice}}
                    </div>
                    <?php $count = $count + ($item->transactionquantity * $item->item->brutoprice);
                    $qty = $qty + $item->transactionquantity; ?>
                </div>
                @endif
            @endforeach
            <div class="row p-2">
                <div class="col-2">
                </div>
                <div class="col-2">
                    
                </div>
                <div class="col-2">
                    
                </div>
                <div class="col-3">
                   
                </div>
                <div class="col-1">
                    {{$qty}}
                </div>
                <div class="col-2 text-center">
                   <b>{{$count}}</b> 
                </div>
            </div> 
            <hr class="text-secondary">
        @endforeach
    </table>
</div>
@endsection

