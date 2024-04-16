@extends('layouts.app')
@section('content')
<div class="container mt-8">
    <h1>Asset Details</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Penyewa</th>
                    <th>Wilayah</th>
                    <th>Nama Aset</th>
                    <th>Jenis Aset</th>
                    <th>Kode Aset</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        {{ $asset->id}}
                    </td>
                    <td>
                        @if ($asset->tuanRumah)
                            {{ $asset->tuanRumah->nama_penyewa }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $asset->wilayah }}</td>
                    <td>{{ $asset->nama_aset }}</td>
                    <td>{{ $asset->jenis_aset }}</td>
                    <td>{{ $asset->kode_aset }}</td>
                    <td>{{ $asset->alamat }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
</div>
@endsection
