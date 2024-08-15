@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah User Baru</h3>
              </div>
            <div class="card-body">
                <form action="{{ route('administrator.manajemenuser.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered" id="datatable-buttons">
                        <tbody>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Username</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Password</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Nama Lengkap</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Alamat Email</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">No Telepon</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="tel" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukkan nomor telepon"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Upload Foto</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="file" class="form-control" id="foto" name="foto" accept="image/*"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Level</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="kontributor" value="kontributor">
                                        <label class="form-check-label" for="kontributor">Kontributor</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="administrator" value="administrator" checked>
                                        <label class="form-check-label" for="administrator">Administrator</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="user_biasa" value="user_biasa">
                                        <label class="form-check-label" for="user_biasa">User Biasa</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Akses Modul</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="pesan_masuk" id="pesan_masuk" name="akses_modul[]">
                                            <label class="form-check-label" for="pesan_masuk">Pesan Masuk</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="logo_website" id="logo_website" name="akses_modul[]">
                                            <label class="form-check-label" for="logo_website">Logo Website</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="komentar_video" id="komentar_video" name="akses_modul[]">
                                            <label class="form-check-label" for="komentar_video">Komentar Video</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="tag_video" id="tag_video" name="akses_modul[]">
                                            <label class="form-check-label" for="tag_video">Tag Video</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="playlist_video" id="playlist_video" name="akses_modul[]">
                                            <label class="form-check-label" for="playlist_video">Playlist Video</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="video" id="video" name="akses_modul[]">
                                            <label class="form-check-label" for="video">Video</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="identitas_website" id="identitas_website" name="akses_modul[]">
                                            <label class="form-check-label" for="identitas_website">Identitas Website</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="halaman_baru" id="halaman_baru" name="akses_modul[]">
                                            <label class="form-check-label" for="halaman_baru">Halaman Baru</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="menu_website" id="menu_website" name="akses_modul[]">
                                            <label class="form-check-label" for="menu_website">Menu Website</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="sensor_kata" id="sensor_kata" name="akses_modul[]">
                                            <label class="form-check-label" for="sensor_kata">Sensor Kata</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="template_website" id="template_website" name="akses_modul[]">
                                            <label class="form-check-label" for="template_website">Template Website</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="galeri_berita_foto" id="galeri_berita_foto" name="akses_modul[]">
                                            <label class="form-check-label" for="galeri_berita_foto">Galeri Berita Foto</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="berita_foto" id="berita_foto" name="akses_modul[]">
                                            <label class="form-check-label" for="berita_foto">Berita Foto</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="agenda" id="agenda" name="akses_modul[]">
                                            <label class="form-check-label" for="agenda">Agenda</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="komentar_berita" id="komentar_berita" name="akses_modul[]">
                                            <label class="form-check-label" for="komentar_berita">Komentar Berita</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="tag_berita" id="tag_berita" name="akses_modul[]">
                                            <label class="form-check-label" for="tag_berita">Tag Berita</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="jajak_pendapat" id="jajak_pendapat" name="akses_modul[]">
                                            <label class="form-check-label" for="jajak_pendapat">Jajak Pendapat</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="kategori_berita" id="kategori_berita" name="akses_modul[]">
                                            <label class="form-check-label" for="kategori_berita">Kategori Berita</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="berita" id="berita" name="akses_modul[]">
                                            <label class="form-check-label" for="berita">Berita</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="manajemen_modul" id="manajemen_modul" name="akses_modul[]">
                                            <label class="form-check-label" for="manajemen_modul">Manajemen Modul</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="manajemen_user" id="manajemen_user" name="akses_modul[]">
                                            <label class="form-check-label" for="manajemen_user">Manajemen User</label>
                                        </div>
                                    </div>
                                </td>
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

@endsection
