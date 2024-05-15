@extends('layouts.app')

@section('content')
<div class="content-header">
    <h2>Detail Pengajuan</h2>
</div>

<section class="content">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-mt-12">
                    <div class="row">
          
                      <!-- Bagian Detail -->
                      <div class="col-md-8">
                        <table class="table border">
                            <tr>
                                <th>Nama Aset</th>
                                <td>{{ $tickets->id_aset }}</td>
                            </tr>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>

@endsection