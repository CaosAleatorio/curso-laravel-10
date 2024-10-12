<?php
use App\Http\Controllers\Admin\{SuporteController};
use App\Http\Controllers\Site\SiteController;
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

Route::delete('/suporte/{id}', [SuporteController::class, 'destroy'])->name('suportes.destroy');
Route::put('/suporte/{id}', [SuporteController::class, 'update'])->name('suportes.update');
Route::get('/suporte/{id}/edit', [SuporteController::class, 'edit'])->name('suportes.edit');
Route::get('/suporte/create', [SuporteController::class, 'create'])->name('suportes.create');
Route::get('/suporte/{id}', [SuporteController::class, 'show'])->name('suportes.show');
Route::post('/suporte', [SuporteController::class, 'store'])->name('suportes.store');
Route::get('/suporte', [SuporteController::class, 'index'])->name('suportes.index');
Route::get('/contact', [SiteController::class, 'contact']);

Route::get('/', function () {
    return view('welcome');
});
