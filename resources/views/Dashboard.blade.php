<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Radar UM | Resillience and Adaptive Assessment Ranking</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/radar.png" rel="icon">
  <link href="assets/img/radar.png" rel="radar">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="#" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/radar.png" alt="" class="me-5">
        <h1 class="sitename">R A D A R UM</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">BERANDA</a></li>
          <li><a href="#about">TENTANG</a></li>
          <li><a href="#features">PARTISIPASI</a></li>
          <li><a href="#portfolio">BERITA</a></li>
          <li><a href="/">TEMPLATE EVIDENCE</a></li>
          <li><a href="{{ route('disclaimer') }}">DISCLAIMER</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="cta-btn" href="/login">Kuisoner RADAR</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/univmalang.jpg" alt="" data-aos-delay="150" data-aos="fade-up">

      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100">R A D A R UM</h2>
        <p data-aos="fade-up" data-aos-delay="200">Resillience and Adaptive Assessment Ranking Universitas Negeri Malang</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#about" class="btn-get-started">Get Started</a>

        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">
          <div class="content col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Apa itu RADAR ?</h3>
            {{-- <img src="assets/img/radar.png" class="img-fluid rounded-4 mb-4" alt="" width="50%"> --}}
            <p>RADAR <b>(Resilience and Adaptive Assessment Ranking)</b> <b>merupakan sebuah
                program pemeringkatan yang dikembangkan oleh Universitas Negeri Malang untuk
                menilai tingkat ketahanan dan kapabilitas adaptif berbagai institusi dalam menghadapi
                kebencanaan alam maupun non-alam.</b></p>
                <br>
                <p>
                    Program ini dirancang untuk memberikan
                    gambaran tentang sejauh mana respons darurat, pemulihan, mitigasi risiko, dan
                     pendidikan yang telah diimplementasikan dan diintegrasikan dalam manajemen
                     kebencanaan.
                </p>
            <h3>
               Siapa yang berpartisipasi ?
            </h3>
            <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Mendorong peningkatan kapasitas institusi untuk manajemen bencana melalui
                    pemantauan berkelanjutan</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Membantu pengambil kebijakan dalam menetapkan prioritas intervensi mitigasi dan
                    adaptasi</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Menyediakan alat penilaian mandiri bagi pemerintah daerah, perguruan tinggi, dan
                    lembaga terkait
                    </span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Meningkatkan kesadaran publik dan akademik terhadap pentingnya ketahanan
                    bencana
                    </span></li>
              </ul>
            <h3>
                Siapa saja Tim RADAR ?
            </h3>
            <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Program RADAR dikelola oleh tim dari <b>Universitas Negeri Malang</b>, tepatnya di bawah <b>Pusat Lingkungan Mitigasi Kebencanaan (PLMK)</b></span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>MTim RADAR ini berisi orang-orang dari berbagai bidang ilmu, seperti:

                   <b> Geografi,

                    Ilmu Lingkungan,

                    Perencanaan Wilayah,

                    Manajemen Bencana,

                    Teknik Sipil,

                    Sistem Informasi,

                    Statistik</b>,</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Karena timnya lintas disiplin, mereka bisa melihat masalah dari banyak sudut pandang dan nggak cuma fokus dari satu sisi saja.
                    </span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Pendekatan yang digunakan jadi lebih <b>menyeluruh dan relevan</b>, supaya hasil penilaian RADAR benar-benar sesuai dengan tantangan nyata yang dihadapi kampus-kampus dalam membangun ketangguhan dan kemampuan beradaptasi terhadap bencana.
                    </span></li>
              </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
             <h3>
                Apa Tujuan RADAR ?
             </h3>
             <p>
                RADAR memiliki tujuan seperti berikut:
             </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Mendorong peningkatan kapasitas institusi untuk manajemen bencana melalui
                    pemantauan berkelanjutan..</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Membantu pengambil kebijakan dalam menetapkan prioritas intervensi mitigasi dan
                    adaptasi.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Menyediakan alat penilaian mandiri bagi pemerintah daerah, perguruan tinggi, dan
                    lembaga terkait.
                    </span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Meningkatkan kesadaran publik dan akademik terhadap pentingnya ketahanan
                    bencana.
                    </span></li>
              </ul>
              <div class="position-relative mt-4">
                  <img src="assets/img/Dok/dok13.jpg" class="img-fluid rounded-4" alt="">
              </div>
              <br>
              <span><h3>
                Apa Manfaat RADAR ?
              </h3>
              <p>
                Perguruan tinggi yang mengikuti sistem pemeringkatan RADAR (Resilience and
                Adaptive Assessment Ranking) dengan menyampaikan data ketahanan dan adaptasinya
                akan memperoleh sejumlah manfaat berikut:
              </p>
              </span>
              <br>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Peningkatan kapasitas adaptif dan ketahanan institusi</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Pengakuan dan visibilitas institusional</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>MMendorong perubahan aksi nyata untuk ketangguhan</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Fasilitas jejaring dan kolaborasi </span></li>
                <li><i class ="bi bi-check-circle-fill"></i><span>Pengembangan kebijakan dan strategi yang lebih terarah</span></li>
                <li><i class ="bi bi-check-circle-fill"></i><span>Meningkatkan citra institusi dan kepercayaan pemangku kepentingan</span></li>
              </ul>
            </div>
        </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <div class="container mt-3 section-title" data-aos="fade-up">
        <p>Mitra Kolaborasi Radar</p>
      </div><!-- End Section Title -->

      <div class="d-flex justify-content-center gap-4 flex-wrap">

        <!-- Card 1 -->
        <div class="card text-center shadow rounded-4 border-0 p-3"
             style="width: 300px; min-height: 350px;"
             data-aos="fade-up" data-aos-delay="0">
          <div class="d-flex align-items-center justify-content-center" style="height: 150px;">
            <img src="assets/img/utm.png" alt="UTM Logo" class="img-fluid" style="max-height: 100px;">
          </div>
          <div class="card-body px-3">
            <p class="card-text fw-medium" style="font-size: 15px;">
              Malaysia Japan International Institute of Technology | UTM
            </p>
            <button class="btn btn-primary"><a href="https://mjiit.utm.my/" class="text-white text-decoration-none" target="_blank">Selengkapnya</a></button>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card text-center shadow rounded-4 border-0 p-3"
             style="width: 300px; min-height: 350px;"
             data-aos="fade-up" data-aos-delay="100">
          <div class="d-flex align-items-center justify-content-center" style="height: 150px;">
            <img src="assets/img/kitayushu.png" alt="Kitakyushu Logo" class="img-fluid" style="max-height: 100px;">
          </div>
          <div class="card-body px-3">
            <p class="card-text fw-medium" style="font-size: 15px;">
              University of Kitakyushu | Japan
            </p>
            <button class="btn btn-primary mt-4"><a href="https://www.kitakyu-u.ac.jp/lang-en/" class="text-white text-decoration-none" target="_blank">
                Selengkapnya
            </a></button>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card text-center shadow rounded-4 border-0 p-3"
             style="width: 300px; min-height: 350px;"
             data-aos="fade-up" data-aos-delay="200">
          <div class="d-flex align-items-center justify-content-center" style="height: 150px;">
            <img src="assets/img/forum.png" alt="Forum PT PRB" class="img-fluid" style="max-height: 100px;">
          </div>
          <div class="card-body px-3">
            <p class="card-text fw-medium" style="font-size: 15px;">
              Forum Perguruan Tinggi untuk Pengurangan Risiko Bencana
            </p>
            <button class="btn btn-primary"><a href="https://fptprb.org/" class="text-white text-decoration-none" target="_blank">
                Selengkapnya
            </a></button>
          </div>
        </div>
      </div>

     <div class="container mt-3 section-title" data-aos="fade-up">
        <p>Bagaimana Perguruan Tinggi Berpartisipasi ?</p>
      </div><!-- End Section Title -->

    <section id="features" class="features section">

      <div class="container">

        <ul class="nav nav-tabs row  d-flex" data-aos="fade-up" data-aos-delay="100">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
              <i class="bi bi-binoculars"></i>
              <h4 class="d-none d-lg-block">Pendaftaran Institusi</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
              <i class="bi bi-box-seam"></i>
              <h4 class="d-none d-lg-block">Pengisian Instrumen Penilaian Berbasis Lima Pilar RADAR</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
              <i class="bi bi-brightness-high"></i>
              <h4 class="d-none d-lg-block">Verifikasi dan Validasi Data</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
              <i class="bi bi-command"></i>
              <h4 class="d-none d-lg-block">Analisis, Pemeringkatan dan Umpan Balik dan Rekomendasi Peningkatan</h4>
            </a>
          </li>
        </ul><!-- End Tab Nav -->

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Pendaftaran Institusi</h3>
                <p>
                  Langkah pertama adalah melakukan registrasi melalui laman resmi RADAR.
                  Langkah ini dilakukan oleh perwakilan resmi institusi, seperti dari unit penjaminan
                  mutu, pusta manajemen risiko, atau pimpinan perguruan tinggi. Beberapa data yang
                  harus disiapkan saat registrasi adalah sebagai berikut:
                </p>
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i>
                    <span>Profil singkat institusi (nama, alamat, status akreditasi, jumlah mahasiswa dan
                        dosen);</span>
                  </li>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Nama atau kontak PIC (person in charge) untuk kegiatan RADAR;</span>.</li>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Dokumen pendukung awal (jika diminta) seperti struktur organisasi kebijakan
                    dasar</span></li>
                </ul>
                <p>
                    Setelah proses ini selesai, institusi akan menerima akses menuju platform penilaian
                    RADAR.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working-1.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          {{-- Tab 2 --}}
          <div class="tab-pane fade" id="features-tab-2">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Pengisian Instrumen Penilaian Berbasis Lima Pilar RADAR</h3>
                <p>
                    Tahap inti partisipasi RADAR adalah pengisian instrumen penilaian yang
                    dirancang berdasarkan lima pilar utama. Masing-masing pilar memiliki indikator,
                    kriteria, dan bobot tertentu. Berikut rincian pilar tersebut:
                </p>
                <ol>
                    <li><strong>Pilar Struktural</strong>
                      <ol type="a">
                        <li>Infrastruktur Tangguh
                          <ul class="custom-list">
                            <li>Desain bangunan tahan gempa;</li>
                            <li>Jalur evakuasi dan titik kumpul;</li>
                            <li>Sistem peringatan dini dan pemadam kebakaran;</li>
                            <li>Aksesibilitas fasilitas darurat.</li>
                          </ul>
                        </li>
                        <li>kapasitas Sumber Daya
                            <ul class="custom-list ">
                                <li>Pelatihan tanggap darurat bagi dosen, staff, dan mahasiswa;</li>
                                <li>Pembentukan tim siaga bencana</li>
                                <li>Penyediaan peralatan dan logistik dasar(P3K,Genset,Alat komunikasi cadangan);</li>
                                <li>Kolaborasi dengan lembaga luar seperti BPBD,PMI, atau komunitas tanggap bencana.</li>
                            </ul>
                        </li>
                      </ol>
                    </li>
                  </ol>
                <ol start="2">
                    <li><b>Pilar Non Struktural</b>
                      <ol type="a">
                        <li>Penelitian dan Pengabdian Masyarakat
                          <ul class="custom-list">
                            <li>Penelitian dosen dan mahasiswa tentang risiko dan mitigasi bencana;;</li>
                            <li>Kegiatan pengabdian masyarakat yang terkait dengan edukasi
                                kebencanaan;</li>
                            <li>Integrasi topik resiliensi ke dalam kurikulum;</li>
                            <li>Kemitraan dengan pemerintah, LSM, dan komunitas lokal.</li>
                          </ul>
                        </li>
                        <li>Teknologi dan Digitalisasi
                            <ul class="custom-list ">
                                <li>Sistem informasi manajemen risiko bencana (SIM-RB);</li>
                                <li>Aplikasi pelaporan kejadian darurat berbasis web atau mobile</li>
                                <li>Pemanfaatan IoT atau snesor untuk pemantauan infrastruktur;</li>
                                <li>Digitalisasi SOP dan protokol kebencanaan.</li>
                            </ul>
                        </li>
                        <li>
                            Kebijakan dan Tata Kelola
                            <ul class="custom-list">
                                <li>Kebijakan formal tentang penanggulangan bencana di kampus;</li>
                                <li>SOP penanganan darurat;</li>
                                <li>Mekanisme koordinasi lintas unit kerja;</li>
                                <li>Ketersediaan rencana audit kebencanan.</li>
                            </ul>
                        </li>
                      </ol>
                    </li>
                  </ol>
                  <p>
                    Institusi wajib mengunggah bukti dokumentasi untuk setiap indikator, seperti foto
                    fasilitas, dokumen SOP, laporan kegiatan, atau tautan kebijakan resmi.Untuk template bisa diunduh melalui informasi diatas
                  </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2">
                <img src="assets/img/working-2.jpg" alt="" class="img-fluid">

              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-3">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Verifikasi dan Validasi Data</h3>
                <p>
                    Setelah instrumen penilaian dikirimkan, tim RADAR akan melakukan
                    pemeriksaan administratif dan teknis terhadap isian dan dokumen pendukung.
                    Proses ini melibatkan:
                </p>
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Penilaian oleh ahli.</span></li>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Permintaan klarifikasi atau wawancara singkat dengan PIC;</span></li>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Kunjungan daring atau luring jika diperlukan.</span></li>
                </ul>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working-3.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

          <div class="tab-pane fade" id="features-tab-4">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>Analisis Peningkatan dan Pemeringkatan</h3>
                <p>
                    Data dari seluruh pilar akan dianalisis menggunakan metode penelitian
                    kuantitatif dan kualitatif. Setiap pilar memiliki bobot tertentu dalam menentukan
                    skor akhir institusi.
                </p>
              <h3>
                Umpan Balik dan Rekomendasi Peningkatan
              </h3>
              <p>
                RADAR tidak hanya memberikan skor. Setiap institusi akan menerima laporan
                evaluasi menyeluruh yang mencakup:
              </p>
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Ringkasan kinerja di setiap pilar;.</span></li>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Identifikasi area unggul dan area yang perlu ditingkatkan;</span></li>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Rekomendasi konkrit aplikatif;</span></li>
                  <li><i class="bi bi-check-circle-fill"></i><span> Saran pengembangan kebijakan dan program kampus tangguh.</span></li>
                </ul>
                <p>
                    Laporan ini dapat digunakan institusi sebagai bahan dalam menyusun rencana
                    strategi dan rencana kerja tahunan.
                </p>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working-4.jpg" alt="" class="img-fluid">
              </div>
            </div>
          </div><!-- End Tab Content Item -->

        </div>

      </div>

    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Informasi </h2>
        <p>Berita Kegiatan</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok1.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok2.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Product 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok2.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok3.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Branding 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok3.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok4.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Books 1</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok4.jpg" title="Branding 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok5.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok5.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok6.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Product 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok6.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok7.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Branding 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok7.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok8.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Books 2</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok8.jpg" title="Branding 2" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok9.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok9.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok10.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Product 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok10.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok11.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Branding 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok11.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
              <div class="portfolio-content h-100">
                <img src="assets/img/Dok/dok12.jpg" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Books 3</h4>
                  <p>Lorem ipsum, dolor sit amet consectetur</p>
                  <a href="assets/img/Dok/dok12.jpg" title="Branding 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                  <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->
  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-3 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">RADAR UM</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Graha Rektorat Lantai 6, UM</p>
            <p>Jalan Semarang 5, Malang 65145</p>
            <p class="mt-3"><strong>Phone:</strong> <span>0341-551312</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 footer-links">
          <h4>Biro dan Lembaga</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#hero">Biro Akademik, Kemahasiswaan, Perencanaan, Informasi, dan Kerjasama</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#about">Biro Umum dan Keuangan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#services">Lembaga Pengembangan Pendidikan dan Pembelajaran</a></li>
          </ul>
        </div>

         <div class="col-lg-3 col-md-3 footer-links">
          <h4>Fakultas</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="https://fip.um.ac.id/" target="_blank">Fakultas Ilmu Pendidikan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://sastra.um.ac.id/" target="_blank">Fakultas Sastra</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://fmipa.um.ac.id/"target="_blank">Fakultas Matematika dan IPA</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://feb.um.ac.id/"target="_blank">Fakultas Ekonomi dan Bisnis</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://fis.um.ac.id/"target="_blank">Fakultas Ilmu Sosial</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://fik.um.ac.id/"target="_blank">Fakultas Fakultas Ilmu Keolahragaan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://fpsi.um.ac.id/"target="_blank">Fakultas Psikologi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://fv.um.ac.id/"target="_blank">Fakultas Vokasi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://fk.um.ac.id/"target="_blank">Fakultas kedokteran</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://pasca.um.ac.id/"target="_blank">Sekolah Pascasarjana</a></li>
          </ul>
        </div>
         <div class="col-lg-3 col-md-3 footer-links">
          <h4>Unit Pelaksana Teknis</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="https://lib.um.ac.id/" target="_blank">UPT Perpustakaan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://ptik.um.ac.id/"target="_blank">UPT Pusat Teknologi Informasi dan Komunikasi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://bpm.um.ac.id/"target="_blank">UPT Satuan Penjaminan Mutu</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://psl.um.ac.id/"target="_blank">UPT Pusat Pengembangan Laboratorium Pendidikan</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="http://lab.pancasila.um.ac.id/"target="_blank">UPT Pusat Pengkajian Pancasila</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">TIM RADAR UM</strong> <span>All Rights Reserved</span></p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>