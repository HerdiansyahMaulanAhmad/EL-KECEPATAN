@extends('layouts.app_modern', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <h3 class="card-header">Data Pendaftaran Pasien</h3>
        <div class="card-body">
           <a href="/daftar/create" class="btn btn-primary">Tambah Data Pasien</a>
           <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>JENIS KELAMIN</th>
                        <th>POLI</th>
                        <th>KELUHAN</th>
                        <th>TANGGAL DAFTAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pasien->nama }}</td>
                            <td>{{ $item->pasien->jenis_kelamin }}</td>
                            <td>{{ $item->poli }}</td>                           
                            <td>{{ $item->keluhan }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->update_at }}</td>
                            <td>
                                <a href="/pasien/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                                <form action="/pasien/{{ $item->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ? ')">
                                    Hapus
                                </button>
                                
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
           </table>
           {!! $daftar->links() !!}
        </div>
    </div>
@endsection
