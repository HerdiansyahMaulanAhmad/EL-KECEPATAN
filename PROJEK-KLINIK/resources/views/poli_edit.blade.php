@extends('layouts.app_modern', ['title' => 'Edit Poli'])

@section('content')
    <div class="card">
        <h3 class="card-header">Edit Poli</h3>
        <div class="card-body">
            <form action="{{ route('poli.update', $poli->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Poli</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $poli->nama) }}" required>
                </div>
                <div class="mb-3">
                    <label for="biaya" class="form-label">Biaya</label>
                    <input type="number" name="biaya" id="biaya" class="form-control" value="{{ old('biaya', $poli->biaya) }}" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $poli->keterangan) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

