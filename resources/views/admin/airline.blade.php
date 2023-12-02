@extends('admin.layout')

@section('content')

<h4 class="mt-5">Airlines Data</h4>

<a href="{{ route('admin.index') }}" type="button" class="btn btn-success rounded-3">All Data</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Maskapai</th>
            <th>Nama Maskapai</th>
            <th>Kode IATA</th>
        </tr>
    </thead>
    
    <div class="mt-3">
    <form method="GET" action="{{ route('admin.searchairline') }}">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search maskapai">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    </div>


    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_maskapai }}</td>
            <td>{{ $data->nama_maskapai }}</td>
            <td>{{ $data->kode_IATA }}</td>
            <td>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop