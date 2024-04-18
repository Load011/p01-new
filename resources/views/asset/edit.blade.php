@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Asset</h1>
    <form action="{{ route('asset.update', $asset->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="host_id">Penyewa:</label>
            <select class="form-control" id="host_id" name="host_id">
                <option value="">No Host</option>
                @foreach ($hosts as $host)
                    <option value="{{ $host->id }}" {{ $host->id == $asset->host_id ? 'selected' : '' }}>{{ $host->nama_penyewa }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="wilayah">Wilayah:</label>
            <input type="text" class="form-control" id="wilayah" name="wilayah" value="{{ $asset->wilayah }}" required>
        </div>

        <div class="form-group">
            <label for="nama_aset">Nama Aset:</label>
            <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="{{ $asset->nama_aset }}" required>
        </div>

        <div class="form-group">
            <label for="jenis_aset">Jenis Aset:</label>
            <input type="text" class="form-control" id="jenis_aset" name="jenis_aset" value="{{ $asset->jenis_aset }}" required>
        </div>

        <div class="form-group">
            <label for="kode_aset">Kode Aset:</label>
            <input type="text" class="form-control" id="kode_aset" name="kode_aset" value="{{ $asset->kode_aset }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $asset->alamat }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
