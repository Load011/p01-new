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
          <div class="card-body">
            <div class="d-flex">
              <p class="d-flex flex-column">
                <span>Pendapatan Aset</span>
              </p>
            </div>
            <!-- /.d-flex -->
            <div class="position-relative mb-4 border">
              <canvas id="sales-chart" height="200"></canvas>
            </div>
  
            <div class="d-flex flex-row justify-content-end">
              <span class="mr-2">
                <i class="fas fa-square text-primary"></i> Harga Sewa
              </span>
              <span>
                <i class="fas fa-square text-gray"></i> Pengeluaran
              </span>
            </div>
          </div>
        </div>
      </div>  
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
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
<script>
  /* global Chart:false */

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true
  // console.log('Data Aset:', {!! json_encode($dataAset) !!});
  // console.log('Harga Sewa With Host:', {!! json_encode($hargaSewaWithHost) !!});
  console.log({!! json_encode($pengeluaran) !!})
  var $salesChart = $('#sales-chart')
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: {!! json_encode($dataAset) !!},
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: {!! json_encode($hargaSewaWithHost) !!}
        },
        {
          backgroundColor: '#ced4da',
          borderColor: '#ced4da',
          data: {!! json_encode($pengeluaran) !!},
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          gridLines: {
                    display: true,
                    color: 'rgba(0, 0, 0, .2)',
                    drawBorder: false,
                    zeroLineColor: 'rgba(0, 0, 0, .2)'
                },
          ticks: {
                    beginAtZero: true,
                    stepSize: 10000,
                    callback: function(value, index, values) {
                        return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                }
            }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }

    }
  })
})
</script>
@endsection

<style>
  .content-wrapper {
  min-height: calc(100vh - 70px);
}

  .scrollable-box {
    overflow-y: auto;
    max-height: 300px;
    border: 1px solid #ddd;
  }
.thead-fixed {
    position: sticky;
    top: -10px;
    background-color: #F5F5F5;
    z-index: 999;
  }

.table tbody {
    z-index: 1;
  }
</style>



