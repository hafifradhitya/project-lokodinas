@extends('administrator.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Agenda</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.agenda.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="info">Tema</label>
                <input class="form-control" type="text" id="tema" name="tema"></input>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar">
            </div>

            <div class="form-group">
                <label for="tempat">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat">
            </div>

            <div class="form-group">
                <label for="jam_selesai">Jam s/d Selesai</label>
                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
            </div>

            <div class="form-group">
                <label for="date_range">Rentang Tanggal</label>
                <input type="text" class="form-control" id="date_range" name="date_range" placeholder="Pilih Rentang Tanggal">
            </div>


            <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control" id="pengirim" name="pengirim">
            </div>

            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
    </div>

</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#date_range", {
            mode: "range",
            dateFormat: "Y-m-d",
            locale: {
                firstDayOfWeek: 1 // Start the week on Monday
            }
        });
    });
    </script>





@endsection
