<?php

use App\Http\Controllers\UsersController;
use App\Http\Livewire\UserImportExcel;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/import/excel', UserImportExcel::class)->name('users.import.excel');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('profile', [UsersController::class, 'profile'])->middleware(['auth'])->name('profile');

Route::get('users/export/', [UsersController::class, 'export'])->name('users.export');

require __DIR__ . '/auth.php';
