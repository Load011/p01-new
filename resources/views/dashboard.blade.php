@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">
                      <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">
                      Asset
                  </li>
              </ol>
          </div>
          
          <div class="col-lg-4">
            <div class="card bg-success">
              <div class="card-body d-flex flex-column justify-content-center align-items-center text-white">  
                <i class="fas fa-house-user fa-2x mb-2"></i>
                <h5 class="card-title mb-0">Aset dengan Penyewa</h5>
                <h1 class="count h1">{{ $assetsWithHost }}</h1>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="card bg-warning">
              <div class="card-body d-flex flex-column justify-content-center align-items-center text-white">  
                <i class="fas fa-home fa-2x mb-2"></i>
                <h5 class="card-title mb-0">Aset tanpa Penyewa</h5>
                <h1 class="count h1">{{ $assetsWithoutHost }}</h1>
              </div>
            </div>
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
                        <th>Nama Aset</th>
                        <th>Jenis Aset</th>
                        <th>Alamat</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($assets as $asset)
                      <tr class="asset-row" data-asset-id="{{ $asset->id }}">
                        <td>{{ $asset->nama_aset }}</td>
                        <td>{{ $asset->jenis_aset }}</td>
                        <td>{{ $asset->alamat }}</td>
                        <td>
                          <a href="{{ route('asset.details', $asset->id) }}" class="btn btn-primary">Details</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
              </table>

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

{{-- @push('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>
@endpush --}}


