<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | RADAR UM</title>
  <link href="{{ asset('assets/img/radar.png') }}" rel="icon">

  <!-- Vendor CSS Files -->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body >
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bi bi-building me-2"></i>Pemeringkatan Kampus Tangguh</h5>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                  <table class="table table-hover align-middle">
                    <thead class="table-light text-center">
                      <tr>
                        <th scope="col">Ranking</th>
                        <th scope="col">Nama Kampus</th>
                        <th scope="col">Nilai Akhir</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach($users as $i => $user)
                      <tr>
                        <td>
                          <span class="badge
                            @if($i == 0) bg-warning text-dark
                            @elseif($i == 1) bg-secondary
                            @elseif($i == 2) bg-danger
                            @else bg-dark
                            @endif
                            px-3 py-2 rounded-pill">
                            {{ $i + 1 }}
                          </span>
                        </td>
                        <td class="fw-semibold text-start">
                          <i class="bi bi-mortarboard-fill text-primary me-2"></i>
                          {{ $user->nama_kampus }}
                        </td>
                        <td>
                          <span class="badge bg-success px-3 py-2 rounded-pill">
                            {{ number_format($user->avg_pilar_total, 2) }}
                          </span>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="d-flex mt-5 ">
                    <a href="{{ route('ranking-pdf') }}" target="_blank" class="btn btn-danger">
                      <i class="bi bi-file-earmark-pdf-fill me-2"></i> Download PDF
                    </a>
                </div>
        </div>
    </div>
</body>