@extends('admin.layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Add penumpang</h5>
        <form method="post" action="{{route('admin.store')}}">
            @csrf
            <!-- <div class="mb-3">
                <label for="id_tiket" class="form-label">ID Tiket</label>
                <input type="text" class="form-control" id="id_tiket" name="id_tiket">
            </div> -->
            <div class="mb-3">
                <label for="nama_penumpang" class="form-label">Nama penumpang</label>
                <input type="text" class="form-control" id="nama_penumpang" name="nama_penumpang">
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon">
            </div>
            <div class="mb-3">
                <label for="alamat_penumpang" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat_penumpang" name="alamat_penumpang">
            </div>
            <div class="mb-3">
                <label for="nomor_kursi" class="form-label">Nomor Kursi</label>
                <input type="text" class="form-control" id="nomor_kursi" name="nomor_kursi">
            </div>
            <div class="mb-3">
                <label for="tanggal_pemesanan" class="form-label">Tanggal Pemesanan</label>
                <input type="text" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan">
            </div>
            <div class="mb-3">
                <label for="id_tiket" class="form-label">Nama Maskapai</label>
                <select class="form-control" id="id_tiket" name="id_tiket">
                    @foreach ($datas as $data)
                    <!-- <option value="{{ $data->id_maskapai }}">{{ $data->nama_maskapai }}</option> -->
                    @endforeach
                    <option value = "1">Lion Air</option>
                    <option value = "2">Garuda Indonesia</option>
                    <option value = "3">Ryan Air</option>
                    <option value = "4">Citylink</option>>
                    <option value = "5">Sriwijaya Air</option>>
                    
                </select>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div>
@stop