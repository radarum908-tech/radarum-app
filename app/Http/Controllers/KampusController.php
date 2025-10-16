<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Penilaian\Borang;
use App\Models\Penilaian\Pilar;
use App\Models\Penilaian\Kriteria;
use App\Models\Penilaian\SubKriteria;
use App\Models\Penilaian\IndikatorPenilaian;
Use App\Models\User;

class KampusController extends Controller
{
    function kampus(){
        if (Auth::user()->role !== 'kampus') {
            return abort(403, 'Unauthorized');
        }
        $user = Auth::user();
        $kampusList = User::whereHas('borangs')->withCount('borangs')->get();
        $totalBorang = Borang::count(); // total semua borang
        $totalKampus = User::where('role', 'kampus')->count(); // total akun role kampus

        $borangs = Borang::where('akun_id', Auth::id())
    ->orderBy('nama_pengisi', 'asc')
    ->orderBy('pilar', 'asc')
    ->orderBy('kriteria', 'asc')
    ->orderBy('sub_kriteria', 'asc')
    ->get();

        $totalSubKriteria = SubKriteria::count(); // target wajib isi
        $subKriteriaTerisi = Borang::where('akun_id', Auth::id())
                            ->distinct('sub_kriteria')
                            ->count('sub_kriteria');

    $progress = $totalSubKriteria > 0
        ? round(($subKriteriaTerisi / $totalSubKriteria) * 100, 2)
        : 0;

    if ($progress == 100) {
        $status = "Lengkap";
    } elseif ($progress >= 90) {
        $status = "Hampir Lengkap";
    } elseif ($progress >= 1) {
        $status = "Proses";
    } else {
        $status = "Belum Mengisi";
    }

    $users = User::whereNotNull('avg_pilar_total')
                ->orderByDesc('avg_pilar_total')
                ->pluck('id'); // ambil cuma id aja

    $ranking = $users->search($user->id);

    $ranking = $ranking !== false ? $ranking + 1 : null;
    $users = User::
        whereNotNull('avg_pilar_total')
        ->orderByDesc('avg_pilar_total')
        ->get();

    return view('kampus.kampus', compact(
        'borangs',
        'kampusList',
        'totalBorang',
        'totalKampus',
        'progress',
        'status',
        'user',
        'ranking',
        'users'
    ));
    }

    public function preload()
{


    return response()->json([
        'pilars' => Pilar::select('id','pilar')->get(),
        'kriterias' => Kriteria::select('id','pilar_id','kriteria')->get(),
        'subKriterias' => SubKriteria::select('id','kriteria_id','sub_kriteria')->get(),
        'indikators' => IndikatorPenilaian::select('id','sub_kriteria_id','indikator_penilaian')->get(),
    ]);
}


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_kampus' => 'required|string|max:255',
            'nama_pengisi' => 'required|string|max:255',
            'pilar' => 'required|array',
            'kriteria' => 'required|array',
            'sub_kriteria' => 'required|array',
            'indikator_penilaian' => 'required|array',
            'link_evidence' => 'nullable|array',
            'link_evidence.*' => 'nullable|url',
            'catatan_tambahan' => 'nullable|array',
            'catatan_tambahan.*' => 'nullable|string',
        ]);

        $duplikat =[];

        $count = count($request->pilar);

        for ($i = 0; $i < $count; $i++) {
            $subKriteriaId = $request->sub_kriteria[$i];
            $namaSubKriteria = SubKriteria::where('id', $subKriteriaId)->value('sub_kriteria');

            // ✅ Cek apakah kampus sudah pernah isi sub kriteria ini
            $exists = Borang::where('akun_id', Auth::id())
                ->where('sub_kriteria', $namaSubKriteria)
                ->exists();

            if ($exists) {
                $duplikat[] = $namaSubKriteria;
            }

            if (count($duplikat) > 0) {
                return redirect()->back()
                    ->with('error', 'Sub Kriteria berikut sudah pernah diisi:<br>- ' . implode('<br>- ', $duplikat));
            }

            // Ambil nama berdasarkan ID
            $namaPilar = Pilar::where('id', $request->pilar[$i])->value('pilar');
            $namaKriteria = Kriteria::where('id', $request->kriteria[$i])->value('kriteria');
            $namaSubKriteria = SubKriteria::where('id', $request->sub_kriteria[$i])->value('sub_kriteria');
            $namaIndikator = IndikatorPenilaian::where('id', $request->indikator_penilaian[$i])->value('indikator_penilaian');

            // Simpan ke DB
            Borang::create([
                'nama_kampus' => $request->input('nama_kampus'),
                'nama_pengisi' => $request->input('nama_pengisi'),
                'pilar' => $namaPilar,
                'kriteria' => $namaKriteria,
                'sub_kriteria' => $namaSubKriteria,
                'indikator_penilaian' => $namaIndikator,
                'link_evidence' => is_array($request->link_evidence) && isset($request->link_evidence[$i])
                    ? $request->link_evidence[$i] : null,
                'catatan_tambahan' => is_array($request->catatan_tambahan) && isset($request->catatan_tambahan[$i])
                    ? $request->catatan_tambahan[$i] : null,
                'akun_id' => Auth::id(),
            ]);
        }

        return redirect()->back()->with('success', 'Data borang berhasil disimpan');
    }

        public function KampusProfil(){
            $user = Auth::user();
            return view('kampus.profil',compact('user'));
        }

}


