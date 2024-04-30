@extends('layouts.app')

@section('content')
<div class="content-header">
  <h1>Pendapatan Tiap Aset</h1>
</div>

<section class="content">
  <div class="container">
    <div class="card">
      <div class="card-body border">
        <div class="mb-3">
            <a href="{{ route('asset.export') }}" class="btn btn-success">Export to Excel</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                <th>Nama Aset</th>
                <th>Alamat Aset</th>
                <th>Pendapatan</th>
                <th>Pengeluaran</th>
                </tr>
          </thead>
          <tbody>
            @foreach($assets as $asset)
              <tr class="asset-row" data-set-id="{{ $asset->id }}">
                <td>{{ $asset->nama_aset }}</td>
                <td>{{ $asset->alamat }}</td>
                <td>{{ $asset->tuanRumah ? $asset->tuanRumah->harga_sewa : '0' }}</td>
                <td>{{ $asset->pengeluaran }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection
