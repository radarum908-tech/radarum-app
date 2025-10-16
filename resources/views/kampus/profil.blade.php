<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kampus | Profil</title>
</head>
<body>
    <div class="container mt-5">
        <div>
            <div class="col-md-8">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top-4">
                        <h4 class="mb-0 bi bi-person ">Profil Kampus</h4>
                    </div>

                    <div class="card-body p-4">
                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Nama Kampus</div>
                            <div class="col-md-8">{{ $user->nama_kampus }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Alamat</div>
                            <div class="col-md-8">{{ $user->alamat }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Provinsi</div>
                            <div class="col-md-8">{{ $user->provinsi }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Email Kampus</div>
                            <div class="col-md-8">{{ $user->email_kampus }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Nomor Telepon</div>
                            <div class="col-md-8">{{ $user->nomor_telepon }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Website</div>
                            <div class="col-md-8">
                                <a href="{{ $user->website_kampus }}" target="_blank" class="text-decoration-none">
                                    {{ $user->website_kampus }}
                                </a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Koordinator Program</div>
                            <div class="col-md-8">{{ $user->koordinator_program }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Email Koordinator</div>
                            <div class="col-md-8">{{ $user->email_koordinator }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 fw-bold">Role</div>
                            <div class="col-md-8">
                                <span class="badge bg-info text-dark px-3 py-2">{{ ucfirst($user->role) }}</span>
                            </div>
                        </div>

                        @if($user->logo_kampus)
                            <div class="text-center mt-4">
                                <img src="{{ asset('storage/'.$user->logo_kampus) }}" alt="Logo Kampus"
                                    class="img-fluid rounded-3 shadow-sm" style="max-height: 150px;">
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
<script src="assets/js/kampus.js"></script>
</body>
</html>