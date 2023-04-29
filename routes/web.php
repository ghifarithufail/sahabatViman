<?php

use App\Http\Controllers\ContohController;
use App\Http\Controllers\FrontEnd\ArtikelController;
use App\Http\Controllers\FrontEnd\AspirasiController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\FrontEnd\GaleriController;
use App\Http\Controllers\FrontEnd\KategoriController;
use App\Http\Controllers\KoordDesaController;
use App\Http\Controllers\KoordKecamatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RaihanSuaraController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [LoginController::class, 'welcome'])->name('welcome');


// Route::get('/dashboard', function () {
//     return view('welcome');
// })->middleware('auth');;

// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth','hakakses:admin');;

Route::get('/error', function () {
    return view('error');
});

// ------------------------------ TEAMS  ---------------------------------- //
Route::get('/teams', [TeamController::class, 'index']);
Route::get('/team-nama', [TeamController::class, 'tim']);

//CREATE
Route::get('/teams-create', [TeamController::class, 'create']);
Route::post('/tPost', [TeamController::class, 'post'])->name('tPost');

//UPDATE
Route::get('/teams-update/{id}',[TeamController::class, 'getTeam'])->name('getTeam');
Route::post('/updateT/{id}',[TeamController::class, 'udpateT'] )->name('udpateT');

//DELETE
Route::get('/deleteT/{id}',[TeamController::class, 'deleteT'] )->name('deleteT');

//REPORT
Route::get('/report-team', [ReportController::class, 'dataTeam']);
Route::get('/report-team-nama', [ReportController::class, 'Team']);
Route::post('/pdf-team', [PdfController::class, 'teams']);
Route::post('/pdf-data-team', [ReportController::class, 'viewPDFTim'])->name('viewPDFTim');




// ------------------------------ PDF  ---------------------------------- //
//PDF KORCAM
Route::get('/pdf-koordinator-kecamatan', [PdfController::class, 'korcam'])->name('koord_kecamatan');
Route::post('/pdf-korcam-detail', [PdfController::class, 'viewPDF'])->name('viewPDF');

//PDF KORDES
Route::get('/pdf-koordinator-desa', [PdfController::class, 'kordes']);
Route::post('/pdf-kordes-detail', [PdfController::class, 'PDFDesa'])->name('viewPDF');

//PDF Kelurahan
Route::get('/pdf-kelurahan', [PdfController::class, 'kelurahan']);
Route::post('/pdf-kelurahan-detail', [PdfController::class, 'PDFkelurahan'])->name('viewPDF');

//PDF User
Route::get('/pdf-user', [PdfController::class, 'user']);
Route::post('/pdf-user-detail', [PdfController::class, 'PDFUser']);

//PDF User
Route::get('/pdf-relawan', [PdfController::class, 'relawan']);
Route::post('/pdf-relawan-detail', [PdfController::class, 'PDFRelawan']);
Route::post('/pdf-generate', [PdfController::class, 'download']);

// ------------------------------ REPORT DATA RELAWAN  ---------------------------------- //
//PDF
Route::post('/pdf-data-relawan', [ReportController::class, 'viewPDF'])->name('viewPDF');

//GET
Route::get('/data-relawan', [ReportController::class, 'dataRelawan']);
Route::get('/data-relawans', [ReportController::class, 'dataRelawans']);
Route::get('/data-relawan-verifikasi', [ReportController::class, 'verifikasi']);

// //UPDATE
Route::get('/relawan-data-update/{id}',[ReportController::class, 'getDataRelawan'])->name('getDataRelawan')->name('getDataRelawan');
Route::post('/udpateDR/{id}',[ReportController::class, 'udpateDR'] )->name('udpateDR')->name('udpateDR');


// ------------------------------ REPORT DASHBOARD  ---------------------------------- //
Route::get('/dashboard', [ReportController::class, 'allData']);
Route::get('/data-desa', [ReportController::class, 'dataDesa'])->middleware('auth');;


