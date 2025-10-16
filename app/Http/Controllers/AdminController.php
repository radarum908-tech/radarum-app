<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Penilaian\Borang;
use Illuminate\Support\Facades\Hash;
use App\Models\Penilaian\Pilar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\News;
class AdminController extends Controller
{
    function admin(){
        if(Auth::user()->role !== 'admin'){
            return abort(403, 'Kamu ga diajak');
        }
        $akun = User::all(); // Tarik semua data akun
        $kampusList = User::whereHas('borangs')->withCount('borangs')->get();
        $totalBorang = Borang::count(); // total semua borang
        $totalKampus = User::where('role', 'kampus')->count(); // total akun role kampus

        $users = User::
                whereNotNull('avg_pilar_total')
                ->orderByDesc('avg_pilar_total')
                ->get();


        return view('admin.admin', compact('akun','kampusList','totalBorang','totalKampus','users'));

    }

    public function edit($id){
        $akun = User::findOrFail($id);
        return view('admin.edit-akun', compact('akun'));
    }

    public function update(Request $request, $id) {
        $akun = User::findOrFail($id);

        $request->validate([
            'nama_kampus' => 'required',
            'email_kampus' => 'required|email|unique:akun,email_kampus,' . $id,
            'nomor_telepon' => 'required',
            'koordinator_program' => 'required',
            'email_koordinator' => 'required',
            'role' => 'required|in:admin,kampus,reviewer',
        ]);

        $akun->update($request->only(['nama_kampus', 'email_kampus', 'role','nomor_telepon','koordinator_program','email_koordinator']));

        return back()->with('success', 'Data akun berhasil diupdate');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Akun berhasil dihapus!');
    }
    public function akunSudahMengisiBorang()
{
    $kampusList = User::whereHas('borangs')->withCount('borangs')->get();

    return view('admin.akun-borang-admin', compact('kampusList'));
}

public function lihatBorang($kampus_id)
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

    return view('admin.penilaian', compact('user', 'borangs','rekapPilar'));
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

    return back()->with('success', 'Semua nilai berhasil disimpan!');
}
    public function destroy_borang($id){

        Borang::where('akun_id', $id)->delete();

        User::where('id', $id)->update([
            'avg_pilar_total' => 0

        ]);
        return redirect()->back()->with('success','Data Borang berhasil di hapus');
    }

    public function ResetPassword($id){

        $user = User::findOrFail($id);
        $newPassword = '12345678';

        $user ->password = Hash::make($newPassword);
        $user->save();

        return back()->with('success',"Password untuk {$user->name} berhasil di reset ke : {$newPassword}");

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

        return view('admin.ranking-admin',compact('users'));
    }

    public function exportPemeringkatan(){
        $akun = User::where('role', 'kampus')   // filter role kampus
        ->orderByDesc('avg_pilar_total')
        ->get();
        $pdf = Pdf::loadView('admin.ranking-pdf',compact('akun'))->setPaper('a4','portrait');

        return $pdf->download('Rekap_Pemeringkatan_Kampus_Tangguh.pdf');
    }
    public function tambahBeritaForm() {
        return view('admin.tambah-berita'); // View form tambah berita
    }

    // Simpan berita baru
    public function simpanBerita(Request $request)
{
    // ✅ Validasi input
    $data = $request->validate([
        'title'   => 'required|string|max:255',
        'summary' => 'required|string|max:500',
        'content' => 'required|string',
        'cover'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status'  => 'required|in:draft,published',
    ]);

    // ✅ Buat instance model
    $news = new News();
    $news->title   = $data['title'];
    $news->summary = $data['summary'];
    $news->content = $data['content'];
    $news->status  = $data['status'];

    // ✅ Jika status published, set waktu publikasi
    if ($data['status'] === 'published') {
        $news->published_at = now();
    }

    // ✅ Upload cover jika ada
    if ($request->hasFile('cover')) {
        $path = $request->file('cover')->store('news_cover', 'public');
        $news->cover_path = $path;
    }

    // ✅ Simpan ke database
    $news->save();

    return redirect()->back()->with('success', 'Berita berhasil ditambahkan!');
}


    // Daftar berita untuk admin
    public function daftarBerita() {
        $berita = News::latest()->get();
        return view('admin.daftar-berita', compact('berita'));
    }

    // Halaman publik — tampilkan hanya yang published
    public function tampilBeritaPublik() {
        $berita = News::published()->latest('published_at')->paginate(5);
        return view('berita.index', compact('berita'));
    }

    // Detail berita publik (pakai ID)
    public function detailBerita($id) {
        $berita = News::published()->findOrFail($id);
        return view('berita.show', compact('berita'));
    }

}
