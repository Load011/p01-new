@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
      <div class="row">
          <div class="col-sm-6">
              <h1 class="text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
          </div>
          
          <div class="col-lg-3">
            <div class="card bg-success">
              <div class="card-body d-flex flex-column justify-content-center align-items-center text-white">  
                <i class="fas fa-house-user"></i>
                <h5 class="card-title">Aset dengan Penyewa</h5>
                <h1 class="count h1">{{ $assetsWithHost }}</h1>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3">
            <div class="card bg-warning">
              <div class="card-body d-flex flex-column justify-content-center align-items-center text-white">  
                <i class="fas fa-home"></i>
                <h5 class="card-title">Aset tanpa Penyewa</h5>
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
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                  <div class="scrollable-box">
                      <table class="table">
                          <thead class="thead-fixed">
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
      </div>
  </div>
  
      
          <!-- /.col -->
      </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>

@endsection
<style>
  .scrollable-box {
    overflow-y: auto;
    max-height: 300px;
    border: 1px solid #ddd;
    padding: 10px;
  }
.thead-fixed {
    position: sticky;
    top: 0;
    background-color: #ffffff;
    z-index: 999;
  }

.table tbody {
    z-index: 1;
  }
</style>



