@extends('layouts.app_modern', ['title' => 'Data Poli'])

@section('content')
    <div class="card">
        <h3 class="card-header">Data Poli</h3>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <a href="{{ route('poli.create') }}" class="btn btn-primary mb-3">Tambah Data Poli</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Poli</th>
                        <th>Biaya</th>
                        <th>Keterangan</th>
                        <th>Tanggal Buat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($poli as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>Rp {{ number_format($item->biaya, 2, ',', '.') }}</td>
                            <td>{{ $item->keterangan ?? '-' }}</td>
                            <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('poli.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{ route('poli.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $poli->links() }}
            </div>
        </div>
    </div>
@endsection
