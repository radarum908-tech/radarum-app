<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('Dashboard');
});
Route::get('/disclaimer',[SessionController::class,'disclaimer'])->name('disclaimer');


/*
|--------------------------------------------------------------------------
| Authentication Routes (for guest only)
|--------------------------------------------------------------------------
*/
Route::middleware(['isTamu'])->group(function () {
    Route::get('login', [SessionController::class, 'index']);
    Route::get('register', [SessionController::class, 'register']);
    Route::post('register/create', [SessionController::class, 'create']);
    Route::post('login/login', [SessionController::class, 'login']);
});

/*
|--------------------------------------------------------------------------
| Session & Logout
|--------------------------------------------------------------------------
*/
Route::post('logout/logout', [SessionController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Protected Routes (require login)
|--------------------------------------------------------------------------
*/
Route::middleware(['isLogin'])->group(function () {
    Route::get('admin', [AdminController::class, 'admin']);
    Route::get('reviewer', [ReviewerController::class, 'reviewer']);
    Route::get('kampus', [KampusController::class, 'kampus'])->name('kampus');
    Route::get('/admin/akun-borang', [AdminController::class, 'akunSudahMengisiBorang'])->name('admin.akunBorang');
    Route::get('/admin/borang/{kampus_id}', [AdminController::class, 'lihatBorang'])->name('admin.lihat-borang');
    Route::put('/admin/borang/nilai', [AdminController::class, 'beriNilai'])->name('admin.beri-nilai');
    Route::delete('/admin/borang/{id}', [AdminController::class, 'destroy_borang'])->name('admin.hapus-borang');
    Route::post('/admin/users/{id}/reset-password',[AdminController::class,'ResetPassword'])->name('admin.users.reset-password');
    Route::post('/admin/unduh-borang/{kampus_id}', [AdminController::class, 'unduhBorang'])
    ->name('admin.unduh-borang');
    Route::get('admin/pemeringkatan/',[AdminController::class,'Rankingkampus']);
    Route::get('admin/download/pemeringkatan/pdf',[AdminController::class,'exportPemeringkatan'])->name('ranking-pdf');
    Route::get('/news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('admin.news.store');




    Route::get('/reveiwer/lihat-borang/{kampus_id}',[ReviewerController::class,'tampilBorang'])->name('reviewer.lihat-borang');
    Route::put('/reveiwer/beri/nilai',[ReviewerController::class,'beriNilai'])->name('reviewer.beri-nilai');
    Route::get('/reviewer/akun-borang', [ReviewerController::class, 'SudahMengisiBorang'])->name('reviewer.akunBorang');
    Route::get('Reviewer/dashboard',[ReviewerController::class,'DashboardReviewer'])->name('Reviewer-Dashboard');
    Route::post('/reviewer/unduh-borang/{kampus_id}', [ReviewerController::class, 'unduhBorang'])
    ->name('reviewer.unduh-borang');
    Route::get('reviewer/pemeringkatan/',[ReviewerController::class,'Rankingkampus']);

    // COMING SOON
    Route::get('/Kampus/Dashboard',[KampusController::class,'KampusDashboard']);
    Route::get('/Kampus/DashoardUtama',[KampusController::class]);
    Route::get('/Kampus/Pengisian-Borang',[KampusController::class]);
    Route::get('/Kampus/Riwayat-Borang',[KampusController::class]);
    Route::get('/Kampus/Profil',[KampusController::class,'KampusProfil']);


});

/*
|--------------------------------------------------------------------------
| Admin Account Management
|--------------------------------------------------------------------------
*/
Route::prefix('akun')->group(function () {
    Route::get('{id}/edit', [AdminController::class, 'edit'])->name('akun.edit');
    Route::put('{id}', [AdminController::class, 'update'])->name('akun.update');
    Route::delete('{id}', [AdminController::class, 'destroy'])->name('akun.hapus');
});

/*
|--------------------------------------------------------------------------
| API Endpoints (for dynamic dropdowns or AJAX)
|--------------------------------------------------------------------------
*/
Route::prefix('api')->group(function () {
    Route::get('pilars', [KampusController::class, 'getPilars']);
    Route::get('kriterias/{pilar_id}', [KampusController::class, 'getKriterias']);
    Route::get('sub-kriterias/{kriteria_id}', [KampusController::class, 'getSubKriterias']);
    Route::get('indikators/{sub_kriteria_id}', [KampusController::class, 'getIndikators']);
});

Route::post('/form-submit', [KampusController::class, 'store'])->name('form.submit');

