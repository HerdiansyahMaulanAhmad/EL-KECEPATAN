@extends('layouts.app_modern', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <h3 class="card-header">Data Pasien</h3>
        <div class="card-body">
           <a href="/pasien/create" class="btn btn-primary">Tambah Data Pasien</a>
           <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NO BPJS</th>
                        <th>NAMA</th>
                        <th>UMUR</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>TANGGAL BUAT</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_bpjs }}</td>
                            <td>
                                @if ($item->foto)
                                <a href="{{ Storage::url($item->foto) }}" target="blank">
                                    <img src="{{ Storage::url($item->foto) }}" width="50">
                                </a>
                                @endif
                                {{ $item->nama }}
                            </td>
                            <td>{{ $item->umur }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->alamat }}</td>
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
           {!! $pasien->links() !!}
        </div>
    </div>
@endsection
