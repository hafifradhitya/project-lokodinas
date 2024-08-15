@extends('administrator.layout')

@section('content')

<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-primary border-0">
                <div class="card-body">
                    <h5 class="text-white">BERITA</h5>
                    <h2 class="text-white">64</h2>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-success border-0">
                <div class="card-body">
                    <h5 class="text-white">HALAMAN</h5>
                    <h2 class="text-white">5</h2>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-warning border-0">
                <div class="card-body">
                    <h5 class="text-white">AGENDA</h5>
                    <h2 class="text-white">3</h2>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-danger border-0">
                <div class="card-body">
                    <h5 class="text-white">USERS</h5>
                    <h2 class="text-white">1</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Application Buttons</h3>
                    <p>Silakan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda atau pilih ikon-ikon pada Control Panel di bawah ini:</p>
                    <div class="row">
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-th fa-2x mb-1 mx-auto"></i>
                                <span class="small">Identitas</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-th-large fa-2x mb-1 mx-auto"></i>
                                <span class="small">Menu</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-file fa-2x mb-1 mx-auto"></i>
                                <span class="small">Halaman</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-desktop fa-2x mb-1 mx-auto"></i>
                                <span class="small">Berita</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-bars fa-2x mb-1 mx-auto"></i>
                                <span class="small">Kategori</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-tag fa-2x mb-1 mx-auto"></i>
                                <span class="small">Tag Berita</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-comments fa-2x mb-1 mx-auto"></i>
                                <span class="small">Komen. Berita</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-bell-slash fa-2x mb-1 mx-auto"></i>
                                <span class="small">Sensor</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-camera-retro fa-2x mb-1 mx-auto"></i>
                                <span class="small">Album</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-camera fa-2x mb-1 mx-auto"></i>
                                <span class="small">Gallery</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-caret-square-right fa-2x mb-1 mx-auto"></i>
                                <span class="small">Playlist</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-play fa-2x mb-1 mx-auto"></i>
                                <span class="small">Video</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-tags fa-2x mb-1 mx-auto"></i>
                                <span class="small">Tag Video</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-comments fa-2x mb-1 mx-auto"></i>
                                <span class="small">Komen. Video</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-file-image fa-2x mb-1 mx-auto"></i>
                                <span class="small">Ads Atas</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-file-image fa-2x mb-1 mx-auto"></i>
                                <span class="small">Ads Sidebar</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-file-image fa-2x mb-1 mx-auto"></i>
                                <span class="small">Ads Tengah</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-circle-notch fa-2x mb-1 mx-auto"></i>
                                <span class="small">Logo</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-file fa-2x mb-1 mx-auto"></i>
                                <span class="small">Template</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-circle fa-2x mb-1 mx-auto"></i>
                                <span class="small">Background</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-calendar-minus fa-2x mb-1 mx-auto"></i>
                                <span class="small">Agenda</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-calendar-minus fa-2x mb-1 mx-auto"></i>
                                <span class="small">Sekilas Info</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-chart-bar fa-2x mb-1 mx-auto"></i>
                                <span class="small">Polling</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fab fa-yahoo fa-2x mb-1 mx-auto"></i>
                                <span class="small">YM</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-download fa-2x mb-1 mx-auto"></i>
                                <span class="small">Download</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-bed fa-2x mb-1 mx-auto"></i>
                                <span class="small">Alamat</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-envelope fa-2x mb-1 mx-auto"></i>
                                <span class="small">Pesan</span>
                            </button>
                        </div>
                        <div class="col-3 mb-3">
                            <button class="btn btn-secondary d-flex flex-column align-items-center justify-content-center h-100 p-2 w-100 border-0 hover-border-dark">
                                <i class="fa fa-users fa-2x mb-1 mx-auto"></i>
                                <span class="small">Users</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">PERFORMANCE</h6>
                    <h2 class="h3 mb-0">Total orders</h2>
                </div>
                <div class="card-body">
                    <canvas id="chart-bars" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chart-bars').getContext('2d');
    const totalOrdersChart = new Chart(ctx, {
        type: 'bar', // Ubah menjadi 'bar'
        data: {
            labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Total Orders',
                data: [10, 20, 30, 25, 15, 30],
                backgroundColor: 'rgba(255, 99, 132, 1)', // Warna batang
                borderColor: 'rgba(255, 99, 132, 1)', // Warna garis
                borderWidth: 2 // Lebar garis
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)', // Warna grid
                    }
                },
                x: {
                    grid: {
                        display: false // Menyembunyikan grid pada sumbu x
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Menyembunyikan legenda
                }
            }
        }
    });
</script>
@endsection
