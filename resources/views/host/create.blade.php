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
            <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" value="{{ old('nama_penyewa') }}">
        </div>
        <div class="form-group">
            <label for="no_ktp">No KTP:</label>
            <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{ old('no_ktp') }}">
        </div>
        <div class="form-group">
            <label for="no_tlp">Nomor Telepon:</label>
            <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="{{ old('no_tlp') }}">
        </div>
        <div class="form-group">
            <label for="tgl_awal">Tanggal Awal Masuk:</label>
            <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="{{ old('tgl_awal') }}">
        </div>
        <div class="form-group">
            <label for="tgl_akhir">Tanggal Akhir:</label>
            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="{{ old('tgl_akhir') }}">
        </div>
        <div class="form-group">
            <label for="upah_jasa">Upah Jasa:</label>
            <input type="number" class="form-control" id="upah_jasa" name="upah_jasa" value="{{ old('upah_jasa') }}">
        </div>
        <div class="form-group">
            <label for="harga_sewa">Harga Sewa:</label>
            <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" value="{{ old('harga_sewa') }}">
        </div>
        <div class="form-group">
            <label for="bank_pembayaran">Nama Bank Pembayaran:</label>
            <input type="text" class="form-control" id="bank_pembayaran" name="bank_pembayaran" value="{{ old('bank_pembayaran') }}">
        </div>
        <div class="form-group">
            <label for="jumlah_pembayaran">Jumlah Pembayaran:</label>
            <input type="number" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran" value="{{ old('jumlah_pembayaran') }}">
        </div>
        <div class="form-group">
            <label for="saldo_piutang">Status Saldo Piutang:</label>
            <select class="form-control" id="saldo_piutang" name="saldo_piutang">
                <option value="0" {{ old('saldo_piutang') == '0' ? 'selected' : '' }}>Tidak Lunas</option>
                <option value="1" {{ old('saldo_piutang') == '1' ? 'selected' : '' }}>Lunas</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="status_pengontrak">Status Pengontrak:</label>
            <select class="form-control" id="status_pengontrak" name="status_pengontrak">
                <option value="0" {{ old('status_pengontrak') == '0' ? 'selected' : '' }}>Perorangan</option>
                <option value="1" {{ old('status_pengontrak') == '1' ? 'selected' : '' }}>Complimet</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status_aktif">Status Aktif:</label>
            <select class="form-control" id="status_aktif" name="status_aktif">
                <option value="0" {{ old('status_aktif') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                <option value="1" {{ old('status_aktif') == '1' ? 'selected' : '' }}>Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
