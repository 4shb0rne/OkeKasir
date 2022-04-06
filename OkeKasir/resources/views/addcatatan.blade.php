@extends('layouts.master')

@section('nav-catatan')
active
@endsection

@section('content')
<div class="containers">
    <h1 class="text-center font-weight-bold">ADD CATATAN</h1>
    <form method="POST" action="/addcatatan" enctype="multipart/form-data" >
        @csrf
        <div class="d-flex flex-column my-3">
            <label for="judul_catatan">Judul Catatan</label>
            <input type="text" name="scheduleTitle" id="judul_catatan" placeholder="Masukkan judul catatan" class="p-2 my-2">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="scheduledescription" id="keterangan" placeholder="Masukkan keterangan" class="p-2 my-2">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="scheduledate" id="tanggal" class="p-2 my-2">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="staff_bertugas">Staff</label>
            <input type="text" name="staffname" id="staff_bertugas" placeholder="Masukkan staff yang bertugas" class="p-2 my-2">
        </div>
        <div class="d-flex flex-column my-3">
            <label for="status">Status</label>
            <select class="form-select" aria-label="Default select example" name="schedulestatus">
                <option selected>Pilih status</option>
                <option value="Pengarahan">Pengarahan</option>
                <option value="Progress">Progress</option>
                <option value="Pengiriman">Pengiriman</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
        <button class="btn btn-dark px-3 py-1 my-3" type="submit">ADD</button>
    </form>
</div>

@endsection

