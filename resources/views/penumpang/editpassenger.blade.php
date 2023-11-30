@extends('penumpang.layout')

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

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Change Data</h5>
        <form method="post" action="{{ route('penumpang.updatepassenger', $data->id_penumpang) }}">
            @csrf
            <div class="mb-3">
                <label for="nama_penumpang" class="form-label">Nama Penumpang</label>
                <input type="text" class="form-control" id="nama_penumpang" name="nama_penumpang"
                    value="{{ $data->nama_penumpang }}">
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                    value="{{ $data->nomor_telepon }}">
            </div>
            <div class="mb-3">
                <label for="alamat_penumpang" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat_penumpang" name="alamat_penumpang"
                    value="{{ $data->alamat_penumpang }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Change" />
            </div>
        </form>
    </div>
</div>
@stop