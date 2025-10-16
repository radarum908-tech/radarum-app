<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampus | RADAR UM</title>
    <link href="assets/img/radar.png" rel="icon">
    <link href="assets/img/radar.png" rel="radar">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/kampus2.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container-fluid fade-in-content">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar bg-white shadow-sm p-0">
                <div class="position-sticky d-flex flex-column" style="top: 0; height: calc(100vh - 0px);">
                    <!-- Header -->
                    <div class="sidebar-header p-4 border-bottom d-flex align-items-center justify-content-center gap-2">
                        <img src="assets/img/radar.png" alt="Logo" width="55" height="80" class="me-2">
                        <h4 class="fw-bold text-primary mb-0">RADAR UM</h4>
                    </div>

                    <!-- Menu -->
                    <ul class="nav flex-column p-2 flex-grow-1">
                        <li class="nav-item mb-2">
                            <a class="nav-link active d-flex align-items-center rounded px-3 py-2" href="#" id="menu-dashboard">
                                <i class="bi bi-house-door me-2"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link d-flex align-items-center rounded px-3 py-2" href="#" id="menu-borang">
                                <i class="bi bi-ui-checks me-2"></i>
                                <span>Pengisian Borang</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link d-flex align-items-center rounded px-3 py-2" href="#" id="menu-riwayat">
                                <i class="bi bi-clock-history me-2"></i>
                                <span>Riwayat Borang</span>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link d-flex align-items-center rounded px-3 py-2" href="#" id="menu-profil">
                                <i class="bi bi-person-circle me-2"></i>
                                <span>Profil</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Footer -->
                    <div class="p-3 border-top text-center">
                        <form action="/logout/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4">
                <!-- Header Section -->
                <div class="topbar py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Selamat Datang, {{ Auth::user()->nama_kampus }}</h5>
                    <div class="d-flex align-items-center">
                        @if(Auth::user()->logo_kampus)
                            <img src="{{ asset('storage/' . Auth::user()->logo_kampus) }}"
                                 class="rounded-circle me-2"
                                 style="width:40px; height:40px; object-fit:cover;"
                                 alt="Logo {{ Auth::user()->nama_kampus }}">
                        @else
                            <img src="{{ asset('images/default-logo.png') }}"
                                 class="rounded-circle me-2"
                                 style="width:40px; height:40px; object-fit:cover;"
                                 alt="Default Logo">
                        @endif
                        <span>{{ Auth::user()->nama_kampus }}</span>
                    </div>
                </div>
                <!-- Dashboard Section -->
                <div class="content mt-4 fade-in-content" id="dashboardContent">
                    <div class="row g-4">
                                        <!-- Total Borang -->
                        <div class="col-md-4">
                            <div class="card shadow-lg border-0 rounded-4 h-100">
                                <div class="card-body p-4 d-flex flex-column justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-gradient-primary text-white me-3">
                                            <i class="bi bi-award fs-3"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Nilai Akhir Kampus Tanggunh</h6>
                                            <h4 class="mb-0 fw-bold">{{ $user->avg_pilar_total }}</h4>
                                        </div>
                                    </div>
                                    <small class="text-secondary mt-3">{{ Auth::user()->nama_kampus }}</small>
                                </div>
                            </div>
                        </div>
                                        <!-- Total Kampus -->
                        <div class="col-md-4">
                            <div class="card shadow-lg border-0 rounded-4 h-100">
                                <div class="card-body p-4 d-flex flex-column justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-gradient-info text-white me-3">
                                            <i class="bi bi-building fs-3"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Kampus</h6>
                                            <h4 class="mb-0 fw-bold">{{ $totalKampus }}</h4>
                                        </div>
                                    </div>
                                    <small class="text-secondary mt-3">Partisipasi Kampus</small>
                                </div>
                            </div>
                        </div>
                                        <!-- Kampus Kirim Borang -->
                        <div class="col-md-4">
                            <div class="card shadow-lg border-0 rounded-4 h-100">
                                <div class="card-body p-4 d-flex flex-column justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle bg-gradient-danger text-white me-3">
                                            <i class="bi bi-send-check fs-3"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Kampus</h6>
                                            <h4 class="mb-0 fw-bold">{{ $kampusList->count() }}</h4>
                                        </div>
                                    </div>
                                    <small class="text-secondary mt-3">Sudah Mengirim Borang</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card shadow-lg border-0 rounded-4 mt-4">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-3">Progress Pengisian Borang</h5>

                                    <div class="progress" style="height: 50px; border-radius: 20px; overflow: hidden;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated
                                            @if($progress == 100) bg-success
                                            @elseif($progress >= 50) bg-info
                                            @else bg-danger
                                            @endif"
                                            role="progressbar"
                                            style="width: {{ $progress }}%;
                                                   font-size: 1rem;
                                                   font-weight: bold;
                                                   display: flex;
                                                   align-items: center;
                                                   justify-content: center;
                                                   transition: width 0.6s ease;">
                                            @if($progress > 0)
                                                <i class="bi
                                                    @if($progress == 100) bi-check-circle-fill
                                                    @elseif($progress >= 50) bi-hourglass-split
                                                    @else bi-exclamation-triangle-fill @endif
                                                    me-2"></i>
                                                {{ $progress }}%
                                            @else
                                                Belum Mulai
                                            @endif
                                        </div>
                                    </div>

                                    <p class="mt-3 fw-bold text-secondary">
                                        Status:
                                        <span class="@if($progress == 100) text-success
                                                     @elseif($progress >= 50) text-info
                                                     @else text-danger @endif">
                                            {{ ucfirst($status) }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-4 fade-in-content" id="borangContent" style="display: none">
                    @include('kampus.pengisian-borang')
                </div>
                <div class="container mt-4 fade-in-content" id="riwayatContent" style="display: none">
                    @include('kampus.riwayat-borang')
                </div>
                <div class="container mt-4 fade-in-content" id="profilContent" style="display: none">
                    @include('kampus.profil')
                </div>
            </main>
        </div>
    </div>
    <script src="assets/js/kampus.js"></script>
</body>

