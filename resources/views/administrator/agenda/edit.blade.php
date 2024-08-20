@extends('administrator.layout')

@section('content')

<div class="card shadow">
    <div class="card-header">
        <h3 class="mb-0">Edit Agenda</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.agenda.update', $agenda->id_agenda) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table" style="border: none; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th style="padding: 5px;">Tema</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="tema" name="tema" value="{{ $agenda->tema }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Isi Agenda</th>
                        <td style="padding: 5px;">
                            <textarea class="form-control" id="isi_agenda" name="isi_agenda" rows="4">{{ $agenda->isi_agenda }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Gambar</th>
                        <td style="padding: 5px;">
                            <div class="d-flex align-items-center">
                                <img id="preview" src="{{ url('foto_agenda/'.$agenda->gambar) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                <div class="flex-grow-1">
                                    <input type="file" class="form-control" onchange="previewImage(event)" name="gambar" id="gambar">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Tempat</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $agenda->tempat }}">
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Jam</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="jam" name="jam" value="{{ $agenda->jam }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Tgl s/d Selesai</th>
                        <td style="padding: 5px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{ $agenda->tgl_mulai }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{ $agenda->tgl_selesai }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Pengirim</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="pengirim" name="pengirim" value="{{ $agenda->pengirim }}">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('administrator.agenda.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#tgl_mulai", {
            dateFormat: "Y-m-d",
            locale: {
                firstDayOfWeek: 1
            }
        });
    
        flatpickr("#tgl_selesai", {
            dateFormat: "Y-m-d",
            locale: {
                firstDayOfWeek: 1
            }
        });
    
        document.querySelector('form').addEventListener('submit', function(e) {
            var jamInput = document.getElementById('jam').value;
            var jamPattern = /^([01]\d|2[0-3]):([0-5]\d) - ([01]\d|2[0-3]):([0-5]\d) WIB$/;
            if (!jamPattern.test(jamInput)) {
                e.preventDefault();
                alert('Format jam tidak valid. Harus dalam format HH:MM - HH:MM WIB');
            }
        });
    });
</script>

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
