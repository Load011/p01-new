@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Para Penyewa</h1>
    <a href="{{ route('host.create') }}" class="btn btn-success mb-3">Tambah Penyewa</a>
    @if ($hosts->isEmpty())
    <div class="alert alert-info">
        Tidak ada Penyewa
    </div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Nama Penyewa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hosts as $host)
            <tr>
                <td>{{ $host->nama_penyewa }}</td>
                <td>
                    <a href="{{ route('host.edit', $host->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                    <form action="{{ route('host.destroy', $host->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
