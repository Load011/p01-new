@extends('layouts.app')

@section('content')
<div class="content-header">
  <h1>Detail Aset</h1>
</div>

<section class="content">
  <div class="container">
    <div class="card">
      <div class="card-body border">
        <div class="col-mt-12">
          <div class="row">
            <!-- Foto -->
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  @if ($asset->photos->isNotEmpty())
                    <img src="{{ asset('foto_aset/' . $asset->photos->first()->photo_path) }}" alt="Asset Photo" class="img-fluid main-photo" id="mainPhoto">
                  @else
                    <span>No photos available</span>
                  @endif
                </div>
              </div>
              <div class="row thumbnails">
                @forelse($asset->photos as $key => $photo)
                <div class="col-md-3 grid-item">
                  <img src="{{ asset('foto_aset/' . $photo->photo_path) }}" alt="Asset Photo" class="img-fluid thumbnail" data-key="{{ $key }}" onclick="changeMainPhoto(this)">
                </div>
                @empty
                 @endforelse
              </div>
            </div>
            <div class="col-md-8">
              <table class="table border">
                <!--- Bagian Utama --->
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
          </div>
        </div>
        <div class="col-mt-12">
          <div class="col-mt-4">
            <h3>Penghuni Saat ini</h3>
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
        </div>
        <div class="col-mt-12">
          <div class="mt-4">
            @if ($asset->previousOwners->count())
            <h3>Penghuni Aset Sebelumnya</h3>
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
                <a href="{{ route('host.create', $asset->id) }}" class="btn btn-primary">Tambah Penyewa</a>
              </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
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

    #mainPhoto {
    width: 300px;
    height: 200px;
    object-fit: cover;
  }
    .thumbnail {
    width: 100px;
    height: auto;
    object-fit: cover;
  }
</style>

<script>
  function changeMainPhoto(clickedPhoto) {
    // Get the clicked photo's data-key attribute (index)
    const selectedIndex = clickedPhoto.dataset.key;
  
    // Get references to the main photo and all thumbnails
    const mainPhoto = document.getElementById('mainPhoto');
    const thumbnails = document.querySelectorAll('.thumbnails img');
  
    // Update the main photo source and remove the "selected" class from all thumbnails
    mainPhoto.src = clickedPhoto.src;
    thumbnails.forEach(thumbnail => thumbnail.classList.remove('selected'));
  
    // Add the "selected" class to the clicked thumbnail
    clickedPhoto.classList.add('selected');
  }
  </script>