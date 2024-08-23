@extends('administrator.layout')

@section('submenu')

<div class="header-body">
    <div class="row align-items-center py-2">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links">
                    <li class="breadcrumb-item"><a href="#"><i class="ni ni-ungroup text-orange"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Halaman baru</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

@endsection

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Halaman Baru</h3>
          <a href="{{ route('administrator.halamanbaru.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>

        <!-- Tambahkan form pencarian -->
        <div class="card-body">
            <form action="{{ route('administrator.halamanbaru.index') }}" method="GET" class="mb-1">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari kategori..." name="search" value="{{ request('search') }}">
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
              @foreach ($halamanbaru as $index => $page)
              <tr>
                <td>{{ $index + $halamanbaru->firstItem() }}</td>
                <td>{{ $page->judul }}</td>
                <td><a href="{{ url('halaman/detail/' . $page->judul_seo) }}">halaman/detail/{{ $page->judul_seo }}</a></td>
                <td>{{ \Carbon\Carbon::parse($page->tgl_posting)->format('d M Y') }}</td>
                <td class="text-center">
                    <a href="{{ route('administrator.halamanbaru.edit', $page->id_halaman) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                      <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('administrator.halamanbaru.destroy', $page->id_halaman) }}" method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $page->judul }}?')">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <br>
          {{ $halamanbaru->links('vendor.pagination.bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>

@endsection
