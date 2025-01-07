@extends('layouts.app_modern', ['title' => 'Tambah Pendaftaran Pasien'])

@section('content')
    <div class="card">
        <h3 class="card-header">Tambah Pendaftaran Pasien</h3>
        <div class="card-body">
            <form action="{{ route('daftar.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="pasien_id" class="form-label">Nama Pasien</label>
                    <select name="pasien_id" id="pasien_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Pasien</option>
                        @foreach ($pasien as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="poli_id" class="form-label">Poli</label>
                    <select name="poli_id" id="poli_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Poli</option>
                        @foreach ($poli as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="keluhan" class="form-label">Keluhan</label>
                    <textarea name="keluhan" id="keluhan" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
                    <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