// ------------------------------ REPORT KELURAHAN  ---------------------------------- //
//GET
Route::get('/report-kelurahan', [ReportController::class, 'datakelurahan']);
//PDF
Route::post('/pdf-data-kelurahan', [ReportController::class, 'viewPDFKelurahan'])->name('viewPDFKelurahan');


// ------------------------------ REPORT KECAMATAN  ---------------------------------- //
Route::get('/report-kecamatan', [ReportController::class, 'datakecamatan']);
Route::get('/report-kecamatan-nama', [ReportController::class, 'kecamatan']);

//PDF
Route::post('/pdf-data-kecamatan', [ReportController::class, 'viewPDFKecamatan'])->name('viewPDFDesa');


// ------------------------------ REPORT DESA  ---------------------------------- //
Route::get('/report-desa', [ReportController::class, 'reportDesa']);
Route::get('/report-desa-nama', [ReportController::class, 'Desa']);

//PDF
Route::post('/pdf-data-Desa', [ReportController::class, 'viewPDFDesa'])->name('viewPDFDesa');


// ------------------------------ REPORT USER  ---------------------------------- //
Route::get('/report-user', [ReportController::class, 'datauser']);

// Route::get('/desa', [ReportController::class, 'findDesa'])->middleware('auth');;


// ------------------------------ LOGIN & REGISTER ---------------------------------- //
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/registeruser',[LoginController::class, 'registeruser'] )->name('registeruser');
Route::post('/loginuser',[LoginController::class, 'loginuser'] )->name('loginuser');

Route::get('/logout',[LoginController::class, 'logout'] )->name('logout');

Route::get('/contoh', [ContohController::class, 'contoh'])->name('contoh');;

Route::post('/pdf-user', [LoginController::class, 'viewPDF'])->name('viewPDF');



// ------------------------------ RAIHAN SUARA ---------------------------------- //
Route::get('/raihan-suara', [RaihanSuaraController::class, 'raihan_suara'])->name('raihan_suara');

//create
Route::get('/raihan-suara-create', [RaihanSuaraController::class, 'postRH'])->name('postRH');
Route::post('/RHStore', [RaihanSuaraController::class, 'RHStore'])->name('RHStore');

//PDF
Route::post('/pdf-raihan-suara', [RaihanSuaraController::class, 'viewPDF'])->name('viewPDF');

// ------------------------------ USER ---------------------------------- //
Route::get('/user', [LoginController::class, 'user'])->name('user');;

//UPDATE
Route::get('/user-update/{id}',[LoginController::class, 'getUser'])->name('getUser');
Route::post('/udpateU/{id}',[LoginController::class, 'udpateU'] )->name('udpateU');

//DELETE
Route::get('/deleteU/{id}',[LoginController::class, 'deleteU'] )->name('deleteU');


// ------------------------------ Koordinator Kecamatan ---------------------------------- //

//GET
Route::get('/koordinator-kecamatan', [KoordKecamatanController::class, 'koord_kecamatan'])->name('koord_kecamatan');
Route::get('/koordinator-kecamatan-cari', [KoordKecamatanController::class, 'cari'])->name('koord_kecamatan');

//CREATE
Route::get('/koordinator-kecamatan-create', [KoordKecamatanController::class, 'postKK'])->name('postKC')->name('koord_kecamatan');
Route::post('/kkStore', [KoordKecamatanController::class, 'kkStore'])->name('kkStore')->name('koord_kecamatan');

//UPDATE
Route::get('/koordinator-kecamatan-update/{id}',[KoordKecamatanController::class, 'getKoord_kecamatan'])->name('getKoord_kecamatan');
Route::post('/updateKK/{id}',[KoordKecamatanController::class, 'udpateKK'] )->name('udpateKK')->name('koord_kecamatan');

