<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/akta', [UserController::class, 'akta'])->name('akta');
Route::get('/login', [LoginController::class, 'login'])->name('home.login');
Route::post('/login/do', [LoginController::class, 'loginDo'])->name('home.login.do');
Route::post('/pdf/view/{id}', [UserController::class, 'pdfView'])->name('pdf.view');
Route::get('/perijinan/{id}', [Usercontroller::class, 'perijinanDetail'])->name('perijinan.detail');
Route::get('/akta/{id}', [Usercontroller::class, 'aktaDetail'])->name('akta.detail');
Route::post('/akta/pdf/{id}', [UserController::class, 'pdfAkta'])->name('pdf.akta');

Route::middleware(['auth'])->group(function () {
    // Route::middleware(['auth.level:1'])->group(function () {
    //     // Route::get('/perijinan/{id}', [Usercontroller::class, 'perijinanDetail'])->name('perijinan.detail');
    //     // Route::middleware(['token'])->group(function (){
    //     // });
    //     // Route::post('/pdf/view/{id}', [UserController::class, 'pdfView'])->name('pdf.view');
    // });
    Route::middleware(['auth.level:0'])->group(function () {
        // CRUD PERIJINAN
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/perijinan', [AdminController::class, 'perijinan'])->name('admin.perijinan');
        Route::get('/admin/perijinan/add', [AdminController::class, 'perijinanAdd'])->name('admin.perijinan.add');
        Route::post('/admin/perijinan/add/do', [AdminController::class, 'perijinanAddDo'])->name('admin.perijinan.add.do');
        Route::get('/admin/perijinan/{id}', [AdminController::class, 'perijinanDetail'])->name('admin.perijinan.detail');
        Route::get('/admin/perijinan/{id}/edit', [AdminController::class, 'perijinanEdit'])->name('admin.perijinan.edit');
        Route::post('/admin/perijinan/{id}/edit/do', [AdminController::class, 'perijinanEditDo'])->name('admin.perijinan.edit.do');
        Route::get('/admin/perijinan/{id}/delete/do', [AdminController::class, 'perijinanDeleteDo'])->name('admin.perijinan.delete.do');
    

        // CRUD DOKUMENTASI AKTA
        Route::get('/admin/akta', [AdminController::class, 'akta'])->name('admin.akta');
        Route::get('/admin/akta/add', [AdminController::class, 'aktaAdd'])->name('admin.akta.add');
        Route::post('/admin/akta/add/do', [AdminController::class, 'aktaAddDo'])->name('admin.akta.add.do');
        Route::get('/admin/akta/{id}', [AdminController::class, 'aktaDetail'])->name('admin.akta.detail');
        Route::get('/admin/akta/edit/{id}', [AdminController::class, 'aktaEdit'])->name('admin.akta.edit');
        Route::post('/admin/akta/edit/{id}/do', [AdminController::class, 'aktaEditDo'])->name('admin.akta.edit.do');
        Route::get('/admin/pdf/akta/view/{id}', [AdminController::class, 'pdfAkta'])->name('admin.pdf.view.akta');
        Route::get('/admin/akta/{id}/delete/do', [AdminController::class, 'aktaDeleteDo'])->name('admin.akta.delete.do');

        // CRUD PERPANJANGAN
        Route::get('/admin/perijinan/{id}/perpanjangan/add', [AdminController::class, 'perpanjanganAdd'])->name('admin.perpanjangan.add');
        Route::post('/admin/perijinan/{id}/perpanjangan/add/do', [AdminController::class, 'perpanjanganAddDo'])->name('admin.perpanjangan.add.do');
        Route::get('/admin/perijinan/{id}/perpanjangan/{id_perpanjangan}/edit', [AdminController::class, 'perpanjanganEdit'])->name('admin.perpanjangan.edit');
        Route::post('/admin/perijinan/{id}/perpanjangan/{id_perpanjangan}/edit/do', [AdminController::class, 'perpanjanganEditDo'])->name('admin.perpanjangan.edit.do');
        Route::get('/admin/perijinan/{id}/perpanjangan/{id_perpanjangan}/nonaktif/do', [AdminController::class, 'perpanjanganNonaktifDo'])->name('admin.perpanjangan.nonaktif.do');
        Route::get('/admin/perijinan/{id}/perpanjangan/{id_perpanjangan}/aktif/do', [AdminController::class, 'perpanjanganAktifDo'])->name('admin.perpanjangan.aktif.do');
    
        // PDF
        Route::post('/admin/perijinan/{id}/perpanjangan/{id_perpanjangan}/pdf/add/do', [AdminController::class, 'pdfAddDo'])->name('admin.pdf.add.do');
        Route::get('/admin/pdf/view/{id}', [AdminController::class, 'pdfView'])->name('admin.pdf.view');
        Route::get('/admin/perijinan/{id}/pdf/{id_doc}/delete/do', [AdminController::class, 'pdfDeleteDo'])->name('admin.pdf.delete.do');
        Route::post('/admin/perijinan/{id}/perpanjangan/{id_perpanjangan}/pdf/result/add/do', [AdminController::class, 'pdfResultAddDo'])->name('admin.pdf.result.add.do');
        Route::post('/admin/perijinan/{id}/perpanjangan/{id_perpanjangan}/pdf/result/edit/do', [AdminController::class, 'pdfResultEditDo'])->name('admin.pdf.result.edit.do');
        Route::post('/admin/perijinan/{id}/perpanjangan/{id_perpanjangan}/pdf/proses/add/do', [AdminController::class, 'pdfProsesAddDo'])->name('admin.pdf.proses.add.do');
    
        // confirm Perpanjanga selesai
        Route::get('/admin/perijinan/{id}/perpanjangan/{id_perpanjangan}/confrim/do', [AdminController::class, 'confirmDo'])->name('admin.perpanjangan.confirm.do');


        //Token Perijinan
        Route::get('/admin/{id_perpanjangan}/pdf/{id}/generate/token/do', [AdminController::class, 'generateTokenDo'])->name('admin.generate.token.do');

        //Token Akta
        Route::get('/admin/akta/{id}/generate/token/do', [AdminController::class, 'generateTokenAkta'])->name('admin.generate.token.akta');
    });
    // logout
    Route::get('/logout/do', [LoginController::class, 'logoutDo'])->name('home.logout.do');
});