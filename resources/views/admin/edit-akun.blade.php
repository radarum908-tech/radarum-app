<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Akun</title>
</head>
<body>
    <form action="{{ route('akun.update', $akun->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Kampus</label>
            <input type="text" name="nama_kampus" class="form-control" value="{{ $akun->nama_kampus }}">
        </div>
        <div class="mb-3">
            <label>Email Kampus</label>
            <input type="email" name="email_kampus" class="form-control" value="{{ $akun->email_kampus }}">
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-select">
                <option value="admin" {{ $akun->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kampus" {{ $akun->role == 'kampus' ? 'selected' : '' }}>Kampus</option>
                <option value="reviewer" {{ $akun->role == 'reviewer' ? 'selected' : '' }}>Reviewer</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</body>
</html>
