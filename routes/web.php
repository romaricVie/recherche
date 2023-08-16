<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ElecteurController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('store');

Route::get('/login', [UserController::class, 'welcome'])->name('welcome');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::post('/recherche', [ElecteurController::class, 'search'])->name('search');
    Route::post('/numelecteur', [ElecteurController::class, 'numelecteur'])->name('numelecteur');
    Route::get('/create', [ElecteurController::class, 'create'])->name('create');
    Route::post('/create', [ElecteurController::class, 'store'])->name('store.electeur');

    Route::patch('/electeur/{electeur}', [ElecteurController::class, 'update'])->name('update.electeur');

    /* presence*/
     Route::get('/presence', [ElecteurController::class, 'index'])->name('presence.index');
     Route::post('/presence', [ElecteurController::class, 'recherche'])->name('recherche');
     Route::patch('/presence/{electeur}', [ElecteurController::class, 'present'])->name('update.present');
     //logout
     Route::post('/logout', [UserController::class, 'logout'])->name('logout');

});










