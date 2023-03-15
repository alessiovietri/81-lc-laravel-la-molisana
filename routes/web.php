<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\PastaController;

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

Route::get('/', [MainController::class, 'index'])->name('homepage');

// --------------------------------------------------------------------------------------

Route::resource('pastas', PastaController::class);

// ALTERNATIVA A:
// Route::get('/pastas', [PastaController::class, 'index'])->name('pastas.index');
// Route::post('/pastas', [PastaController::class, 'store'])->name('pastas.store');
// Route::get('/pastas/create', [PastaController::class, 'create'])->name('pastas.create');
// Route::get('/pastas/{pasta}', [PastaController::class, 'show'])->name('pastas.show');
// Route::get('/pastas/{pasta}/edit', [PastaController::class, 'edit'])->name('pastas.edit');
// Route::put('/pastas/{pasta}', [PastaController::class, 'update'])->name('pastas.update');
// Route::delete('/pastas/{pasta}', [PastaController::class, 'destroy'])->name('pastas.destroy');
