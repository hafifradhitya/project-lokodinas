@extends('administrator.layout')

@section('content')

<style>
    .table td {
        word-wrap: break-word;
        white-space: normal;
    }
</style>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Banner Home</h3>
                <a href="{{ route('administrator.bannerhome.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>

            <!-- Tambahkan form pencarian -->
            <div class="card-body">
                <form action="{{ route('administrator.bannerhome.index') }}" method="GET" class="mb-1">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari banner..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-bordered" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Link</th>
                            <th class="text-center">Tgl Posting</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bannerhomes as $index => $banner)
                        <tr>
                            <td>{{ $bannerhomes->firstItem() + $index }}</td>
                            <td>{{ $banner->judul }}</td>
                            <td><a href="{{ $banner->url }}" target="_blank">{{ $banner->url }}</a></td>
                            <td>{{ \Carbon\Carbon::parse($banner->tgl_posting)->locale('id')->isoFormat('D MMM YYYY') }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('administrator.bannerhome.edit', $banner->id_iklantengah) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('administrator.bannerhome.destroy', $banner->id_iklantengah) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $banner->judul }}?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $bannerhomes->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection
