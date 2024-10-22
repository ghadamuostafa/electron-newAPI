<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NationalityController;

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

Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);

    return view('welcome');
});

<<<<<<< Updated upstream
   Route::get('/nationalities', [NationalityController::class, 'index'])->name('nationalities.index');
=======
  Route::get('/nationalities', [NationalityController::class, 'index'])->name('nationalities.index');
>>>>>>> Stashed changes
Route::delete('/nationalities/{nationality}', [NationalityController::class, 'destroy'])->name('nationalities.destroy');
Route::get('/nationalities/{id}', [NationalityController::class, 'show']);
Route::put('/nationalities/{id}', [NationalityController::class, 'update'])->name('nationalities.update');
Route::post('/nationalities', [NationalityController::class, 'store'])->name('nationalities.store');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
