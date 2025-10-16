<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penilaian Borang</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; vertical-align: top; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h3>Hasil Penilaian Borang</h3>
    <p><strong>Kampus:</strong> {{ $user->nama_kampus }}</p>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Kampus</th>
                    <th>Pilar</th>
                    <th>Sub Kriteria</th>
                    <th>Indikator Penilaian</th>
                    <th>Nilai</th>
                    <th>Catatan Penilai</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($borangs as $index => $borang)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $borang->nama_kampus }}</td>
                        <td>{{ $borang->pilar }}</td>
                        <td>{{ $borang->sub_kriteria }}</td>
                        <td>{{ $borang->indikator_penilaian }}</td>
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
                        <td colspan="7" class="text-center">Belum ada data borang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(!empty($chartImage))
        <div style="page-break-before: always;"></div>
        <h4 style="margin-top:20px;">Visualisasi Nilai Per Pilar</h4>
        <img src="{{ $chartImage }}" style="width:100%; max-height:300px;">
    @endif
</body>
</html>
