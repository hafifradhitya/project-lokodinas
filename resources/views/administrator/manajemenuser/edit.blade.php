@extends('administrator.layout')

@section('content')
<?php
$foto = "profile.png";
if($users->foto != NULL){
    $foto = $users->foto;
}
?>

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('administrator.manajemenuser.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered" id="datatable-buttons">
                        <tbody>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Username</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="text" class="form-control" id="username" name="username" value="{{ $users->username }}"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Password</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru jika ingin mengubah"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Nama Lengkap</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $users->nama_lengkap }}"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Alamat Email</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">No Telepon</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="tel" class="form-control" id="no_telepon" name="no_telepon" value="{{ $users->no_telepon }}"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Upload Foto</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    {{-- <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                    @if($users->foto)
                                        <img src="{{ asset('storage/'.$user->foto) }}" alt="Foto Profil" style="max-width: 100px; margin-top: 10px;">
                                    @endif --}}
                                    <div class="d-flex align-items-center">
                                        <img id="preview" src="{{ url('img_playlist/'.$users->foto) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                        <div class="flex-grow-1">
                                            <input type="file" class="form-control" onchange="previewImage(event)" name="foto" id="foto">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah cover.</small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Level</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="kontributor" value="kontributor" {{ $users->level == 'kontributor' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="kontributor">Kontributor</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="user_biasa" value="user_biasa" {{ $users->level == 'user_biasa' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="user_biasa">User Biasa</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="administrator" value="administrator" {{ $users->level == 'administrator' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="administrator">Administrator</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Akses Modul</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        @php
                                            $akses_modul = explode(',', $users->akses_modul);
                                        @endphp
                                        @foreach(['pesan_masuk', 'logo_website', 'komentar_video', 'tag_video', 'playlist_video', 'video', 'identitas_website', 'halaman_baru', 'menu_website', 'sensor_kata', 'template_website', 'galeri_berita_foto', 'berita_foto', 'agenda', 'komentar_berita', 'tag_berita', 'jajak_pendapat', 'kategori_berita', 'berita', 'manajemen_modul', 'manajemen_user'] as $modul)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $modul }}" id="{{ $modul }}" name="akses_modul[]" {{ in_array($modul, $akses_modul) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="{{ $modul }}">{{ ucwords(str_replace('_', ' ', $modul)) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.manajemenuser.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var preview = document.getElementById('preview');
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(){
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
