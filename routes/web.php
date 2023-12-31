<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/invitacion/{id}', function () {
    return view('welcome');
});
Route::get('admin', [AdminController::class, 'index'])->name('index');
Route::post('envio', [AdminController::class, 'envio'])->name('envio');
Route::post('informacion', [AdminController::class, 'informacion'])->name('informacion');

