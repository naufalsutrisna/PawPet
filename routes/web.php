<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HewansController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Models\Pengguna;

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
// Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/Pet', [HewansController::class, 'showAll'])->name('pet')->middleware('auth');
Route::get('/Pet/{id}', [HewansController::class, 'show'])->name('DetailProfilHewan')->middleware('auth');
Route::get('/auth/signUp', [RegisterController::class, 'index'])->name('index');
Route::post('/auth/store', [RegisterController::class, 'store'])->name('store');

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('auth.showLogin');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login'); 

Route::get('/adoption', [HewansController::class, 'showPet'])->name('adoption')->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/tambahProfilHewan', [HewansController::class, 'addPet'])->middleware('auth');

Route::get('/profil', [PenggunaController::class, 'showBiodata'])->name('profil')->middleware('auth');
Route::get('/editProfil', [PenggunaController::class, 'showEditBiodata'])->name('editProfil')->middleware('auth');
Route::put('/updateProfil', [PenggunaController::class, 'updateBiodata'])->name('updateProfil')->middleware('auth');
Route::get('/editProfil/cancel', [PenggunaController::class, 'cancelEdit'])->name('cancelEdit')->middleware('auth');


Route::post('/editProfilHewan', [HewansController::class, 'showEdit'])->name('editProfilHewan')->middleware('auth');

Route::get('/addPet', [HewansController::class, 'index'])->name('addPet')->middleware('auth');
Route::post('/add', [HewansController::class, 'add'])->name('add')->middleware('auth');

Route::get('/profilHewan/{id}/{adoptStatus}', [HewansController::class, 'changeStatus'])->name('changeStatus')->middleware('auth');
Route::get('/profilHewan/{id}', [HewansController::class, 'showDetail'])->name('showHewan')->middleware('auth');
Route::post('/profilHewan', [HewansController::class, 'showChange'])->name('showChange')->middleware('auth');