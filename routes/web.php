<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/dashboard', [DashboardPageController::class, 'index']);
//    Route::get('/dashboard/page-edit/{id}', [DashboardPageController::class, 'edit']);
//});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/dashboard', 'dashboard')->middleware('auth');
    Route::get('/edit/{id}', 'edit')->middleware('auth');
    Route::get('/view/{id}', 'show');
    Route::get('/create', 'create')->middleware('auth');
    Route::post('/', 'store');
    Route::put('/','update');
    Route::delete('/delete','destroy')->middleware('auth');
});

require __DIR__.'/auth.php';
