<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviewer | RADAR UM</title>
  <link href="{{ asset('assets/img/radar.png') }}" rel="icon">



  <!-- Vendor CSS Files -->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/reviewer.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif
<div id="page-wrapper">
    <div class="container-fluid py-4">
        <div class="card shadow-lg border-0">
            <div class="card-header py-3 d-flex justify-content-between align-items-center bg-primary text-white">
                <h4 class="m-0 fw-bold">
                    <i class="bi bi-journal-check me-2"></i> Penilaian Borang - {{ $user->nama_kampus }}
                </h4>
                <a href="{{ url('/reviewer') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body fade-in-content">
                    <form action="{{ route('reviewer.beri-nilai') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="table table-hover table-bordered align-middle rounded shadow-sm overflow-hidden">
                            <thead class="table-dark text-center align-middle">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th style="width: 150px;">Nama Kampus</th>
                                    <th style="width: 150px;">Nama Pengisi</th>
                                    <th style="width: 120px;">Pilar</th>
                                    <th style="width: 150px;">Kriteria</th>
                                    <th style="width: 150px;">Sub Kriteria</th>
                                    <th style="width: 200px;">Indikator Penilaian</th>
                                    <th style="width: 200px;">Link Evidence</th>
                                    <th style="width: 200px;">Catatan Tambahan</th>
                                    <th style="width: 80px;">Nilai</th>
                                    <th style="width: 200px;">Catatan Penilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $rowspanKampus = [];
                                    $rowspanPengisi = [];
                                    $rowspanPilar = [];
                                    $rowspanKriteria = [];

                                    foreach ($borangs as $borang) {
                                        $keyKampus = $borang->nama_kampus . '||' . $borang->kriteria;
                                        $rowspanKampus[$keyKampus] = ($rowspanKampus[$keyKampus] ?? 0) + 1;

                                        $keyPengisi = $borang->nama_kampus . '||' . $borang->nama_pengisi . '||' . $borang->kriteria;
                                        $rowspanPengisi[$keyPengisi] = ($rowspanPengisi[$keyPengisi] ?? 0) + 1;

                                        $keyPilar = $borang->nama_kampus . '||' . $borang->pilar . '||' . $borang->kriteria;
                                        $rowspanPilar[$keyPilar] = ($rowspanPilar[$keyPilar] ?? 0) + 1;

                                        $keyKriteria = $borang->nama_kampus . '||' . $borang->nama_pengisi . '||' . $borang->pilar . '||' . $borang->kriteria;
                                        $rowspanKriteria[$keyKriteria] = ($rowspanKriteria[$keyKriteria] ?? 0) + 1;
                                    }

                                    $kampusPrinted = [];
                                    $pengisiPrinted = [];
                                    $pilarPrinted = [];
                                    $kriteriaPrinted = [];
                                    $rowNumber = 1;
                                @endphp
                                @forelse ($borangs as $index => $borang)
                                    @php
                                        $keyKampus = $borang->nama_kampus . '||' . $borang->kriteria;
                                        $keyPengisi = $borang->nama_kampus . '||' . $borang->nama_pengisi . '||' . $borang->kriteria;
                                        $keyPilar = $borang->nama_kampus . '||' . $borang->pilar . '||' . $borang->kriteria;
                                        $keyKriteria = $borang->nama_kampus . '||' . $borang->nama_pengisi . '||' . $borang->pilar . '||' . $borang->kriteria;
                                    @endphp
                                    <tr>
                                        {{-- No --}}
                                        @if (!in_array($keyKriteria, $kriteriaPrinted))
                                            <td rowspan="{{ $rowspanKriteria[$keyKriteria] }}" class="text-center fw-bold">
                                                {{ $rowNumber++ }}
                                            </td>
                                        @endif

                                        {{-- Nama Kampus --}}
                                        @if (!in_array($keyKampus, $kampusPrinted))
                                            <td rowspan="{{ $rowspanKampus[$keyKampus] }}" class="fw-semibold">
                                                {{ $borang->nama_kampus }}
                                            </td>
                                            @php $kampusPrinted[] = $keyKampus; @endphp
                                        @endif

                                        {{-- Nama Pengisi --}}
                                        @if (!in_array($keyPengisi, $pengisiPrinted))
                                            <td rowspan="{{ $rowspanPengisi[$keyPengisi] }}">
                                                <span class="badge bg-light text-dark border">
                                                    {{ $borang->nama_pengisi }}
                                                </span>
                                            </td>
                                            @php $pengisiPrinted[] = $keyPengisi; @endphp
                                        @endif

                                        {{-- Pilar --}}
                                        @if (!in_array($keyPilar, $pilarPrinted))
                                            <td rowspan="{{ $rowspanPilar[$keyPilar] }}">
                                                {{ $borang->pilar }}
                                            </td>
                                            @php $pilarPrinted[] = $keyPilar; @endphp
                                        @endif

                                        {{-- Kriteria --}}
                                        @if (!in_array($keyKriteria, $kriteriaPrinted))
                                            <td rowspan="{{ $rowspanKriteria[$keyKriteria] }}">
                                                {{ $borang->kriteria }}
                                            </td>
                                            @php $kriteriaPrinted[] = $keyKriteria; @endphp
                                        @endif

                                        <td>{{ $borang->sub_kriteria }}</td>
                                        <td>{{ $borang->indikator_penilaian }}</td>
                                        <td class="text-center">
                                            @if ($borang->link_evidence)
                                                <a href="{{ $borang->link_evidence }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                    <i class="bi bi-box-arrow-up-right"></i> Lihat
                                                </a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $borang->catatan_tambahan ?? '-' }}</td>
                                        <td>
                                            @if (in_array(auth()->user()->role, ['admin','reviewer']))
                                                <input type="hidden" name="borang_id[]" value="{{ $borang->id }}">
                                                <input type="number" name="nilai[]" class="form-control form-control-sm"
                                                    style="width: 90px" value="{{ $borang->nilai }}" placeholder="Nilai" min="0" max="100">
                                            @else
                                                @if ($borang->nilai !== null)
                                                    <span class="badge bg-success">{{ $borang->nilai }}</span>
                                                @else
                                                    <span class="badge bg-secondary">Belum dinilai</span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if (in_array(auth()->user()->role, ['admin','reviewer']))
                                                <input type="text" name="catatan_penilai[]" class="form-control form-control-sm"
                                                    value="{{ $borang->catatan_penilai }}" placeholder="Catatan">
                                            @else
                                                @if ($borang->catatan_penilai)
                                                    <span class="badge bg-info text-dark">{{ $borang->catatan_penilai }}</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Belum ada catatan</span>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center text-muted">🚫 Belum ada data borang.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="bi bi-save"></i> Simpan Semua Nilai
                        </button>
                    </form>

                    <form id="downloadPdfForm" action="{{ route('reviewer.unduh-borang', $user->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="chart_image" id="chart_image">
                        <button type="submit" class="btn btn-success mt-3">
                            <i class="bi bi-download"></i> Unduh Borang Dinilai
                        </button>
                    </form>

                    <hr>

                    <!-- Chart preview -->
                    <h5 class="mt-4 text-primary fw-bold">
                        <i class="bi bi-bar-chart-fill me-1"></i> Rekap Nilai per Pilar
                    </h5>
                    <canvas id="chartPilar" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('chartPilar').getContext('2d');

    // Simpan chart ke variabel
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($rekapPilar->keys()) !!},
            datasets: [{
                label: 'Rata-rata Nilai',
                data: {!! json_encode($rekapPilar->values()) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            animation: {
                onComplete: function() {
                    // ambil chart sebagai image
                    document.getElementById('chart_image').value = ctx.canvas.toDataURL("image/png");
                }
            },
            scales: {
                y: { beginAtZero: true, max: 100 }
            }
        }
    });
});
</script>

</body>
</html>
