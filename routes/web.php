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

//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);

//Route::prefix('admin')->group(function(){

   // Route::get('/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
   // Route::post('/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
    //Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
//});


Route::get('admin_dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin');
Route::get('mentor_dashboard', [\App\Http\Controllers\Mentor\DashboardController::class, 'index'])->middleware('role:mentor');
Route::get('mentee_dashboard', [\App\Http\Controllers\Mentee\DashboardController::class, 'index'])->middleware('role:mentee');

// Profile Controller
Route::get('/profile/create',[\App\Http\Controllers\Mentee\ProfileController::class, 'create']);
Route::post('profile', [\App\Http\Controllers\Mentee\ProfileController::class, 'store']);
Route::get('/profile/{id}', [\App\Http\Controllers\Mentee\ProfileController::class, 'show']);
Route::patch('/profile/{id}/edit', [\App\Http\Controllers\Mentee\ProfileController::class, 'edit']);

<<<<<<< HEAD
=======
// Mentee selects mentor
Route::post('/select_mentor/{id}', [\App\Http\Controllers\SelectMentorController::class, 'selectMentor']);
>>>>>>> de6e5e8435c487d6a4e5185ef27cb0734daf904e
