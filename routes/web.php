<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MeetingController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\FinalProjectController;
use \App\Http\Controllers\StageEvaluationController;
use \App\Http\Controllers\ProjectStageController;
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



Route::get('/dashboardStd', [\App\Http\Controllers\DashboardController::class, 'dashboardStd'])->name('dashboardStd');
Route::get('/addProjectIdea', [\App\Http\Controllers\DashboardController::class, 'addProjectIdea'])->name('addProjectIdea');
Route::post('/add_idea', [\App\Http\Controllers\ProjectController::class, 'add_idea'])->name('add_idea');

Route::get('/dashboardSuper', [\App\Http\Controllers\DashboardController::class, 'dashboardSuper'])->name('dashboardSuper');

Route::get('/completedProj', [ProjectController::class, 'completedProj'])->name('completedProj');
Route::get('/proposedProj', [ProjectController::class, 'proposedProj'])->name('proposedProj');
Route::get('/search', [ProjectController::class, 'do_search'])->name('do_search');
Route::get('/filters', [ProjectController::class, 'filters'])->name('filters');
Route::get('/show_projectDetils', [ProjectController::class, 'show_projectDetils'])->name('show_projectDetils');
Route::get('/show_add_final', [FinalProjectController::class, 'show_add_final'])->name('show_add_final');
Route::post('/add_final', [FinalProjectController::class, 'add_final'])->name('add_final');

Route::put('/accept/{id}', [ProjectController::class, 'accept'])->name('accept');
Route::put('/reject/{id}', [ProjectController::class, 'reject'])->name('reject');

Route::get('/viewDetails_super/{id}', [ProjectStageController::class, 'viewDetails_super'])->name('viewDetails_super');
Route::post('/evaluate_final_project/', [FinalProjectController::class, 'evaluate_final_project'])->name('evaluate_final_project');

Route::get('/show_meeting_std', [MeetingController::class, 'show_meeting_std'])->name('show_meeting_std');

//Route::get('/meetings', [\App\Http\Controllers\DashboardController::class, 'meetings'])->name('meetings');

//Route::middleware(['auth', 'role:student'])->get('/dashboards/student', function () {
//    return view('dashboards.student');
//})->name('student.dashboards');
//
//Route::middleware(['auth', 'role:supervisor'])->get('/dashboards/supervisor', function () {
//    return view('dashboards.supervisor');
//})->name('supervisor.dashboards');

//Route::post('login', [LoginController::class, 'login'])->name('login');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
Route::get('/projects/search', [ProjectController::class, 'search'])->name('projects.search');
Route::get('/comments/{id}', [CommentController::class, 'showComments'])->name('showComments');
Route::get('/comment/{id}', [CommentController::class, 'showComments_std'])->name('showComments_std');

Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('projectStage', ProjectStageController::class);
Route::resource('submissions', SubmissionController::class);
Route::resource('comments', CommentController::class);
Route::resource('meetings', MeetingController::class);
Route::resource('phase-evaluations', \App\Http\Controllers\StageEvaluationController::class);
