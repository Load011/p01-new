@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Penyewa</h1>
    <form action="{{ route('host.update', $host->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_penyewa">Nama Penyewa: </label>
            <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection