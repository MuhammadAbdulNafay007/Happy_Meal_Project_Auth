<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

// User Routes

Route::get('/', [UserController::class, 'home'])->name('user.home');
Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'loginStore'])->name('user.login.store');
Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/register', [UserController::class, 'registerStore'])->name('user.register.store');
Route::get('/logout', [UserController::class, 'logOut'])->name('user.logout');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/profile_access', [UserController::class, 'userProfile'])->name('user.profile_access');
    Route::post('/profile_access/update/{id}', [UserController::class, 'userProfileUpdate'])->name('user.profile_access.update');
});

// Admin Routes
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin_panel', [AdminController::class, 'index'])->name('admin_panel');


    Route::get('admin_panel/approvalstatus/{id}', [AdminController::class, 'approvalstatus'])->name('admin.approvalstatus');
    Route::get('admin_panel/activestatus/{id}', [AdminController::class, 'activestatus'])->name('admin.activestatus');
});
Route::get('/admin_login', [AdminController::class, 'adminLogin'])->name('admin_login');
Route::post('/admin_login', [AdminController::class, 'adminLoginStore'])->name('admin_login.store');
Route::get('/adminlogout', [AdminController::class, 'adminlogOut'])->name('admin_logout');