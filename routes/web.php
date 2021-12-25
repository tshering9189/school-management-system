<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackendController\ProfileController;
use App\Http\Controllers\BackendController\UserController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin Routes
Route::get('admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

//User Management All Route
//Group Route
Route::prefix('users')->group(function(){
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
});

// User Profile and change password
Route::prefix('profile')->group(function(){
    Route::get('/view', [ProfileController::class, 'UserProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'UserProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'UserProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'UserPasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'UserPasswordUpdate'])->name('password.update');
});
