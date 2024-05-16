<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

// Route::middleware('auth')->group(function () {
Route::get('/portfolio', App\Http\Controllers\Portfolio\IndexController::class)
->name('portfolio');
// });

// Route::middleware('auth')->group(function () {
    // Route::get('/top',\App\Http\Controllers\Portfolio\IndexController::class)
    // ->middleware('auth')
    // ->name('mypage');
// });
// Route::get('/top', function () {
//     $users = User::all();
//     return view('portfolio.mypage')
//     ->with('users', $users);
// })->middleware(['auth', 'verified'])->name('top');

Route::get('/top', App\Http\Controllers\Portfolio\TopController::class)
    ->middleware(['auth', 'verified'])
    ->name('top');

Route::get('/skill/top', [App\Http\Controllers\Portfolio\SkillController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('skill-top');

Route::get('/skill/top-select', [App\Http\Controllers\Portfolio\SkillController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/mypage/edit', [ProfileController::class, 'edit'])->name('mypage.edit');
    // Route::patch('/mypage-edit', [ProfileController::class, 'update'])->name('mypage.update');
    Route::post('/mypage/edit', [ProfileController::class, 'update'])->name('mypage.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
