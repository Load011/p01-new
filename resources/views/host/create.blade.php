@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Tambah Penyewa</h1>
    <form action="{{ route('host.store') }}" method="POST">
        @csrf
        {{-- <div class="form-group">
            <label for="asset_id">Select Asset:</label>
            <select class="form-control" id="asset_id" name="asset_id">
                <option value="">Select Asset</option>
                @foreach ($assets as $asset)
                    <option value="{{ $asset->id }}">{{ $asset->nama_aset }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="form-group">
            <label for="nama_penyewa">Nama Penyewa:</label>
            <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
