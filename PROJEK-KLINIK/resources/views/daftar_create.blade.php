@extends('layouts.app_modern',['tittle'=>'Pendaftaran Baru'])
@section('content')
<div class="card">
    <div class="card-header">
        Form Pendaftaran Pasien
    </div>
    <div class="card-body">
        <form action="/daftar" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="tanggal_daftar">Tanggal Daftar</label>
                <input type="date" name="tanggal_daftar" class="form-control"
                value="{{ old('tanggal_daftar') ?? date('Y-m-d') }}">
                <span class="text-danger">{{ $errors->first('tanggal_daftar') }}</span>
            </div>
            <div class="form-group mt-3">
                <label for="pasien_id">Nama Pasien
                |<a href="/pasien/create" target="blank">Pasien Baru</a>
                </label>
                <select name="pasien_id" class="form-control select2">
                    <option value="">-- Pilih Pasien --</option>
                    @foreach ($ListPasien as $item)
                        <option value="{{ $item->id }}" @selected(old('pasien_id') == $item->id)>
                            {{ $item->no_bpjs }} - {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('pasien_id') }}</span>
                <div>
                    Setelah menambahkan data pasien baru, tekan F5
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="poli">Poli</label>
                <select name="poli" class="form-control">
                    <option value="">-- Pilih Poli --</option>
                    @foreach ($ListPoli as $key => $val)
                        <option value="{{ $key }}" @selected(old('poli') == $key)>{{ $val }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('poli') }}</span>
            </div>

        </form>
    </div>
</div>
@endsection