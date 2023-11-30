@extends('penumpang.layout')

@section('content')

<h4 class="mt-5">Airlines Data</h4>

<a href="{{ route('penumpang.index') }}" type="button" class="btn btn-success rounded-3">All Data</a>

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
    <form method="GET" action="{{ route('penumpang.searchairline') }}">
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
                <!-- <a href="{{ route('penumpang.edit', $data->id_maskapai) }}" type="button" class="btn btn-warning rounded-3">Update</a>



                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_maskapai }}">
                    Delete
                </button>

                <div class="modal fade" id="hapusModal{{ $data->id_maskapai }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('penumpang.delete', $data->id_maskapai) }}">
                                @csrf
                                <div class="modal-body">
                                    Are you sure you want do delete this data?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> -->


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop