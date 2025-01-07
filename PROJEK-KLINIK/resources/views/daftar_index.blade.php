@extends('layouts.app_modern', ['title' => 'Data Pendaftaran Pasien'])

@section('content')
    <div class="card">
        <h3 class="card-header">Data Pendaftaran Pasien</h3>
        <div class="card-body">
            <a href="/daftar/create" class="btn btn-primary">Tambah Pendaftaran Pasien</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>JENIS KELAMIN</th>
                        <th>POLI</th>
                        <th>KELUHAN</th>
                        <th>TANGGAL DAFTAR</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pasien->nama }}</td>
                            <td>{{ $item->pasien->jenis_kelamin }}</td>
                            <td>{{ $item->poli->nama }}</td> <!-- Mengakses relasi poli untuk menampilkan nama -->
                            <td>{{ $item->keluhan }}</td>
                            <td>{{ $item->tanggal_daftar }}</td> <!-- Gunakan tanggal_daftar -->
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/daftar/{{ $item->id }}" class="btn btn-primary btn-sm">Detail</a> <!-- URL Edit diubah -->
                                    <form action="/daftar/{{ $item->id }}" method="POST" class="d-inline"> <!-- URL hapus diubah -->
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ? ')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $daftar->links() !!}
        </div>
    </div>
@endsection
