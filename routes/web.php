<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LaporanKegiatanController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedomanController;
use App\Http\Controllers\DokumenLainnyaController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


Route::get('/',[HomeController::class, 'index'])->name('home.index');
Route::get('/sejarah', [HomeController::class, 'sejarah'])->name('home.sejarah');
Route::get('/visimisi', [HomeController::class, 'visimisi'])->name('home.visimisi');
Route::get('/struktur', [HomeController::class, 'struktur'])->name('home.struktur');
Route::get('/berita/detail/{id}', [HomeController::class, 'detail'])->name('berita.detail');
Route::get('/pedoman', [HomeController::class, 'pedoman'])->name('home.pedoman');
Route::get('/dokumenlainnya', [HomeController::class, 'dokumenlainnya'])->name('home.dokumenlainnya');
Route::get('/penelitian', [HomeController::class, 'penelitian'])->name('home.penelitian');
Route::get('/pkm', [HomeController::class, 'pkm'])->name('home.pkm');

Route::get('/login',[AuthController::class,'index'])->name('auth.index')->middleware('guest');
Route::post('/login',[AuthController::class,'verify'])->name('auth.verify');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/activity-log', [ActivityLogController::class, 'index'])->name('activity_log.index');

        Route::get('/',[DashboardController::class,'index'])->name('dashboard.index');

        Route::get('/kategori_kegiatan',[KategoriKegiatanController::class,'index'])->name('kategori_kegiatan.index');
        Route::get('/kategori_kegiatan/tambah',[KategoriKegiatanController::class,'tambah'])->name('kategori_kegiatan.tambah');
        Route::post('/kategori_kegiatan/prosesTambah',[KategoriKegiatanController::class,'prosesTambah'])->name('kategori_kegiatan.prosesTambah');
        Route::get('/kategori_kegiatan/ubah/{id}',[KategoriKegiatanController::class,'ubah'])->name('kategori_kegiatan.ubah');
        Route::post('/kategori_kegiatan/prosesUbah',[KategoriKegiatanController::class,'prosesUbah'])->name('kategori_kegiatan.prosesUbah');
        Route::get('/kategori_kegiatan/hapus/{id}',[KategoriKegiatanController::class,'hapus'])->name('kategori_kegiatan.hapus');

        Route::get('/berita',[BeritaController::class,'index'])->name('berita.index');
        Route::get('/berita/tambah',[BeritaController::class,'tambah'])->name('berita.tambah');
        Route::post('/berita/prosesTambah',[BeritaController::class,'prosesTambah'])->name('berita.prosesTambah');
        Route::get('/berita/ubah/{id}',[BeritaController::class,'ubah'])->name('berita.ubah');
        Route::post('/berita/prosesUbah',[BeritaController::class,'prosesUbah'])->name('berita.prosesUbah');
        Route::get('/berita/hapus/{id}',[BeritaController::class,'hapus'])->name('berita.hapus');

        Route::get('/laporan_kegiatan',[LaporanKegiatanController::class,'index'])->name('laporan_kegiatan.index');
        Route::get('/laporan_kegiatan/tambah',[LaporanKegiatanController::class,'tambah'])->name('laporan_kegiatan.tambah');
        Route::post('/laporan_kegiatan/prosesTambah',[LaporanKegiatanController::class,'prosesTambah'])->name('laporan_kegiatan.prosesTambah');
        Route::get('/laporan_kegiatan/ubah/{id}',[LaporanKegiatanController::class,'ubah'])->name('laporan_kegiatan.ubah');
        Route::post('/laporan_kegiatan/prosesUbah',[LaporanKegiatanController::class,'prosesUbah'])->name('laporan_kegiatan.prosesUbah');
        Route::get('/laporan_kegiatan/hapus/{id}',[LaporanKegiatanController::class,'hapus'])->name('laporan_kegiatan.hapus');

        // Route khusus buka file laporan kegiatan
        Route::get('/buka-file/{path}', function ($path) {
            $path_file = storage_path('app/public/laporan_pdf/' . $path);

            if (!file_exists($path_file)) {
                abort(404);
            }

            return response()->file($path_file);

        })->where('path', '.*')->name('storage.laporan_pdf');

        Route::get('/pedoman', [PedomanController::class, 'index'])->name('pedoman.index');
        Route::get('/pedoman/tambah', [PedomanController::class, 'tambah'])->name('pedoman.tambah');
        Route::post('/pedoman/prosesTambah', [PedomanController::class, 'prosesTambah'])->name('pedoman.prosesTambah');
        Route::get('/pedoman/ubah/{id}', [PedomanController::class, 'ubah'])->name('pedoman.ubah');
        Route::post('/pedoman/prosesUbah', [PedomanController::class, 'prosesUbah'])->name('pedoman.prosesUbah');
        Route::get('/pedoman/hapus/{id}', [PedomanController::class, 'hapus'])->name('pedoman.hapus');

        // Route Khusus Buka File Pedoman PDF
        Route::get('/buka-pedoman/{path}', function ($path) {
            $path_file = storage_path('app/public/pedoman_pdf/' . $path);
            if (!file_exists($path_file)) { abort(404); }
            return response()->file($path_file);
        })->where('path', '.*')->name('storage.pedoman_view');

        Route::get('/dokumenlainnya', [DokumenLainnyaController::class, 'index'])->name('dokumenlainnya.index');
        Route::get('/dokumenlainnya/tambah', [DokumenLainnyaController::class, 'tambah'])->name('dokumenlainnya.tambah');
        Route::post('/dokumenlainnya/prosesTambah', [DokumenLainnyaController::class, 'prosesTambah'])->name('dokumenlainnya.prosesTambah');
        Route::get('/dokumenlainnya/ubah/{id}', [DokumenLainnyaController::class, 'ubah'])->name('dokumenlainnya.ubah');
        Route::post('/dokumenlainnya/prosesUbah', [DokumenLainnyaController::class, 'prosesUbah'])->name('dokumenlainnya.prosesUbah');
        Route::get('/dokumenlainnya/hapus/{id}', [DokumenLainnyaController::class, 'hapus'])->name('dokumenlainnya.hapus');

        // Route Khusus Buka File Dokumen Lainnya PDF
        Route::get('/buka-dokumenlainnya/{path}', function ($path) {
           $path_file = storage_path('app/public/dokumenlainnya_pdf/' . $path);

            if (!file_exists($path_file)) {
                abort(404);
            }
            return response()->file($path_file);
        })->where('path', '.*')->name('storage.dokumenlainnya_view');
    });

    Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');
});

Route::get('files/{filename}', function ($filename){
    $path = storage_path('app/public/berita/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
})->name('storage');
