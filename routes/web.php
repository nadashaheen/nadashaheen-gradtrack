<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MeetingController;
use \App\Http\Controllers\Auth\LoginController;
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

Route::get('/', [LoginController::class, 'checkIfLogin'])->name('checkIfLogin');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('/student/dashboard', function () {
    return view('student.student');
})->name('student.dashboard')->middleware('auth');

Route::get('/supervisor/dashboard', function () {
    return view('supervisor.supervisor');
})->name('supervisor.dashboard')->middleware('auth');



Route::post('/logout', function () {
    Auth::logout();
    return view('index');
})->name('logout')->middleware('auth');



Route::get('/showDashbord', [UserController::class, 'showDashbord'])->name('showDashbord');


//Route::middleware(['auth', 'role:student'])->get('/dashboards/student', function () {
//    return view('dashboards.student');
//})->name('student.dashboards');
//
//Route::middleware(['auth', 'role:supervisor'])->get('/dashboards/supervisor', function () {
//    return view('dashboards.supervisor');
//})->name('supervisor.dashboards');

//Route::post('login', [LoginController::class, 'login'])->name('login');

//
//Route::post('/logout', function () {
//    Auth::logout();
//    request()->session()->invalidate();
//    request()->session()->regenerateToken();
//    return redirect('/login');
//})->name('logout');

Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('project-phases', \App\Http\Controllers\ProjectStageController::class);
Route::resource('submissions', SubmissionController::class);
Route::resource('comments', CommentController::class);
Route::resource('meetings', MeetingController::class);
Route::resource('phase-evaluations', \App\Http\Controllers\StageEvaluationController::class);
