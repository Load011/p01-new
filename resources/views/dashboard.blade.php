@extends('layouts.app')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="text-dark">Dashboard</h1>
      </div>
      <!-- Card -->
      <!-- Card Hijau -->
      <div class="col-lg-3">
        <div class="card bg-success">
          <div class="card-body d-flex flex-column align-items-center text-white">
            <i class="fas fa-house-user"></i>
            <h5 class="card-title">Aset dengan Penyewa</h5>
            <h1 class="count h1">{{ $assetsWithHost }}</h1>
          </div>
        </div>
      </div>
      <!-- Card Kuning -->
      <div class="col-lg-3">
        <div class="card bg-warning">
          <div class="card-body d-flex flex-column align-items-center text-white">
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
        <!-- Graph bar -->
        <div class="card">
          <div class="card-header">
            <h2 class="float-left">Pendapatan per Asset</h2>
            <div class="float-right">
              <button class="btn btn-primary">Detail Pendapatan</button>
            </div>
          </div>
          <div class="card-body">
            <div class="position-relative mb-4 border">
              <canvas id="sales-chart" height="250"></canvas>
            </div>
            <div class="d-flex flex-row justify-content-end">
              <span class="mr-2">
                <i class="fas fa-square text-primary"> Harga Sewa </i>
              </span>
              <span class="mr-2">
                <i class="fas fa-square text-gray"> Pengeluaran Asset </i>
              </span>
            </div>
          </div>
        </div>
    </div>
      <!-- .end Graph -->

      <!-- Asset Details -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h2 class="float-left">Asset Keseluruhan</h2>
            <div class="float-right">
                <input type="text" id="searchInput" placeholder="Search for assets...">
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
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
                  <tr class="asset-row" data-set-id="{{ $asset->id}}">
                    <td>{{$asset->nama_aset}}</td>
                    <td>{{$asset->jenis_aset}}</td>
                    <td>{{$asset->alamat}}</td>
                    <td>
                      <a href="{{ route('asset.details', $asset->id) }}" class="btn btn-primary">Detail</a>
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
  </div>
</section>

<script>
  //Graph

  $(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true
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

// Search Input
document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('.asset-row');

            rows.forEach(row => {
                const assetName = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                const assetType = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const assetAddress = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                const assetDetails = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

                if (assetName.includes(searchText) || assetType.includes(searchText) || assetAddress.includes(searchText) || assetDetails.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });

</script>

<style>
  .table-responsive {
    max-height: 400px; /* Adjust the maximum height as needed */
    overflow-y: auto;
}
.thead-fixed {
    position: sticky;
    top: -10px;
    background-color: #F5F5F5;
  }

</style>

@endsection