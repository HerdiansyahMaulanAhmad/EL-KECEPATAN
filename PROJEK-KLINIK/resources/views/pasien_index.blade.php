@extends('mylayout', ['title' => 'Data Pasien'])
@section('content')
    <div class="card">
        <div class="card-body">
           <h3>Data Pasien</h3>
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
                        <th>BIAYA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_bpjs }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->umur }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->update_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
           </table>
           {!! $pasien->links() !!}
        </div>
    </div>
@endsection
