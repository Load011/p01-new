@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="col">
      <h1 class=" text-dark">Detail Aset</h1>
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
              <div class="col-md-3">
                <div class="asset-photo-box" style="width: 100%; height: auto;">
                  <img src="{{ asset($asset->foto_aset) }}" alt="Photo of Asset" style="max-width: 100%; max-height: 100%;">
                </div>
              </div>

              <div class="col-md-9">
                <h2>Detail Aset</h2>
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
                </table>
              </div>
            </div>

            <div class="mt-4">
              <h2>Deskripsi</h2>
              <div class="card">
                <div class="card-body">
                  {{ $asset->deskripsi_aset }}
                </div>
              </div>
            </div>

            <div class="mt-4">
              <h2>Penghuni Saat Ini</h2>
              <table class="table">
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
            </div>
            <br>

            @if ($asset->previousOwners->count())
              <h2>Penghuni Aset Sebelumnya</h2>
              <table class="table">
                <thead>
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
            @endif

            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
