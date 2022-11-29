<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminUserPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuperadminDashboard;
use App\Http\Controllers\SuperadminProfileController;
use App\Http\Controllers\SuperadminSectionsController;
use App\Http\Controllers\SuperadminUserController;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\UserProfileDashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//LOGIN ROUTE



//SUPERADMIN
Route::get('/superadmin', [SuperadminDashboard::class, 'index'])->name('superadmin.dashboard');
Route::resource('sections', SuperadminSectionsController::class);
Route::resource('superadmin/users', SuperadminUserController::class);
Route::resource('profile/superadmin', SuperadminProfileController::class);
Route::post('superadmin/users/getData', [SuperadminUserController::class, 'getData' ])->name('users.getData');
Route::post('profile/superadmin/getData', [SuperadminUserController::class, 'getData' ])->name('superadmin.getData');


//ADMIN
Route::get('/admin', [AdminDashboard::class, 'index']);
Route::resource('admin/user', AdminUserPageController::class);
Route::resource('profile/admin',  AdminProfileController::class);

//USER
Route::get('/user', [UserDashboard::class, 'index']);
Route::resource('profile', UserProfileDashboard::class);
