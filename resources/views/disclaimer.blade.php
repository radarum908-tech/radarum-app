<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Disclaimer | RADAR UM</title>

  <!-- Favicons -->
  <link href="{{ asset('assets/img/radar.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #f6f8fb 0%, #eef2f7 100%);
      font-family: 'Poppins', sans-serif;
      color: #333;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    nav.navbar {
      background: #0d6efd;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    nav .navbar-brand {
      font-weight: 600;
      color: #fff;
      letter-spacing: 0.5px;
    }

    nav .navbar-brand:hover {
      color: #e0e0e0;
    }

    .disclaimer-section {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 60px 15px;
    }

    .disclaimer-card {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.08);
      padding: 2.5rem 3rem;
      max-width: 900px;
      width: 100%;
      transition: transform 0.3s ease;
    }

    .disclaimer-card:hover {
      transform: translateY(-3px);
    }

    .section-title {
      font-weight: 600;
      font-size: 1.25rem;
      color: #55a630;
      margin-top: 1.5rem;
      border-left: 4px solid #55a630;
      padding-left: 12px;
    }

    footer {
      text-align: center;
      padding: 1.5rem 0;
      font-size: 0.9rem;
      color: #666;
    }

    .btn-dashboard {
      background-color: #55a630;
      border: none;
      color: #fff;
      padding: 10px 24px;
      border-radius: 8px;
      margin-top: 30px;
      transition: 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-dashboard:hover {
      background-color: #0849b5;
      transform: translateY(-2px);
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <i class="bi bi-activity"></i> RADAR UM
      </a>
    </div>
  </nav>

  <!-- Content -->
  <section class="disclaimer-section" data-aos="fade-up">
    <div class="disclaimer-card">
      <h2 class="text-center mb-4">
        <i class="bi bi-shield-check text-primary"></i> Disclaimer & Kebijakan
      </h2>

      <p class="text-muted text-center mb-4">
        Diperbarui terakhir: <strong>10 Oktober 2025</strong><br>
        Situs dan dashboard RADAR UM merupakan sistem informasi evaluatif untuk mendukung kampus tangguh dan berdaya saing.
      </p>

      <div>
        <h5 class="section-title">Tujuan & Cakupan</h5>
        <p>
          Situs RADAR disediakan untuk tujuan informasi dan evaluasi ketangguhan kampus.
          Hasil pemeringkatan dimaksudkan sebagai informasi berbasis indikator, bukan sebagai satu-satunya dasar pengambilan keputusan strategis institusi.
        </p>

        <h5 class="section-title">Metodologi, Perubahan, & Transparansi</h5>
        <p>
          RADAR menggunakan kuesioner berbukti, pembobotan indikator, serta analisis terstruktur pada lima pilar ketangguhan.
          Prosesnya mencakup verifikasi dan validasi data sebelum hasil dipublikasikan.
          Metodologi dapat diperbarui seiring perkembangan data, dan setiap perubahan signifikan akan diinformasikan secara terbuka.
        </p>

        <h5 class="section-title">Sumber Data, Verifikasi, & Batasan Akurasi</h5>
        <p>
          Data yang digunakan berasal dari laporan institusi dan sumber pihak ketiga tepercaya.
          RADAR melakukan pemeriksaan kelengkapan, konsistensi, dan validasi, namun tanggung jawab atas kebenaran materiil tetap pada pihak pengunggah.
        </p>

        <h5 class="section-title">Objektivitas & Integritas Penilaian</h5>
        <p>
          Tim penilai bekerja berdasarkan indikator terstandar dan bukti yang dapat diaudit,
          dengan pemisahan fungsi antara dukungan teknis dan penilaian untuk menjaga objektivitas.
        </p>

        <h5 class="section-title">Keamanan Informasi</h5>
        <p>
          RADAR menerapkan kontrol teknis dan pengujian berkala untuk menjaga keamanan data.
          Namun, tidak ada sistem yang benar-benar bebas dari risiko.
        </p>

        <h5 class="section-title">Perubahan Kebijakan</h5>
        <p>
          Kebijakan ini dapat diperbarui sewaktu-waktu.
          Dengan terus menggunakan situs RADAR setelah pembaruan, Anda dianggap menyetujui versi terbaru.
        </p>

        <h5 class="section-title">Kontak</h5>
        <p>
          Permintaan terkait data pribadi, keamanan, atau keberatan skor dapat dikirimkan ke
          <a href="mailto:radar@um.ac.id" class="text-decoration-none text-primary fw-semibold">
            email resmi RADAR
          </a>.
        </p>

        <div class="text-center">
          <a href="{{ url('/') }}" class="btn-dashboard">
            <i class="bi bi-arrow-left-circle"></i> Kembali ke Dashboard
          </a>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 RADAR Universitas Negeri Malang. All Rights Reserved.</p>
  </footer>

  <!-- Vendor JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true
    });
  </script>
</body>
</html>
