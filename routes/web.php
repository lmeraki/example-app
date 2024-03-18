<?php

use App\Http\Controllers\File201Controller;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect()->route('file201.index');
});

Route::prefix('file201')->group(function () {
    Route::get('/', [File201Controller::class, 'index'])->name('file201.index');
    Route::get('create', [File201Controller::class, 'create'])->name('file201.create');
    Route::post('store', [File201Controller::class, 'store'])->name('file201.store');
    Route::get('{file}/edit', [File201Controller::class, 'edit'])->name('file201.edit');
    Route::put('{file}/update', [File201Controller::class, 'update'])->name('file201.update');
    Route::delete('{file}/delete', [File201Controller::class, 'destroy'])->name('file201.delete');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
