<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviewer | RADAR UM</title>
  <link href="assets/img/radar.png" rel="icon">
  <link href="assets/img/radar.png" rel="radar">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/reviewer.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block sidebar bg-white shadow-sm p-0 position-fixed h-100">
        <div class="d-flex flex-column h-100">

          <!-- Header -->
          <div class="sidebar-header p-4 border-bottom d-flex align-items-center justify-content-center gap-2">
            <img src="/assets/img/radar.png" alt="Logo" width="60" height="80" class="me-2">
            <h5 class="fw-bold text-primary mb-0">RADAR UM</h5>
          </div>

          <!-- Menu -->
          <ul class="nav flex-column p-3 flex-grow-1">
            <li class="nav-item mb-2">
              <a class="nav-link active d-flex align-items-center rounded px-3 py-2" href="#" id="menu-dashboard">
                <i class="bi bi-house-door me-2"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item mb-2">
              <a class="nav-link d-flex align-items-center rounded px-3 py-2" href="#" id="menu-borang">
                <i class="bi bi-ui-checks me-2"></i>
                <span>Penilaian Borang</span>
              </a>
            </li>

          </ul>

          <!-- Footer -->
          <div class="p-3 border-top">
            <form action="/logout/logout" method="POST">
              @csrf
              <button type="submit" class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
              </button>
            </form>
          </div>
        </div>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10 ms-sm-auto px-md-4">
        <div class="topbar py-3 d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Selamat Datang, {{ Auth::user()->nama_kampus }}</h5>
          <div class="d-flex align-items-center">
            <img src="https://via.placeholder.com/30" class="rounded-circle me-2" alt="">
            <span>{{ Auth::user()->nama_kampus }}</span>
          </div>
        </div>

        <!-- Dashboard Section -->
        <div class="content mt-4 fade-in-content" id="dashboardContent">
          <div class="row">
            <div class="col-md-4">
                <div class="card shadow-lg border-0 rounded-4 h-100">
                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle bg-gradient-primary text-white me-3">
                                <i class="bi bi-journal-text fs-3"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-muted">Borang</h6>
                                <h4 class="mb-0 fw-bold">{{ $totalBorang }}</h4>
                            </div>
                        </div>
                        <small class="text-secondary mt-3">Subkriteria yang masuk</small>
                    </div>
                </div>
            </div>
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
          </div>
        </div>

        <!-- Borang Section -->
        <div class="content mt-4 fade-in-content" id="borangContent" style="display: none;">
            @include('reviewer.manajemen-borang-reviewer')
        </div>
      </main>
    </div>
  </div>
  <script src="assets/js/reviewer.js"></script>
</body>

