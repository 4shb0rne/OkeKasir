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
                <a href="" class="text-muted"><i class="fas fa-bookmark me-3 fa-2x text-dark"></i></a>
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
            <div class="row p-2">
                <div class="col-2">
                    TD001
                </div>
                <div class="col-3">
                    felicia sania
                </div>
                <div class="col-3 text-center">
                    Vablo
                </div>
                <div class="col-2">
                    300.000
                </div>
                <div class="col-2 text-center">
                    <a href="/edit"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button></a>
                    <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                </div>
            </div>
            <hr class="text-secondary">
            
            <!-- ISI KE DUA -->
            {{-- <div class="row p-2">
                <div class="col-2">
                    TD001
                </div>
                <div class="col-3">
                    Otto sania Otto sania Otto sania Otto sania Otto sania Otto sania
                </div>
                <div class="col-3 text-center">
                    Vablo
                </div>
                <div class="col-2">
                    500.000
                </div>
                <div class="col-2 text-center">
                    <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                </div>
            </div>
            <hr class="text-secondary"> --}}
      </table>
</div>
@endsection

