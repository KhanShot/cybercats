<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('get-subjects', [\App\Http\Controllers\SubjectController::class, 'getSubjects']);
Route::get('get-subject-topics/{subj_id}', [\App\Http\Controllers\SubjectController::class, 'getSubjectTopics']);
Route::get('get-subject-contents/{subj_id}', [\App\Http\Controllers\SubjectController::class, 'getSubjectContents']);
Route::get('get-topic-contents/{topic_id}', [\App\Http\Controllers\TopicController::class, 'getTopicContents']);
