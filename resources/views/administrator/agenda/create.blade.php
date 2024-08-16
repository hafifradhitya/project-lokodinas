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
                <label for="tgl_selesai">Tgl s/d Selesai</label>
                <div class="input-group">
                    <input type="text" class="form-control daterange" name="datefilter" id="datefilter">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" class="form-control" id="pengirim" name="pengirim">
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
    </div>
</div>
<script>
    $(function() {
        $('input[name=datefilter]').daterangepicker({
            opens: 'left'
        })
    }, function(start, end, label) {
        pickstart = start.format('YYYY - MM - DD');
        pickend = end.format('YYYY - MM - DD');

        $('#startdate').val(pickstart);
        $('#enddate').val(pickend);
    });
</script>
@endsection