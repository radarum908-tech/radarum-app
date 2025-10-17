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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session('error') }}',
        showConfirmButton: true
    });
</script>
@endif
<body>
    <div class="container my-4">
        <h4 class="mb-4 text-primary"><i class="bi bi-journal-check me-2"></i> Form Pengisian Instrumen Penilaian Kampus Tangguh</h4>

        <form id="formPengisian" method="POST" action="{{ route('form.submit') }}">
            @csrf
            <div class="card shadow-sm p-4 mb-4">
                <!-- Nama Kampus -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Kampus</label>
                    <input type="text" class="form-control bg-light" name="nama_kampus" value="{{ Auth::user()->nama_kampus }}" readonly>
                </div>

                <!-- Nama Pengisi -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Pengisi</label>
                    <input type="text" class="form-control bg-light" name="nama_pengisi" required placeholder="Nama Lengkap" value="{{ Auth::user()->koordinator_program }}" readonly>
                </div>

                <!-- Subindikator Wrapper -->
                <div id="subindikatorWrapper">
                    <div class="card border shadow-sm mb-3 p-3 subindikator-item">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pilar</label>
                                <select class="form-select pilar" name="pilar[]">
                                    <option selected disabled>-- Pilih Pilar --</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Kriteria</label>
                                <select class="form-select kriteria" disabled name="kriteria[]">
                                    <option selected disabled>-- Pilih Kriteria --</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Sub Kriteria</label>
                                <select class="form-select subkriteria" disabled name="sub_kriteria[]">
                                    <option selected disabled>-- Pilih Sub Kriteria --</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Indikator Penilaian</label>
                                <select class="form-select indikatorpenilaian" disabled name="indikator_penilaian[]">
                                    <option selected disabled>-- Pilih Indikator Penilaian --</option>
                                </select>
                            </div>

                            <div class="col-12 evidenceWrapper" style="display:none;">
                                <label class="form-label fw-semibold">Link Evidence</label>
                                <input type="url" class="form-control evidenceLink" placeholder="https://drive.google.com/..." name="link_evidence[]">
                            </div>

                            <div class="col-12 catatanWrapper" style="display:none;">
                                <label class="form-label fw-semibold">Catatan Tambahan</label>
                                <textarea class="form-control catatan" rows="3" placeholder="(Opsional) Tambahkan penjelasan..." name="catatan_tambahan[]"></textarea>
                            </div>

                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-danger btn-sm mt-2 remove-subindikator">
                                    <i class="bi bi-trash me-1"></i> Hapus Sub-Indikator
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-send me-1"></i> Kirim Form</button>
                    <button id="addSubindikator" type="button" class="btn btn-secondary"><i class="bi bi-plus-circle me-1"></i> Tambah Sub Indikator</button>
                </div>
            </div>
        </form>

        <!-- Template Subindikator -->
        <template id="subindikatorTemplate">
            <div class="card border shadow-sm mb-3 p-3 subindikator-item">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Pilar</label>
                        <select class="form-select pilar" required name="pilar[]">
                            <option selected disabled>-- Pilih Pilar --</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kriteria</label>
                        <select class="form-select kriteria" disabled required name="kriteria[]">
                            <option selected disabled>-- Pilih Kriteria --</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Sub Kriteria</label>
                        <select class="form-select subkriteria" disabled required name="sub_kriteria[]">
                            <option selected disabled>-- Pilih Sub Kriteria --</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Indikator Penilaian</label>
                        <select class="form-select indikatorpenilaian" disabled required name="indikator_penilaian[]">
                            <option selected disabled>-- Pilih Indikator Penilaian --</option>
                        </select>
                    </div>
                    <div class="col-12 evidenceWrapper" style="display:none;">
                        <label class="form-label fw-semibold">Link Evidence</label>
                        <input type="url" class="form-control evidenceLink" placeholder="https://drive.google.com/..." name="link_evidence[]">
                    </div>
                    <div class="col-12 catatanWrapper" style="display:none;">
                        <label class="form-label fw-semibold">Catatan Tambahan</label>
                        <textarea class="form-control catatan" rows="3" placeholder="(Opsional) Tambahkan penjelasan..." name="catatan_tambahan[]"></textarea>
                    </div>
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-subindikator">
                            <i class="bi bi-trash me-1"></i> Hapus Sub-Indikator
                        </button>
                    </div>
                </div>
            </div>
        </template>

        <script src="assets/js/kampus.js"></script>
    </div>
</body>