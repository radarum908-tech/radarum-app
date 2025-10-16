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


<h4>Riwayat Instrumen Penilaian Kampus Tangguh</h4>

<div class="table-responsive mt-3">
    <table class="table table-hover table-bordered align-middle shadow-sm rounded">
        <thead class="table-dark text-center">
            <tr>
                <th style="width: 60px;">No</th>
                <th style="width: 180px;">Nama Kampus</th>
                <th style="width: 160px;">Nama Pengisi</th>
                <th style="width: 120px;">Pilar</th>
                <th style="width: 160px;">Kriteria</th>
                <th style="width: 160px;">Sub Kriteria</th>
                <th style="width: 220px;">Indikator Penilaian</th>
                <th style="width: 150px;">Link Evidence</th>
                <th style="width: 200px;">Catatan Tambahan</th>
                <th style="width: 100px;">Nilai</th>
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
                        <td rowspan="{{ $rowspanKampus[$keyKampus] }}" class="fw-semibold text-primary">
                            {{ $borang->nama_kampus }}
                        </td>
                        @php $kampusPrinted[] = $keyKampus; @endphp
                    @endif

                    {{-- Nama Pengisi --}}
                    @if (!in_array($keyPengisi, $pengisiPrinted))
                        <td rowspan="{{ $rowspanPengisi[$keyPengisi] }}">
                            <span class="badge bg-light text-dark border shadow-sm">
                                {{ $borang->nama_pengisi }}
                            </span>
                        </td>
                        @php $pengisiPrinted[] = $keyPengisi; @endphp
                    @endif

                    {{-- Pilar --}}
                    @if (!in_array($keyPilar, $pilarPrinted))
                        <td rowspan="{{ $rowspanPilar[$keyPilar] }}" class="fw-semibold text-success">
                            {{ $borang->pilar }}
                        </td>
                        @php $pilarPrinted[] = $keyPilar; @endphp
                    @endif

                    {{-- Kriteria --}}
                    @if (!in_array($keyKriteria, $kriteriaPrinted))
                        <td rowspan="{{ $rowspanKriteria[$keyKriteria] }}" class="fw-semibold">
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
                    <td class="text-center">
                        @if ($borang->nilai !== null)
                            <span class="badge bg-success">{{ $borang->nilai }}</span>
                        @else
                            <span class="badge bg-secondary">Belum dinilai</span>
                        @endif
                    </td>
                    <td>
                        @if ($borang->catatan_penilai)
                            <span class="badge bg-info text-dark">{{ $borang->catatan_penilai }}</span>
                        @else
                            <span class="badge bg-warning text-dark">Belum ada catatan</span>
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
</div>
<script src="assets/js/kampus.js"></script>
</body>





