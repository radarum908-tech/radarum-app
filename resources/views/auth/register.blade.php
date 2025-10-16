<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register RADAR UM</title>


    <link href="assets/img/radar.png" rel="icon">
    <link href="assets/img/radar.png" rel="radar">

    <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">

</head>
<body>
    <div class="background-wrapper" data-aos="fade" data-aos-duration="900" data-aos-delay="300">
        <img src="{{ asset('assets/img/univmalang.jpg') }}" alt="Background">
        <div class="overlay"></div>
    </div>

    <div class="container login-container">
        <div class="card w-100" style="max-width: 3000px; " data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
        <div class="row g-0">
            <!-- Bagian Gambar -->
            <div class="col-md-6">
            <img src="{{ asset('assets/img/register.png') }}" alt="Login Image">
            </div>
            <!-- Bagian Form -->
            <div class="col-md-6 p-4">
            <h3 class="mb-4 text-center">Register RADAR UM</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                 </div>
            @endif

            <form action="/register/create" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama_kampus">Nama Kampus</label>
                    <input type="text" name="nama_kampus" class="form-control" placeholder="Nama Kampus" value="{{ old('nama_kampus') }}" />
                </div>

                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat Kampus" value="{{ old('alamat') }}"></textarea>
                </div>

                <div class="mb-3">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" class="form-select">
                        <option selected disabled>Pilih Provinsi</option>
                        <option value="Aceh">Aceh</option>
                        <option value="Sumatera Utara">Sumatera Utara</option>
                        <option value="Sumatera Barat">Sumatera Barat</option>
                        <option value="Riau">Riau</option>
                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Bengkulu">Bengkulu</option>
                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                        <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                        <option value="Lampung">Lampung</option>
                        <option value="DKI Jakarta">DKI Jakarta</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Banten">Banten</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="DI Yogyakarta">DI Yogyakarta</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                        <option value="Bali">Bali</option>
                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                        <option value="Gorontalo">Gorontalo</option>
                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                        <option value="Maluku">Maluku</option>
                        <option value="Maluku Utara">Maluku Utara</option>
                        <option value="Papua">Papua</option>
                        <option value="Papua Barat">Papua Barat</option>
                        <option value="Papua Selatan">Papua Selatan</option>
                        <option value="Papua Tengah">Papua Tengah</option>
                        <option value="Papua Pegunungan">Papua Pegunungan</option>
                        <option value="Papua Barat Daya">Papua Barat Daya</option>
                        <!-- dst -->
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email_kampus">Email Resmi Kampus</label>
                    <input type="email" name="email_kampus" class="form-control" placeholder="Email Resmi Kampus" value="{{ old('email_kampus') }}" />
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('nama_kampus') }}" />
                </div>

                <div class="mb-3">
                    <label for="nomor_telepon">Nomor Telepon</label>
                    <input type="numeric" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon Kampus" value="{{ old('nomor_telepon') }}" />
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="website_kampus">Website Kampus</label>
                            <input type="url" name="website_kampus" class="form-control" placeholder="https://example.ac.id" value="{{ old('website_kampus') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="koordinator_program">Koordinator Program</label>
                            <input type="text" name="koordinator_program" class="form-control" placeholder="Nama Koordinator" value="{{ old('koordinator_program') }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email_koordinator">Email Koordinator</label>
                            <input type="email" name="email_koordinator" class="form-control" placeholder="Email Koordinator" value="{{ old('email_koordinator') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="logo_kampus">Logo Kampus (JPG)</label>
                            <input type="file" name="logo_kampus" class="form-control" />
                        </div>
                    </div>
                </div>

                <button name="submit" type="submit" class="btn btn-primary w-100">Submit</button>
            </form>


            </div>
            <div>
            <a href="/" class="btn btn-outline-light">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
            </div>

        </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script>
        AOS.init({
        once: true,
        delay: 0,
        duration: 1000,
        easing: 'ease-in-out'
        });
    </script>
</body>
</html>