@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0 text-dark">Detail Asset</h1>
          </div>
      </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
      <div class="row">      
          <div class="col-lg-12 mt-4">
              <div class="card">
                  <div class="card-body">
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
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($asset->tuanRumah)
                                        {{ $asset->tuanRumah->no_ktp }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($asset->tuanRumah)
                                        {{ $asset->tuanRumah->no_tlp }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($asset->tuanRumah)
                                        {{ $asset->tuanRumah->tgl_awal }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($asset->tuanRumah)
                                        {{ $asset->tuanRumah->tgl_akhir }}
                                    @else
                                        -
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
                            @if ($asset->previousOwners->count())
                            <tr>
                                <td colspan="12"><strong>Penyewa Sebelumnya</strong></td>
                            </tr>
                            @foreach ($asset->previousOwners as $previousOwner)
                            <tr>
                                <td>{{ $previousOwner->id }}</td>
                                <td>{{ $previousOwner->nama_penyewa }}</td>
                                <td>{{ $previousOwner->no_ktp }}</td>
                                <td>{{ $previousOwner->no_tlp }}</td>
                                <td>{{ $previousOwner->tgl_awal }}</td>
                                <td>{{ $previousOwner->tgl_akhir }}</td>
                                <td>{{ $asset->wilayah }}</td>
                                <td>{{ $asset->nama_aset }}</td>
                                <td>{{ $asset->jenis_aset }}</td>
                                <td>{{ $asset->kode_aset }}</td>
                                <td>{{ $asset->alamat }}</td>
                                <td>{{ $previousOwner->upah_jasa + $previousOwner->harga_sewa }}</td>
                              </tr>
                              
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>

                  </div>
              </div>
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

@endsection
