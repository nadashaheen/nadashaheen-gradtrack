<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectPhaseController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PhaseEvaluationController;
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
    return view('welcome');
});
Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('project-phases', ProjectPhaseController::class);
Route::resource('submissions', SubmissionController::class);
Route::resource('comments', CommentController::class);
Route::resource('meetings', MeetingController::class);
Route::resource('phase-evaluations', PhaseEvaluationController::class);
