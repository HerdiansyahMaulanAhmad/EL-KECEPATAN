@extends('layouts.app_modern', ['title' => 'Tambah Data Pasien'])
@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data Pasien</h5>
        <div class="card-body">
            <form action="/pasien" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="foto">Foto Pasien</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" 
                        name="nama" value="{{ old('nama') }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="no_bpjs">Nomor BPJS</label>
                    <input type="text" class="form-control @error('no_bpjs') is-invalid @enderror" id="no_bpjs" 
                        name="no_bpjs" value="{{ old('no_bpjs') }}">
                    <span class="text-danger">{{ $errors->first('no_bpjs') }}</span>
                </div>

                <!-- Ganti umur dengan tanggal lahir -->
                <div class="form-group mt-1 mb-3">
                    <label for="umur">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('umur') is-invalid @enderror" id="umur" 
                           name="umur" value="{{ old('umur') }}">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                </div>
                

                <div class="form-group mt-1 mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki" 
                            {{old('jenis_kelamin') === 'Laki-laki' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan" 
                            {{old('jenis_kelamin') === 'Perempuan' ? 'checked' : '' }}>
                        <label class="form-check-label" for="Perempuan">Perempuan</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" 
                        name="alamat" value="{{ old('alamat') }}">
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
