@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8">
    <h1>Asset Details</h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Penyewa</th>
                    <th>No. KTP</th>
                    <th>No. Telepon</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Wilayah</th>
                    <th>Nama Aset</th>
                    <th>Jenis Aset</th>
                    <th>Kode Aset</th>
                    <th>Alamat</th>
                    <th>Total Pendapatan Sewa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $asset->id }}</td>
                    <td>
                        @if ($asset->tuanRumah)
                            {{ $asset->tuanRumah->nama_penyewa }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($asset->tuanRumah)
                            {{ $asset->tuanRumah->no_ktp }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($asset->tuanRumah)
                            {{ $asset->tuanRumah->no_tlp }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($asset->tuanRumah)
                            {{ $asset->tuanRumah->tgl_awal }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if ($asset->tuanRumah)
                            {{ $asset->tuanRumah->tgl_akhir }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $asset->wilayah }}</td>
                    <td>{{ $asset->nama_aset }}</td>
                    <td>{{ $asset->jenis_aset }}</td>
                    <td>{{ $asset->kode_aset }}</td>
                    <td>{{ $asset->alamat }}</td>
                    <td>
                        @if ($asset->tuanRumah)
                            {{ $asset->tuanRumah->upah_jasa + $asset->tuanRumah->harga_sewa }}
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
</div>
@endsection

@push('styles')
<style>
    .table-responsive {
        overflow-x: auto;
    }
</style>
@endpush
