<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('home.login');
Route::post('/login/do', [HomeController::class, 'loginDo'])->name('home.login.do');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/perijinan', [AdminController::class, 'perijinan'])->name('admin.perijinan');
    Route::get('/admin/perijinan/add', [AdminController::class, 'perijinanAdd'])->name('admin.perijinan.add');
    Route::post('/admin/perijinan/add/do', [AdminController::class, 'perijinanAddDo'])->name('admin.perijinan.add.do');
    Route::get('/admin/perijinan/{id}', [AdminController::class, 'perijinanDetail'])->name('admin.perijinan.detail');
    Route::get('/admin/perijinan/{id}/edit', [AdminController::class, 'perijinanEdit'])->name('admin.perijinan.edit');
    Route::post('/admin/perijinan/{id}/edit/do', [AdminController::class, 'perijinanEditDo'])->name('admin.perijinan.edit.do');
    Route::get('/admin/perijinan/{id}/delete/do', [AdminController::class, 'perijinanDeleteDo'])->name('admin.perijinan.delete.do');
    Route::get('/admin/perijinan/{id}/perpanjangan/add', [AdminController::class, 'perpanjanganAdd'])->name('admin.perpanjangan.add');
    Route::post('/admin/perijinan/{id}/perpanjangan/add/do', [AdminController::class, 'perpanjanganAddDo'])->name('admin.perpanjangan.add.do');

    // logout
    Route::get('/logout/do', [HomeController::class, 'logoutDo'])->name('home.logout.do');
});