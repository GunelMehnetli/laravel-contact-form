<?php


use App\Http\Controllers\Back\Auth\LoginController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\PhoneBook;
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

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');


Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'loginAction'])->name('login.action');


Route::middleware(['auth'])->group(function () {
Route::get('/', [Dashboard::class, 'index'])->name('admin.dashboard');
Route::get('/deletephonebook/{id}', [PhoneBook::class, 'delete'])->name('phonebook.delete');
Route::get('/hardDeletephonebook/{id}', [PhoneBook::class, 'hardDelete'])->name('hard.phonebook.delete');
Route::get('/recoverphonebook/{id}', [PhoneBook::class, 'recover'])->name('phonebook.recover');
Route::get('/phonebook/silinenler', [PhoneBook::class, 'trashed'])->name('phonebook.trashed');
Route::resource('phonebook', PhoneBook::class);
// Route::get('/admin/panel', [Dashboard::class, 'index'])->name('admin.dashboard');
});