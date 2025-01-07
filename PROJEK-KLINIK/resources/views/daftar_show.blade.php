@extends('layouts.app_modern', ['title' => 'Detail Pendaftaran Pasien'])

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Detail Pendaftaran</h2>

    <!-- Data Pasien -->
    <div class="card mb-4">
        <div class="card-header bg-info">
            <h4 class="text-light">Data Pasien</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-8">
                    : {{ $pasien->nama }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>No BPJS</strong>
                </div>
                <div class="col-md-8">
                    : {{ $pasien->no_bpjs }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Jenis Kelamin</strong>
                </div>
                <div class="col-md-8">
                    : {{ $pasien->jenis_kelamin }}
                </div>
            </div>
        </div>
    </div>

    <!-- Riwayat Pasien (Horizontal) -->
    <div class="card mb-4">
        <div class="card-header bg-info">
            <h4 class="text-light">Riwayat Pasien</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><strong>Tanggal Daftar</strong></th>
                        <th><strong>Keluhan</strong></th>
                        <th><strong>Diagnosis</strong></th>
                        <th><strong>Tindakan</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($daftar->tanggal_daftar)->format('d-m-Y') }}</td>
                        <td>{{ $daftar->keluhan }}</td>
                        <td>{{ $daftar->diagnosis }}</td>
                        <td>{{ $daftar->tindakan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Data Pendaftaran -->
    <div class="card mb-4">
        <div class="card-header bg-info">
            <h4 class="text-light">Data Pendaftaran</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>No Pendaftaran</strong>
                </div>
                <div class="col-md-8">
                    : {{ $daftar->id }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Tanggal Daftar</strong>
                </div>
                <div class="col-md-8">
                    : {{ \Carbon\Carbon::parse($daftar->tanggal_daftar)->format('d-m-Y') }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Nama Poli</strong>
                </div>
                <div class="col-md-8">
                    : {{ $poli->nama }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Keluhan</strong>
                </div>
                <div class="col-md-8">
                    : {{ $daftar->keluhan }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Status Pendaftaran</strong>
                </div>
                <div class="col-md-8">
                    : @if($daftar->status == 'pending')
                        <span class="badge badge-warning">Pending</span>
                    @elseif($daftar->status == 'selesai')
                        <span class="badge badge-success">Selesai</span>
                    @else
                        <span class="badge badge-danger">Batal</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

<!-- Hasil Diagnosis (Form Input) -->
<div class="card mb-4">
    <div class="card-header bg-info">
        <h4 class="text-light">Hasil Diagnosis</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('daftar.updateDiagnosis', $daftar->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="diagnosis">Diagnosis</label>
                <input type="text" class="form-control" id="diagnosis" name="diagnosis" value="{{ old('diagnosis', $daftar->diagnosis) }}">
            </div>
            <div class="form-group mb-3">
                <label for="tindakan">Tindakan</label>
                <input type="text" class="form-control" id="tindakan" name="tindakan" value="{{ old('tindakan', $daftar->tindakan) }}">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan Hasil Diagnosis</button>
        </form>
    </div>
</div>


    <a href="{{ route('daftar.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection
