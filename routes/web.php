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
Route::get('/login', [LoginController::class, 'login'])->name('home.login');
Route::post('/login/do', [LoginController::class, 'loginDo'])->name('home.login.do');
// Route::get('/perijinan/{id}', [Usercontroller::class, 'perijinanDetail'])->name('perijinan.detail');
// Route::get('/pdf/view/{id}', [UserController::class, 'pdfView'])->name('pdf.view');

Route::middleware(['auth'])->group(function () {
    
    // CRUD PERIJINAN
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/perijinan', [AdminController::class, 'perijinan'])->name('admin.perijinan');
    Route::get('/admin/perijinan/add', [AdminController::class, 'perijinanAdd'])->name('admin.perijinan.add');
    Route::post('/admin/perijinan/add/do', [AdminController::class, 'perijinanAddDo'])->name('admin.perijinan.add.do');
    Route::get('/admin/perijinan/{id}', [AdminController::class, 'perijinanDetail'])->name('admin.perijinan.detail');
    Route::get('/admin/perijinan/{id}/edit', [AdminController::class, 'perijinanEdit'])->name('admin.perijinan.edit');
    Route::post('/admin/perijinan/{id}/edit/do', [AdminController::class, 'perijinanEditDo'])->name('admin.perijinan.edit.do');
    Route::get('/admin/perijinan/{id}/delete/do', [AdminController::class, 'perijinanDeleteDo'])->name('admin.perijinan.delete.do');

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
    // logout
    Route::get('/logout/do', [LoginController::class, 'logoutDo'])->name('home.logout.do');
});