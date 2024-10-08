@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Banner Slider</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.bannerslider.update', $bannerslider->id_banner) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Judul</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" value="{{ $bannerslider->judul }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Deskripsi</th>
                                <td style="padding: 5px;">
                                    <textarea class="form-control" id="isi_deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi">{{ $bannerslider->deskripsi }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Gambar</th>
                                <td style="padding: 5px;">
                                    <div class="d-flex align-items-center">
                                        <img id="preview" src="{{ url('foto_banner/'.$bannerslider->gambar) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                        <div class="flex-grow-1">
                                            <input type="file" class="form-control" onchange="previewImage(event)" name="gambar" id="gambar" accept="image/*">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.bannerslider.index') }}" class="btn btn-danger">Batal</a>
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

@push('script')
<script>
    CKEDITOR.replace('isi_deskripsi');
</script>
@endpush
