@extends('penumpang.layout')

@section('content')

<h4 class="mt-5">Passenger Data</h4>

<a href="{{ route('admin.createpassenger') }}" type="button" class="btn btn-success rounded-3">Add Data</a>
<a href="{{ route('admin.ascendingpassenger') }}" type="button" class="btn btn-secondary rounded-3">Ascending</a>
<a href="{{ route('admin.descendingpassenger') }}" type="button" class="btn btn-secondary rounded-3">Descending</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID penumpang</th>
            <th>Nama penumpang</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
        </tr>
    </thead>

    <div class="mt-3">
        <form method="GET" action="{{ route('admin.searchpassenger') }}">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search penumpang">
                <button type="submit" class="btn btn-secondary">Search</button>
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
                <a href="{{ route('admin.editpassenger', $data->id_penumpang) }}" type="button" class="btn btn-secondary rounded-3">Update</a>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_penumpang }}">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_penumpang }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Confirm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.delete', $data->id_penumpang) }}">
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
                </div>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop