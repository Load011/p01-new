@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Penyewa</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Halaman Utama</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Penyewa
                    </li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<section class="content">
<div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Tambah Penyewa
                    </div>
                    <div class="card-body">
                        <form action="{{ route('host.store') }}" method="POST" class="p-3">
                            @csrf
                            <div class="form-group">
                                <label for="nama_penyewa">Nama Penyewa: </label>
                                <input type="text" name="alias" class="form-control" value="{{old('nama_penyewa') ?? ''}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Timetable</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection

@section('extra-js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
@endsection
