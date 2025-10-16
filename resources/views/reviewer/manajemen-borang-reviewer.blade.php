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
  <link rel="stylesheet" href="">
  <link href="assets/css/reviewer.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-light">
    <div class="container py-5">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="bi bi-building me-2"></i> Daftar Kampus yang Sudah Mengisi Borang</h5>
          <span class="badge bg-light text-primary px-3 py-2 fw-semibold">
            {{ count($kampusList) }} Kampus
          </span>
        </div>

        <div class="card-body p-4">
          <div class="table-responsive">
            <table class="table align-middle table-hover">
              <thead class="table-primary text-center">
                <tr>
                  <th>No</th>
                  <th>Nama Kampus</th>
                  <th>Tanggal Pengisian</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="text-center">
                @forelse ($kampusList as $index => $item)
                <tr>
                  <td class="fw-semibold">{{ $index + 1 }}</td>
                  <td class="text-start">
                    <i class="bi bi-mortarboard-fill text-primary me-2"></i>
                    {{ $item->nama_kampus }}
                  </td>
                  <td>
                    <span class="badge bg-secondary-subtle text-dark px-3 py-2 rounded-pill shadow-sm">
                      {{ $item->created_at->format('d M Y') }}
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('reviewer.lihat-borang', $item->id) }}"
                      class="btn btn-outline-primary btn-sm rounded-pill px-3 d-flex align-items-center justify-content-center mx-auto"
                      title="Lihat Detail dan Beri Penilaian">
                      <i class="bi bi-check-circle-fill me-2"></i> Nilai Borang
                    </a>
                  </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                        <i class="bi bi-emoji-frown fs-3 d-block mb-2"></i>
                        Belum ada kampus yang mengisi borang
                    </td>
                </tr>
                @endforelse

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>

