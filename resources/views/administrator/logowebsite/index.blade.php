@extends('administrator.layout')

@section('content')
<style>
    .logo-container {
        max-width: 400px;
        margin: 0 auto;
    }

    .logo-container img {
        width: 100%;
        height: auto;
    }
</style>
<div class="container">
    <h1 class="mb-4">Ganti Logo Website</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Logo Terpasang</h5>
            <div class="logo-container">
                <img src="{{ asset('path/to/current/logo.png') }}" alt="Logo Terpasang" class="img-fluid">
            </div>

            <form action="{{ route('administrator.logowebsite.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="logo" class="form-label">Pilih Logo Baru</label>
                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>

@endsection