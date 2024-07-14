<?php


use App\Enums\SupportStatus;
use App\Http\Controllers\Admin\{SupportController};
use App\Http\Controllers\Site\SiteController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    //Route::get('/test', function() { dd(SupportStatus::cases()); });
    Route::get('/test', function() { dd(array_column(SupportStatus::cases(), 'name')); });
    // Route::resource('/supports', SupportController::class);
    Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
    Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
    Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
    Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
    Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
    Route::post('/supports/store', [SupportController::class, 'store'])->name('supports.store');
    Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

    Route::get('/contact', [SiteController::class, 'contact']);
});

require __DIR__.'/auth.php';
