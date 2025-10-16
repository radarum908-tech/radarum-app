<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Rekap Pemeringkatan Kampus Tangguh</title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
      background: #f8f9fa;
      font-size: 12px;
    }
    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      margin: 20px auto;
      width: 95%;
      overflow: hidden;
    }
    .card-header {
      background: #0d6efd;
      color: #fff;
      font-weight: bold;
      padding: 12px 16px;
      font-size: 14px;
    }
    .table {
      width: 100%;
      border-collapse: collapse;
    }
    .table thead th {
      background: #f1f3f5;
      font-weight: bold;
      text-align: center;
      padding: 10px;
      border-bottom: 1px solid #dee2e6;
    }
    .table tbody td {
      padding: 10px;
      border-bottom: 1px solid #dee2e6;
      vertical-align: middle;
      font-size: 12px;
    }
    .text-start { text-align: left; }
    .text-center { text-align: center; }

    /* Badge style */
    .badge {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 999px;
      font-size: 11px;
      font-weight: bold;
    }
    .bg-warning { background: #ffc107; color: #000; }
    .bg-secondary { background: #6c757d; color: #fff; }
    .bg-danger { background: #dc3545; color: #fff; }
    .bg-dark { background: #212529; color: #fff; }
    .bg-success { background: #198754; color: #fff; }

  </style>
</head>
<body>
  <div class="card">
    <div class="card-header">
      📊 Pemeringkatan Kampus Tangguh
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Peringkat</th>
            <th>Nama Kampus</th>
            <th>Nilai Akhir</th>
          </tr>
        </thead>
        <tbody>
          @foreach($akun as $i => $user)
          <tr>
            <td class="text-center">
              <span class="badge
                @if($i == 0) bg-warning
                @elseif($i == 1) bg-secondary
                @elseif($i == 2) bg-danger
                @else bg-dark
                @endif
              ">{{ $i + 1 }}</span>
            </td>
            <td class="fw-semibold text-start">
              🎓 {{ $user->nama_kampus }}
            </td>
            <td class="text-center">
              <span class="badge bg-success">
                {{ number_format($user->avg_pilar_total, 2) }}
              </span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
