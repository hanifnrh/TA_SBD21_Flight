@extends('admin.layout')

@section('content')

<h4 class="mt-5">Flight Data</h4>

<a href="{{ route('admin.index') }}" type="button" class="btn btn-success rounded-3">All Data</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Penerbangan</th>
            <th>Jadwal Penerbangan</th>
        </tr>
    </thead>
    
    <div class="mt-3">
    <form method="GET" action="{{ route('admin.searchflight') }}">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search ID penerbangan">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    </div>


    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_penerbangan }}</td>
            <td>{{ $data->jadwal_penerbangan }}</td>
            <td>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop