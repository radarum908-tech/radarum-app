<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampus | RADAR UM</title>
    <link href="assets/img/radar.png" rel="icon">
    <link href="assets/img/radar.png" rel="radar">
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
            <nav class="col-md-2 d-none d-md-block sidebar p-0">
                <div class="position-sticky">
                    <div class="sidebar-header p-3 border-bottom">
                        <h4 class="text-primary">RADAR UM</h4>
                    </div>
                    <ul class="nav flex-column p-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" id="menu-dashboard"><i class="bi bi-house-door me-2"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="menu-borang"><i class="bi bi-ui-checks me-2"></i> Pengisian Borang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="menu-riwayat"><i class="bi bi-ui-checks me-2"></i> Riwayat Borang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-ui-checks me-2"></i>Profil</a>
                        </li>

                    </ul>
                    <div class="d-flex justify-content-center align-items-center" style="height: 20vh;">
                        <form action="/logout/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
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
                    <img src="https://via.placeholder.com/30" class="rounded-circle me-2">
                    <span>{{ Auth::user()->nama_kampus }}</span>
                    </div>
                </div>

                <!-- Dashboard Section -->
                <div class="content mt-4 fade-in-content" id="dashboardContent">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title mb-0">Borang</h6>
                                            <small class="text-muted">Subkriteria yang masuk</small>
                                        </div>
                                        <i class="bi bi-briefcase-fill text-primary card-icon"></i>
                                        </div>
                                    <h4 class="mt-3">{{ $totalBorang }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title mb-0">Kampus</h6>
                                            <small class="text-muted">Partisipasi Kampus</small>
                                        </div>
                                        <i class="bi bi-briefcase-fill text-purple card-icon"></i>
                                    </div>
                                    <h4 class="mt-3">{{ $totalKampus }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="card-title mb-0">Kampus</h6>
                                            <small class="text-muted">Sudah Mengirim Borang</small>
                                        </div>
                                        <i class="bi bi-briefcase-fill text-danger card-icon"></i>
                                        </div>
                                    <h4 class="mt-3">{{ $kampusList->count() }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h5>Progress Pengisian Borang</h5>
                            <div class="progress" style="height: 25px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated
                                    @if($progress == 100) bg-success
                                    @elseif($progress >= 50) bg-info
                                    @else bg-danger
                                    @endif"
                                    role="progressbar"
                                    style="width: {{ $progress }}%;"
                                    aria-valuenow="{{ $progress }}"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                    @if($progress > 0)
                                        {{ $progress }}%
                                    @endif
                                </div>
                            </div>
                            <p class="mt-2 fw-bold">
                                Status: {{ $status }}
                                @if($progress == 0) (0%) @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Borang Section -->
                <div class="container mt-4 fade-in-content" id="borangContent" style="display: none;">
                    <h4>Form Pengisian Instrumen Penilaian Kampus Tangguh</h4>

                    <form id="formPengisian" method="POST" action="{{ route('form.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Kampus</label>
                            <input type="text" class="form-control" name="nama_kampus" value="{{ Auth::user()->nama_kampus }}" readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Pengisi</label>
                            <input type="text" class="form-control" name="nama_pengisi" required placeholder="Nama Lengkap">
                        </div>

                        <div id="subindikatorWrapper">
                            <div class="card border mb-3 p-3 subindikator-item">
                                <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pilar</label>
                                    <select class="form-select pilar" name="pilar[]">
                                    <option selected disabled>-- Pilih Pilar --</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kriteria</label>
                                    <select class="form-select kriteria" disabled name="kriteria[]">
                                    <option selected disabled>-- Pilih Kriteria --</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sub Kriteria</label>
                                    <select class="form-select subkriteria" disabled name="sub_kriteria[]">
                                    <option selected disabled>-- Pilih Sub Kriteria --</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Indikator Penilaian</label>
                                    <select class="form-select indikatorpenilaian" disabled name="indikator_penilaian[]">
                                    <option selected disabled>-- Pilih Indikator Penilaian --</option>
                                    </select>
                                </div>

                                <div class="mb-3 evidenceWrapper" style="display:none;">
                                <label class="form-label">Link Evidence</label>
                                <input type="url" class="form-control evidenceLink" placeholder="https://drive.google.com/..." name="link_evidence[]">
                                </div>

                                <div class="mb-3 catatanWrapper" style="display:none;">
                                <label class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control catatan" rows="3" placeholder="(Opsional) Tambahkan penjelasan..." name="catatan_tambahan[]"></textarea>
                                </div>

                                <div class="col-12">
                                <button type="button" class="btn btn-danger btn-sm remove-subindikator">🗑 Hapus Sub-Indikator</button>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">📤 Kirim Form</button>
                        </div>
                    </form>

                    <div class="d-flex gap-2">
                        <button id="addSubindikator" class="btn btn-secondary">+ Tambah Sub Indikator</button>
                    </div>

                    <template id="subindikatorTemplate">
                        <div class="card border mb-3 p-3 subindikator-item">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pilar</label>
                                    <select class="form-select pilar" required name="pilar[]">
                                    <option selected disabled>-- Pilih Pilar --</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Kriteria</label>
                                    <select class="form-select kriteria" disabled required name="kriteria[]">
                                    <option selected disabled>-- Pilih Kriteria --</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sub Kriteria</label>
                                    <select class="form-select subkriteria"  disabled required name="sub_kriteria[]">
                                    <option selected disabled >-- Pilih Sub Kriteria --</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Indikator Penilaian</label>
                                    <select class="form-select indikatorpenilaian" disabled required name="indikator_penilaian[]">
                                    <option selected disabled>-- Pilih Indikator Penilaian --</option>
                                    </select>
                                </div>

                                <div class="mb-3 evidenceWrapper" style="display:none;">
                                    <label class="form-label">Link Evidence</label>
                                    <input type="url" class="form-control evidenceLink" placeholder="https://drive.google.com/..." name="link_evidence[]">
                                </div>

                                <div class="mb-3 catatanWrapper" style="display:none;">
                                    <label class="form-label">Catatan Tambahan</label>
                                    <textarea class="form-control catatan" rows="3" placeholder="(Opsional) Tambahkan penjelasan..." name="catatan_tambahan[]"></textarea>
                                </div>

                                <div class="col-12">
                                    <button type="button" class="btn btn-danger btn-sm remove-subindikator">🗑 Hapus Sub-Indikator</button>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Riwayat Section -->
                <div class="container mt-4 fade-in-content" id="riwayatContent" style="display: none;">
                    <h4>Riwayat Instrumen Penilaian Kampus Tangguh</h4>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kampus</th>
                                    <th>Nama Pengisi</th>
                                    <th>Pilar</th>
                                    <th>Kriteria</th>
                                    <th>Sub Kriteria</th>
                                    <th>Indikator Penilaian</th>
                                    <th>Link Evidence</th>
                                    <th>Catatan Tambahan</th>
                                    <th>Nilai</th>
                                    <th>Catatan Penilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $rowspanKampus = [];
                                $rowspanPengisi = [];
                                $rowspanPilar = [];
                                $rowspanKriteria = [];

                                foreach ($borangs as $borang) {
                                    // Kampus dikunci per kampus + kriteria
                                    $keyKampus = $borang->nama_kampus . '||' . $borang->kriteria;
                                    $rowspanKampus[$keyKampus] = ($rowspanKampus[$keyKampus] ?? 0) + 1;

                                    // Pengisi dikunci per kampus + pengisi + kriteria
                                    $keyPengisi = $borang->nama_kampus . '||' . $borang->nama_pengisi . '||' . $borang->kriteria;
                                    $rowspanPengisi[$keyPengisi] = ($rowspanPengisi[$keyPengisi] ?? 0) + 1;

                                    // Pilar dikunci per kampus + pilar
                                    $keyPilar = $borang->nama_kampus . '||' . $borang->pilar . '||' . $borang->kriteria;
                                    $rowspanPilar[$keyPilar] = ($rowspanPilar[$keyPilar] ?? 0) + 1;

                                    // Kriteria dikunci per kampus + pengisi + pilar + kriteria
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
                                {{-- No: satu nomor per kriteria --}}
                                @if (!in_array($keyKriteria, $kriteriaPrinted))
                                    <td rowspan="{{ $rowspanKriteria[$keyKriteria] }}" class="text-center">{{ $rowNumber++ }}</td>
                                @endif

                                {{-- Nama Kampus: merge hanya kalau keyKampus baru --}}
                                @if (!in_array($keyKampus, $kampusPrinted))
                                    <td rowspan="{{ $rowspanKampus[$keyKampus] }}">{{ $borang->nama_kampus }}</td>
                                    @php $kampusPrinted[] = $keyKampus; @endphp
                                @endif

                                {{-- Nama Pengisi: merge hanya kalau keyPengisi baru --}}
                                @if (!in_array($keyPengisi, $pengisiPrinted))
                                    <td rowspan="{{ $rowspanPengisi[$keyPengisi] }}">{{ $borang->nama_pengisi }}</td>
                                    @php $pengisiPrinted[] = $keyPengisi; @endphp
                                @endif

                                {{-- Pilar --}}
                                @if (!in_array($keyPilar, $pilarPrinted))
                                    <td rowspan="{{ $rowspanPilar[$keyPilar] }}">{{ $borang->pilar }}</td>
                                    @php $pilarPrinted[] = $keyPilar; @endphp
                                @endif

                                {{-- Kriteria --}}
                                @if (!in_array($keyKriteria, $kriteriaPrinted))
                                    <td rowspan="{{ $rowspanKriteria[$keyKriteria] }}">{{ $borang->kriteria }}</td>
                                    @php $kriteriaPrinted[] = $keyKriteria; @endphp
                                @endif

                                <td>{{ $borang->sub_kriteria }}</td>
                                <td>{{ $borang->indikator_penilaian }}</td>
                                <td>
                                    @if ($borang->link_evidence)
                                        <a href="{{ $borang->link_evidence }}" target="_blank">Lihat</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $borang->catatan_tambahan ?? '-' }}</td>
                                <td>
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
                                <td colspan="9" class="text-center">Belum ada data borang.</td>
                            </tr>
                        @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="assets/js/kampus.js"></script>
</body>

