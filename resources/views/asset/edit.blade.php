@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Asset</h1>
    <form action="{{ route('asset.update', $asset->id) }}" method="POST" enctype="multipart/form-data">
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
            <label for="nama_aset">Nama Aset:</label>
            <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="{{ $asset->nama_aset }}" required>
        </div>

        <div class="form-group">
            <label for="wilayah">Wilayah:</label>
            <input type="text" class="form-control" id="wilayah" name="wilayah" value="{{ $asset->wilayah }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $asset->alamat }}" required>
        </div>
        
        @if($asset->foto_aset)
        <div class="form-group">
            <label>Foto Saat Ini:</label> <br>
            <img src="{{ asset($asset->foto_aset) }}" alt="Current Photo" class="img-fluid" style="max-width: 300px; max-height: 300px;">
        </div>
        @endif

        <div class="form-group">
            <label for="photo">Ubah Foto?</label>
            <input type="file" class="form-control-file" id="photo" name="photo" value="{{ $asset->foto_aset}}">
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
            <label for="deskripsi_aset"> Deskripsi Aset</label>
            <input type="text" class="form-control" id="deskripsi_aset" name="deskripsi_aset" value="{{ $asset->deskripsi_aset}}">
        </div>
        
        <div class="form-group">
            <label for="pengeluaran">Pengeluaran:</label>
            <input type="number" class="form-control" id="pengeluaran" name="pengeluaran" value="{{ $asset->pengeluaran }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary ml-2" onclick="window.location.href='{{ route('asset.edited', $asset->id) }}'">Batal</button>

    </form>
</div>
@endsection
