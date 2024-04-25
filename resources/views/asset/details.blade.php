@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="col">
    <h1 class="text-dark"> Detail Aset</h1>
  </div>
</div>

<section class="content">
  <div class="container">
    <div class="card">
      <div class="card-body border">
        <div class="row">
          <div class="col-md-4 border">
            <div class="asset-photo-box" style="width: 100%; height: auto;">
              <img src="{{ asset($asset->foto_aset) }}" alt="Photo of Asset" class="img-fluid">
            </div>
          </div>
          <div class="col-md-8">
            <table class="table border">
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
                <th>Deskripsi</th>
                <td>{{ $asset->deskripsi_aset}}</td>
              </tr>
              <tr>
                <th>Pengeluaran</th>
                <td>{{ $asset->pengeluaran}}</td>
              </tr>
            </table>
          </div>
          <!-- Bagian Penghuni -->
          <div class="mt-4">
            <h2>Penghuni Saat Ini</h2>
          </div>
          <table class="table border">
            <thead>
              <tr>
                <th>Nama Penyewa</th>
                <th>No. KTP</th>
                <th>No. Telepon</th>
                <th>Bank Pembayaran</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $asset->tuanRumah ? $asset->tuanRumah->nama_penyewa : '-' }}</td>
                <td>{{ $asset->tuanRumah ? $asset->tuanRumah->no_ktp : '-' }}</td>
                <td>{{ $asset->tuanRumah ? $asset->tuanRumah->no_tlp : '-' }}</td>
                <td>{{ $asset->tuanRumah ? $asset->tuanRumah->bank_pembayaran : '-' }}</td>
              </tr>
            </tbody>
          </table>
          
          <div class="mt-4">
            @if ($asset->previousOwners->count())
            <h2>Penghuni Aset Sebelumnya</h2>
            <div class="scrollable-box">
              <table class="table border">
                <thead class="sticky-header">
                  <tr>
                    <th>Nama Penyewa</th>
                    <th>No. KTP</th>
                    <th>No. Telepon</th>
                    <th>Upah Jasa</th>
                    <th>Harga Sewa</th>
                    <th>Bank Pembayaran</th>
                    <th>Jumlah Pembayaran Aset</th>
                    <th>Total Pendapatan Sewa</th>
                    <th>Status Pembayaran</th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach ($asset->previousOwners as $previousOwner)
                    <tr>
                      <td>{{ $previousOwner->nama_penyewa }}</td>
                      <td>{{ $previousOwner->no_ktp }}</td>
                      <td>{{ $previousOwner->no_tlp }}</td>
                      <td>{{ $previousOwner->upah_jasa }}</td>
                      <td>{{ $previousOwner->harga_sewa }}</td>
                      <td>{{ $previousOwner->bank_pembayaran }}</td>
                      <td>{{ $previousOwner->jumlah_pembayaran }}</td>
                      <td>{{ $previousOwner->upah_jasa + $previousOwner->harga_sewa }}</td>
                      <td>{{ $previousOwner->saldo_piutang == 0 ? 'Tidak Lunas' : 'Lunas' }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @endif
            @if (!$asset->tuanRumah)
              <div class="mt-4">
                <a href="{{ route('host.create') }}" class="btn btn-primary">Create Host</a>
              </div>
            @endif
            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4">Back</a>
          </div>
        </div> <!-- ./row -->
      </div>
    </div>
  </div> <!-- ./container -->
</section>

@endsection

<style>
  .scrollable-box {
    max-height: 200px; 
    overflow-y: auto;
    margin-bottom: 20px
  }

  .sticky-header {
    position: sticky;
    top: 0;
    background-color: #F5F5F5;
    z-index: 1;
  }
</style>
