<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login RADAR UM</title>


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
    @if(session('not_authenticated'))
        <div class="alert alert-danger">
            {{ session('not_authenticated') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="background-wrapper" data-aos="fade" data-aos-duration="900" data-aos-delay="300">
        <img src="{{ asset('assets/img/univmalang.jpg') }}" alt="Background">
        <div class="overlay"></div>
    </div>

    <div class="container login-container">
        <div class="card w-100" style="max-width: 800px; " data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
        <div class="row g-0">
            <!-- Bagian Gambar -->
            <div class="col-md-6">
            <img src="{{ asset('assets/img/security.png') }}" alt="Login Image">
            </div>
            <!-- Bagian Form -->
            <div class="col-md-6 p-4">
            <h3 class="mb-4 text-center">Login RADAR UM</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <form action="/login/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email_kampus" class="form-label">Email Kampus</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" class="form-control" id="inputEmail" name="email_kampus" placeholder="Email Kampus" value="{{ old('email_kampus') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberCheck">
                    <label class="form-check-label" for="rememberCheck">Ingat saya</label>
                </div>

                <button name="submit" type="submit" class="btn btn-primary w-100">LOGIN</button>

                <div class="mt-3 text-center">
                    <p>Belum Punya Akun</p>
                </div>

                <div class="mb-3 mt-3 text-center">
                    <a href="{{ url('register') }}" class="btn btn-outline-light w-100">Register</a>
                </div>
            </form>

            </div>
            <div class="mb-3">
            <a href="/" class="btn btn-outline-light">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>

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