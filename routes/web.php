<?php

use App\Http\Controllers\AdminBeritaCtl;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFaqCtl;
use App\Http\Controllers\AdminGaleriCtl;
use App\Http\Controllers\AdminMasterCtl;
use App\Http\Controllers\FrontEndCtl;
use App\Http\Controllers\MemberCtl;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\member\dataUsulanMemberCtl;
use App\Http\Controllers\member\LaporanMemberCtl;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ThrottleLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontEndCtl::class, 'index']);
Route::get('/proyek-csr', [FrontEndCtl::class, 'viewProyekCsr']);
Route::get('/berita/detail/{id}', [FrontEndCtl::class, 'detailBerita']);

Route::get('/register', [UserAuthController::class, 'register']);
Route::get('/login', [UserAuthController::class, 'viewLogin']);

Route::get('/logout', [UserAuthController::class, 'Logout']);

Route::middleware(['member.auth'])->group(function () {
    Route::get('/member', [MemberCtl::class, 'index']);
    Route::get('/member/profile', [MemberCtl::class, 'viewProfile']);
    Route::get('/member/data-usulan', [dataUsulanMemberCtl::class, 'index']);
    Route::get('/member/data-usulan/tambah', [dataUsulanMemberCtl::class, 'viewTambah']);
    Route::post('/member/data-usulan/pdf/{id}', [dataUsulanMemberCtl::class, 'DownloadPdf']);
    Route::delete('/member/data-usulan/hapus/{id}', [dataUsulanMemberCtl::class, 'ProsesHapus']);
    Route::get('/membar/data-usulan/edit', [dataUsulanMemberCtl::class, 'viewEdit']);

    Route::get('/member/data-usulan/pemerintah', [dataUsulanMemberCtl::class, 'viewDataUsulanPD']);
    Route::post('/member/data-usulan/pemerintah/bantu/{id}', [dataUsulanMemberCtl::class, 'BantuUsulan']);

    Route::get('/member/laporan', [LaporanMemberCtl::class, 'index']);
    Route::get('/member/laporan/tambah', [LaporanMemberCtl::class, 'viewTambah']);
    Route::post('/member/laporan/pdf/{id}', [LaporanMemberCtl::class, 'DownloadPdf']);
    Route::delete('/member/laporan/hapus/{id}', [LaporanMemberCtl::class, 'ProsesHapus']);
    Route::get('/membar/laporan/edit', [LaporanMemberCtl::class, 'viewEdit']);


});
// admin rote

Route::post('/admin/login/reset', [AdminController::class, 'resetLogin']);
Route::get('/admin/login', [AdminController::class, 'viewLogin']);
Route::get('/admin/logout', [AdminController::class, 'logout']);


Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/berita', [AdminController::class, 'viewBerita']);
    Route::get('/admin/berita/tambah', [AdminBeritaCtl::class, 'viewTambah']);
    Route::get('/admin/berita/edit', [AdminBeritaCtl::class, 'viewEdit']);
    Route::delete('/admin/berita/hapus/{id}', [AdminBeritaCtl::class, 'ProsesHapus']);

    Route::get('/admin/galeri/foto', [AdminGaleriCtl::class, 'viewFoto']);
    Route::get('/admin/galeri/foto/tambah', [AdminGaleriCtl::class, 'viewFotoTambah']);
    Route::delete('/admin/galeri/foto/hapus/{id}', [AdminGaleriCtl::class, 'ProsesHapusFoto']);
    Route::get('/admin/galeri/foto/edit', [AdminGaleriCtl::class, 'viewFotoEdit']);

    Route::get('/admin/galeri/video', [AdminGaleriCtl::class, 'viewVideo']);
    Route::get('/admin/galeri/video/tambah', [AdminGaleriCtl::class, 'viewVideoTambah']);
    Route::delete('/admin/galeri/video/hapus/{id}', [AdminGaleriCtl::class, 'ProsesHapusVideo']);
    Route::get('/admin/galeri/video/edit', [AdminGaleriCtl::class, 'viewVideoEdit']);

    Route::get('/admin/master/kecamatan', [AdminMasterCtl::class, 'viewKecamatan']);
    Route::get('/admin/master/kecamatan/tambah', [AdminMasterCtl::class, 'viewKecamatanTambah']);
    Route::delete('/admin/master/kecamatan/hapus/{id}', [AdminMasterCtl::class, 'ProsesHapuskecamatan']);
    Route::get('/admin/master/kecamatan/edit', [AdminMasterCtl::class, 'viewKecamatanEdit']);

    Route::get('/admin/master/kelurahan', [AdminMasterCtl::class, 'viewKelurahan']);
    Route::get('/admin/master/kelurahan/tambah', [AdminMasterCtl::class, 'viewKelurahanTambah']);
    Route::delete('/admin/master/kelurahan/hapus/{id}', [AdminMasterCtl::class, 'ProsesHapuskelurahan']);
    Route::get('/admin/master/kelurahan/edit', [AdminMasterCtl::class, 'viewKelurahanEdit']);


    Route::get('/admin/master/kategori-member', [AdminMasterCtl::class, 'viewKategoriMember']);
    Route::get('/admin/master/kategori-member/tambah', [AdminMasterCtl::class, 'viewKategoriMemberTambah']);
    Route::delete('/admin/master/kategori-member/hapus/{id}', [AdminMasterCtl::class, 'ProsesHapusKategotiMember']);
    Route::get('/admin/master/kategori-member/edit', [AdminMasterCtl::class, 'viewKategoriMemberEdit']);

    Route::get('/admin/master/bidang', [AdminMasterCtl::class, 'viewBidang']);
    Route::get('/admin/master/bidang/tambah', [AdminMasterCtl::class, 'viewBidangTambah']);
    Route::delete('/admin/master/bidang/hapus/{id}', [AdminMasterCtl::class, 'ProsesHapusBidang']);
    Route::get('/admin/master/bidang/edit', [AdminMasterCtl::class, 'viewBidangEdit']);

    Route::get('/admin/master/member', [AdminMasterCtl::class, 'viewMember']);
    Route::get('/admin/master/member/tambah', [AdminMasterCtl::class, 'viewMemberTambah']);
    Route::delete('/admin/master/member/hapus/{id}', [AdminMasterCtl::class, 'ProsesHapusMember']);
    Route::get('/admin/master/member/edit', [AdminMasterCtl::class, 'viewMemberEdit']);

   
    Route::get('/admin/faq', [AdminFaqCtl::class, 'viewFaq']);
    Route::get('/admin/faq/tambah', [AdminFaqCtl::class, 'viewFaqTambah']);
    Route::get('/admin/faq/edit', [AdminFaqCtl::class, 'viewFaqEdit']);
    Route::delete('/admin/faq/hapus/{id}', [AdminFaqCtl::class, 'ProsesHapusFaq']);

    Route::get('/admin/profile', [AdminController::class, 'viewProfile']);




    Route::get('/admin/galeri/video', [AdminGaleriCtl::class, 'viewVideo']);
});



Route::get('/link', function () {
    $target = storage_path('app/public/');
    $link = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($target, $link);
});
