@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Asset</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Asset Photo -->
                            <div class="col-md-4 border">
                                <div class="asset-photo-box" style="width: 100%; height: auto;">
                                    <img src="{{ asset($asset->foto_aset) }}" alt="Photo of Asset" style="max-width: 100%; max-height: 100%;">
                                </div>
                            </div> 
                            <!-- Asset Details -->
                            <div class="col-md-8">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h2>Asset Details</h2>
                                    <a href="{{ route('asset.edit', $asset) }}" class="btn btn-primary">Edit Aset</a>
                                </div>
                                <table class="table">
                                    <tr>
                                        <th>Nama Aset</th>
                                        <td>{{ $asset->nama_aset }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $asset->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Aset</th>
                                        <td>{{ $asset->jenis_aset }}</td>
                                    </tr>
                                    <tr>
                                        <th>Wilayah Aset</th>
                                        <td>{{ $asset->wilayah }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pengeluaran Aset</th>
                                        <td>{{ $asset->pengeluaran}}</td>
                                    </tr>
                                </table>
                            </div>
                            {{-- <div class="col-md-3">
                                <button class="btn btn-secondary mt-2" id="edit-photo-btn">Edit Photo</button>
                            </div> --}}
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <h2>Deskripsi</h2>
                            <div class="card">
                                <div class="card-body">
                                    {{ $asset->deskripsi_aset }}
                                </div>
                            </div>
                        </div>

                        <!-- Tenant Details -->
                        <div class="mt-4">
                            <h2>Detail Penghuni</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Penyewa</th>
                                        <th>No. KTP</th>
                                        <th>No. Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $asset->tuanRumah ? $asset->tuanRumah->nama_penyewa : '-' }}</td>
                                        <td>{{ $asset->tuanRumah ? $asset->tuanRumah->no_ktp : '-' }}</td>
                                        <td>{{ $asset->tuanRumah ? $asset->tuanRumah->no_tlp : '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- <button class="btn btn-secondary mt-2" id="edit-tenant-btn">Edit Tenant Info</button> --}}
                            @if($asset->host_id)
                                <form action="{{ route('host.edit', $asset->tuanRumah->id) }}" method="GET">
                                    <button type="submit" class="btn btn-secondary">Edit Host</button>
                                </form>
                            @endif
                        </div>
                        <!-- Back Button -->
                        <a href="{{ route('asset.index')}}" class="btn btn-primary mt-4">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script>
    function redirectToEditPage(assetId) {
        window.location.href = `/assets/${assetId}/edit`;
    }
</script>
