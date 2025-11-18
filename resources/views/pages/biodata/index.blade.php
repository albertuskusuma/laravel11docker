@extends('layouts.app')

@section('title', 'Biodata')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Daftar Biodata Aktif</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <!-- Tombol Tambah Data -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-bold">Data Biodata</span>
                <a href="{{ route('biodata.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>

            {{-- Alert Sukses --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (empty($biodata))
                <p class="text-center text-muted">Tidak ada data biodata aktif.</p>
            @else
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($biodata as $i => $data)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