//DELETE
Route::get('/deleteKK/{id}',[KoordKecamatanController::class, 'deleteKK'] )->name('deleteKK')->name('koord_kecamatan');

//PDF
Route::post('/pdf-korcam', [KoordKecamatanController::class, 'viewPDF'])->name('viewPDF');

// ------------------------------  RELAWAN ---------------------------------- //

//GET
Route::get('/relawan', [RelawanController::class, 'relawan'])->name('relawan');

Route::get('/pdf-relawan-detail/{user:no_telpon}', [ReportController::class, 'detail'])->name('detail');
Route::get('/pdf-relawan-detail/{user:id}', [ReportController::class, 'pdf'])->name('detail');


//Find
Route::get('/findRelawan',[RelawanController::class, 'findRelawan']);
Route::get('/verifikasi', [RelawanController::class, 'verifikasi'])->name('verifikasi');

//CREATE
Route::get('/relawan-create', [RelawanController::class, 'postR'])->name('postR')->name('koord_kecamatan');
Route::post('/rStore', [RelawanController::class, 'rStore'])->name('rStore')->name('koord_kecamatan');

// //UPDATE
Route::get('/relawan-update/{id}',[RelawanController::class, 'getRelawan'])->name('getRelawan');
Route::post('/updateR/{id}',[RelawanController::class, 'udpateR'] )->name('udpateR')->name('koord_kecamatan');

// //DELETE
Route::get('/deleteR/{id}',[RelawanController::class, 'deleteR'] )->name('deleteR');


// ------------------------------  KOORDINATOR DESA ---------------------------------- //

//GET
Route::get('/koordinator-desa', [KoordDesaController::class, 'koord_desa'])->name('koord_desa');
Route::get('/koordinator-desa-cari', [KoordDesaController::class, 'cari'])->name('koord_desa');

// //CREATE
Route::get('/koordinator-desa-create', [KoordDesaController::class, 'postKD'])->name('postKD');
Route::post('/kDStore', [KoordDesaController::class, 'kDStore'])->name('kDStore');

// //UPDATE
Route::get('/koordinator-desa-update/{id}',[KoordDesaController::class, 'getKoord_desa'])->name('getKoord_desa');
Route::post('/updateKD/{id}',[KoordDesaController::class, 'updateKD'] )->name('updateKD');

// //DELETE
Route::get('/deleteKD/{id}',[KoordDesaController::class, 'deleteKD'] )->name('deleteKD');

//PDF
Route::post('/pdf-kordes', [KoordDesaController::class, 'viewPDF'])->name('viewPDF');


// --------------------------------------------------- FRONT END ------------------------------------- //

Route::get('/', [FrontEndController::class, 'index']);

Route::get('/tentangSaya', [FrontEndController::class, 'tentang'])->name('tentangSaya');

Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');

Route::get('/berita', [FrontEndController::class, 'berita'])->name('berita');

Route::get('/galerii', [FrontEndController::class, 'galerii'])->name('galerii');

Route::get('/aspirasii', [AspirasiController::class, 'aspirasii'])->name('aspirasii');

Route::post('/aspirasi-store', [AspirasiController::class, 'store'])->name('store');

Route::get('/detail-artikel/{judul}', [FrontEndController::class, 'detail'])->name('detail-artikel');

Route::group(['middleware' => ['auth','hakakses:admin,berita']], function(){



    Route::get('/default', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::get('/aspirasi-data', [AspirasiController::class, 'show'])->name('show');

    Route::get('/deleteAS/{id}', [AspirasiController::class, 'deleteAS'])->name('deleteAS');

    Route::resource('/kategori', KategoriController::class);

    Route::resource('/artikel', ArtikelController::class);

    Route::resource('/galeri', GaleriController::class);

});

// Route::get('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/loginuser', [LoginController::class, 'loginuser'])->name('loginuser');


// Route::get('/register', [LoginController::class, 'register'])->name('register');
// Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');