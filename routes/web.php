<?php


use App\Http\Controllers\Back\Auth\LoginController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\PhoneBook;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\RoleController;

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


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginAction'])->name('login.action');



Route::get('/', [Dashboard::class, 'index'])->name('admin.dashboard');
Route::get('/deletephonebook/{id}', [PhoneBook::class, 'delete'])->name('phonebook.delete');
Route::get('/hardDeletephonebook/{id}', [PhoneBook::class, 'hardDelete'])->name('hard.phonebook.delete');
Route::get('/recoverphonebook/{id}', [PhoneBook::class, 'recover'])->name('phonebook.recover');
Route::get('/phonebook/silinenler', [PhoneBook::class, 'trashed'])->name('phonebook.trashed');
Route::resource('phonebook', PhoneBook::class);


Route::get('/deletuser/{id}', [UserController::class, 'delete'])->name('user.delete');
Route::get('/hardDeleteuser/{id}', [UserController::class, 'hardDelete'])->name('hard.user.delete');
Route::get('/recoverUser/{id}', [UserController::class, 'recover'])->name('user.recover');
Route::get('/silinenler', [UserController::class, 'trashed'])->name('user.trashed');
Route::resource('/user', UserController::class);




// Route::get('/admin/panel', [Dashboard::class, 'index'])->name('admin.dashboard');


Route::resource('/permission', RoleController::class);