@extends('penumpang.layout')

@section('content')

<h4 class="mt-5">All Data</h4>

<a href="{{ route('penumpang.create') }}" type="button" class="btn btn-success rounded-3">All Data</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Penumpang</th>
            <th>Nama Penumpang</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
        </tr>
    </thead>

    <div class="mt-3">
        <form method="GET" action="{{ route('penumpang.search') }}">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search penumpang">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>


    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_penumpang }}</td>
            <td>{{ $data->nama_penumpang }}</td>
            <td>{{ $data->nomor_telepon }}</td>
            <td>{{ $data->alamat_penumpang }}</td>
            <td>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop