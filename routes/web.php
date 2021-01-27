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

//request meeting
Route::get('mentee_request_meeting', [\App\Http\Controllers\Mentee\RequestMeetingController::class, 'index'])->middleware('role:mentee');
Route::post('mentee_request_meeting', [\App\Http\Controllers\Mentee\RequestMeetingController::class, 'createMeeting'])->middleware('role:mentee');
// Profile Controller
Route::get('/profile/create',[\App\Http\Controllers\Mentee\ProfileController::class, 'create']);
Route::post('profile', [\App\Http\Controllers\Mentee\ProfileController::class, 'store']);
Route::get('/profile/{id}', [\App\Http\Controllers\Mentee\ProfileController::class, 'show']);
Route::patch('/profile/{id}/edit', [\App\Http\Controllers\Mentee\ProfileController::class, 'edit']);



// Mentee selects mentor
Route::post('/select_mentor/{id}', [\App\Http\Controllers\SelectMentorController::class, 'selectMentor']);

// Mentee requests meeting
Route::post('/request_meeting', [\App\Http\Controllers\Mentee\RequestMeetingController::class, 'requestMeeting']);

// Mentor sees notification
Route::get('/read_notifications', [\App\Http\Controllers\UserNotificationsController::class, 'index']);

// Mentor checks requests
Route::get('/check_requests', [\App\Http\Controllers\Mentor\CheckRequestsController::class, 'index']);
Route::post('/accept_request/{id}', [\App\Http\Controllers\Mentor\CheckRequestsController::class, 'acceptRequest']);
Route::post('/reschedule_meeting/{id}', [\App\Http\Controllers\Mentor\CheckRequestsController::class, 'rescheduleMeeting']);

// Mentee sees notifications
Route::get('/mentee_notifications', [\App\Http\Controllers\UserNotificationsController::class, 'mentee_notifications']);

// Chat Routes
Route::view('/mentee-session-chats', 'mentee.chat.chat')->middleware('auth');
Route::view('/mentor-session-chats', 'mentor.chat.chat')->middleware('auth');
Route::resource('messages', \App\Http\Controllers\MessageController::class)->only([
    'index',
    'store'
]);
// Route::get('messages', [\App\Http\Controllers\ChatsController::class, 'fetchMessages']);
// Route::post('messages', [\App\Http\Controllers\ChatsController::class, 'sendMessage']);

// reports controller
Route::get('/reports', [\App\Http\Controllers\Admin\ReportsController::class, 'index']);
