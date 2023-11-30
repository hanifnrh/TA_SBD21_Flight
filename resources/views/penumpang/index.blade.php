@extends('penumpang.layout')

@section('content')

<h4 class="mt-5">All Data</h4>

<a href="{{ route('penumpang.create') }}" type="button" class="btn btn-success rounded-3">Add Data</a>
<a href="{{ route('penumpang.ascending') }}" type="button" class="btn btn-secondary rounded-3">Ascending</a>
<a href="{{ route('penumpang.descending') }}" type="button" class="btn btn-secondary rounded-3">Descending</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>Nama Penumpang</th>
            <!-- <th>ID Penumpang</th> -->
            <th>Nomor Telepon</th>
            <th>Alamat</th>
            <th>Nomor Kursi</th>
            <th>Tanggal</th>
            <th>Harga Tiket</th>
            <th>Nama Maskapai</th>
            <th>Kode IATA</th>
        </tr>
    </thead>
    
    <div class="mt-3">
    <form method="GET" action="{{ route('penumpang.search') }}">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search passenger">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
    </div>


    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->nama_penumpang }}</td>
            <td>{{ $data->nomor_telepon }}</td>
            <td>{{ $data->alamat_penumpang }}</td>
            <td>{{ $data->nomor_kursi }}</td>
            <td>{{ $data->tanggal_pemesanan }}</td>
            <td>{{ $data->harga_tiket }}</td>
            <td>{{ $data->nama_maskapai }}</td>
            <td>{{ $data->kode_IATA }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop