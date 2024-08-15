@extends('administrator.layout')

@section('content')
<?php
$gbr_playlist = "profile.png";
if($playlistvideos->gbr_playlist != NULL){
    $gbr_playlist = $playlistvideos->gbr_playlist;
}
?>
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('administrator.playlistvideo.update', $playlistvideos->id_playlist) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Judul Playlist</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="jdl_playlist" name="jdl_playlist" value="{{ $playlistvideos->jdl_playlist }}" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Cover saat ini:</th>
                                <td style="padding: 5px;">
                                    <div class="d-flex align-items-center">
                                        <img id="preview" src="{{ url('img_playlist/'.$playlistvideos->gbr_playlist) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                        <div class="flex-grow-1">
                                            <input type="file" class="form-control" onchange="previewImage(event)" name="gbr_playlist" id="gbr_playlist">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah cover.</small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.playlistvideo.index')}}" class="btn btn-danger">Cancel</a>
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
