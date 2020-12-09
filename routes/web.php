<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
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

//tutu
Route::resource('users', adminController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'AdminController@index');

Route::get('admin_dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin');

Route::get('mentor_dashboard', [\App\Http\Controllers\Mentor\DashboardController::class, 'index'])->middleware('role:mentor');

Route::get('mentee_dashboard', [\App\Http\Controllers\Mentee\DashboardController::class, 'index'])->middleware('role:mentee');
