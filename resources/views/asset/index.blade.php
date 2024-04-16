@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h1>Manajemen Asset</h1>
    <a href="{{ route('asset.create') }}" class="btn btn-success mb-3">Tambah Asset</a>
    @if ($assets->isEmpty())
    <div class="alert alert-info">
        Tidak Ada Asset
    </div>
    @else
    <table class="table">
        <thead>
            <tr>
                {{-- <th>Nama Penyewa</th> --}}
                <th>Wilayah</th>
                <th>Nama Aset</th>
                <th>Jenis Aset</th>
                <th>Kode Aset</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assets as $asset)
            <tr>
                {{-- <td>
                    @if ($asset->tuanRumah)
                        {{ $asset->tuanRumah->nama_penyewa }}
                    @else
                        N/A
                    @endif
                </td> --}}
                <td>{{ $asset->wilayah }}</td>
                <td>{{ $asset->nama_aset }}</td>
                <td>{{ $asset->jenis_aset }}</td>
                <td>{{ $asset->kode_aset }}</td>
                <td>{{ $asset->alamat }}</td>
                <td>
                    <a href="{{ route('asset.edit', $asset->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form action="{{ route('asset.destroy', $asset->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
