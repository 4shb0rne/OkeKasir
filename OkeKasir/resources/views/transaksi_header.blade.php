@extends('layouts.master')

@section('nav-transaksi')
active
@endsection

@section('content')
<div class="containers">
    <div class="top mb-4">
        <div class="d-flex">
            <div class="d-flex align-center">
                <nav class="navbar">
                    <form class="form-inline">
                      <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0  border-dark text-dark" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                    </form>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="/cart" class="text-muted"><i class="fas fa-cart-arrow-down me-3 fa-2x text-dark"></i></a>
            </div>
        </div>
    </div>
    <table class="table">
            <!-- header -->
            <div class="row bg-dark p-2 text-white font-weight-bold mb-2">
                <div class="col-2">
                    Transaction ID
                </div>
                <div class="col-3">
                    Customer Name
                </div>
                <div class="col-3 text-center">
                    Staff Name
                </div>
                <div class="col-2">
                    Total Price
                </div>
                <div class="col-2 text-center">
                    Action
                </div>
            </div>
            <!-- isi -->
            @foreach($transactions as $transaction)
            <div class="row p-2">
                <div class="col-2">
                    TR{{ $transaction->id }}
                </div>
                <div class="col-3">
                    {{ $transaction->customername }}
                </div>
                <div class="col-3 text-center">
                    {{ $transaction->staffname }}
                </div>
                <div class="col-2">
                    <?php $sum = 0?>
                    @foreach ($items as $item)
                        @if ($transaction->id == $item->transaction_id)
                        <?php $sum = $sum + ($item->transactionquantity * $item->item->brutoprice);?>
                        @endif
                    @endforeach
                    {{$sum}}
                </div>
                <div class="col-2 text-center d-flex justify-content-center">
                    <form action="{{url('deletetransaction/'.$transaction->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <a href="{{url('cart/'.$transaction->id)}}" class="text-muted"><button type="button" class="btn btn-primary btn-sm me-2"><i class="fas fa-pencil-alt"></i></button></a>
                        <button type="submit" class="btn btn-danger btn-sm me-2"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <form action="{{url('addbill/'.$transaction->id)}}" enctype="multipart/form-data" method="POST">
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

