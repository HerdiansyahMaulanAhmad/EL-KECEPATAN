@extends('layouts.app_modern')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Beranda Klinik</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Selamat Anda Berhasil Login !') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
