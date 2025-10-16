<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian\Borang;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Penilaian\Pilar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReviewerController extends Controller
{
    function reviewer(){
        if (Auth::user()->role !== 'reviewer') {
            return abort(403, 'Unauthorized');
        }

        $akun = User::all(); // Tarik semua data akun
        $kampusList = User::whereHas('borangs')->withCount('borangs')->get();
        $totalBorang = Borang::count(); // total semua borang
        $totalKampus = User::where('role', 'kampus')->count(); // total akun role kampus
        $users = User::
        whereNotNull('avg_pilar_total')
        ->orderByDesc('avg_pilar_total')
        ->get();

        return view('reviewer.reviewer', compact('akun','kampusList','totalBorang','totalKampus','users'));
    }

        public function tampilBorang($kampus_id)
        {
            $user = User::findOrFail($kampus_id);
            $borangs = Borang::where('akun_id', $kampus_id)
                        ->orderBy('nama_pengisi', 'asc')
                        ->orderBy('pilar', 'asc')
                        ->orderBy('kriteria', 'asc')
                        ->orderBy('sub_kriteria', 'asc')
                        ->get();

                            // ambil jumlah subkriteria per pilar dari DB
                    $jumlahSub = DB::table('sub_kriterias')
                    ->join('kriterias', 'sub_kriterias.kriteria_id', '=', 'kriterias.id')
                    ->join('pilars', 'kriterias.pilar_id', '=', 'pilars.id')
                    ->select('pilars.id as pilar_id', DB::raw('COUNT(sub_kriterias.id) as total'))
                    ->groupBy('pilars.id')
                    ->pluck('total', 'pilar_id');

                // ambil semua pilar biar selalu muncul (id => nama)
                $allPilars = DB::table('pilars')->pluck('pilar', 'id');

                // hitung rekap per pilar, key diganti ke nama pilar
                $rekapPilar = $allPilars->mapWithKeys(function ($namaPilar, $pilar_id) use ($borangs, $jumlahSub) {
                    // ambil total nilai borang sesuai nama pilar
                    $nilaiPilar = $borangs->where('pilar', $namaPilar)->sum('nilai');

                    // jumlah subkriteria fix dari tabel
                    $totalSub = $jumlahSub[$pilar_id] ?? 0;

                    // hitung rata-rata
                    $rata = $totalSub > 0
                        ? round($nilaiPilar / $totalSub, 2)
                        : 0;

                    return [$namaPilar => $rata]; // key = nama pilar
                });

            return view('reviewer.penilaian-reviewer', compact('user', 'borangs', 'rekapPilar'));
        }

    public function beriNilai(Request $request)
{
    $ids = $request->input('borang_id');
    $nilais = $request->input('nilai');
    $catatans = $request->input('catatan_penilai');

    foreach ($nilais as $nilai) {
        if ($nilai < 0 || $nilai > 100) {
            return redirect()->back()->with('error', 'Nilai harus antara 0 dan 100!');
        }
    }

    foreach ($ids as $i => $id) {
        Borang::where('id', $id)->update([
            'nilai' => $nilais[$i],
            'catatan_penilai' => $catatans[$i],
            'updated_at' => now(),
        ]);
    }

   // Ambil kampus dari salah satu borang
   $kampusId = Borang::find($ids[0])->akun_id;

   // Ambil daftar jumlah sub per pilar (sama kayak lihatBorang)
   $jumlahSub = DB::table('sub_kriterias')
   ->join('kriterias', 'sub_kriterias.kriteria_id', '=', 'kriterias.id')
   ->join('pilars', 'kriterias.pilar_id', '=', 'pilars.id')
   ->select('pilars.id as pilar_id', DB::raw('COUNT(sub_kriterias.id) as total'))
   ->groupBy('pilars.id')
   ->pluck('total', 'pilar_id');

   // Ambil semua pilar resmi
   $allPilars = Pilar::pluck('pilar', 'id');

   $totalNilai = 0;

   foreach ($allPilars as $pilar_id => $namaPilar) {
   // Total nilai borang per pilar
   $nilaiPilar = Borang::where('akun_id', $kampusId)
       ->where('pilar', $namaPilar)
       ->sum('nilai');

   $totalSub = $jumlahSub[$pilar_id] ?? 0;

   $rata = $totalSub > 0
       ? round($nilaiPilar / $totalSub, 2)
       : 0;

   $totalNilai += $rata;
   }

   $avgTotal = round($totalNilai / $allPilars->count(), 2);

   // Simpan ke tabel user
   User::where('id', $kampusId)->update([
   'avg_pilar_total' => $avgTotal
   ]);

    return redirect()->back()->with('success', 'Semua nilai berhasil disimpan!');
}
public function SudahMengisiBorang()
{
    $kampusList = User::whereHas('borangs')
        ->with(['borangs'])
        ->withCount('borangs')
        ->get()
        ->map(function ($kampus) {
            // hitung rata-rata per pilar
            $rekapPilar = $kampus->borangs->groupBy('pilar')->map(function ($group) {
                return $group->avg('nilai');
            });

            // pastikan ada 5 pilar (kosong = 0)
            $totalNilai = 0;
            for ($i = 1; $i <= 5; $i++) {
                $totalNilai += $rekapPilar->get($i, 0);
            }

            // rata-rata tetap dibagi 5 (wajib 5 pilar)
            $kampus->avgPilar = round($totalNilai / 5, 2);


            return $kampus;
        });

    return view('reviewer.manajemen-borang-reviewer', compact('kampusList'));
}
    public function unduhBorang(Request $request, $kampus_id)
{
    $user = User::findOrFail($kampus_id);
    $borangs = Borang::where('akun_id', $kampus_id)
        ->whereNotNull('nilai')
        ->get();

    $rekapPilar = $borangs->groupBy('pilar')->map(function($item) {
        return round($item->avg('nilai'), 2);
    });

    $chartImage = $request->input('chart_image'); // base64 chart

    $pdf = Pdf::loadView('reviewer.export-borang', compact('user','borangs','rekapPilar','chartImage'))
        ->setPaper('a4', 'landscape');

    return $pdf->download('Penilaian_Borang_' . $user->nama_kampus . '.pdf');
}
public function RankingKampus(){
    $users= User::whereNotNull('avg_pilar_total')
    ->orderByDesc('avg_pilar_total')
    ->get();
    dd($users);

    return view('reviewer.ranking-reviewer',compact('users'));
}

}
