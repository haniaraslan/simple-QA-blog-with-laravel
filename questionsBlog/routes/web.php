<?php

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
    return view('welcome');
});

Route::get('/questions', [\App\Http\Controllers\QuestionsController::class, 'index']);
Route::get('/questions/{question}', [\App\Http\Controllers\QuestionsController::class, 'show']);
Route::post('/questions/like',[\App\Http\Controllers\QuestionsController::class, 'like']);
Route::post('/questions/dislike',[\App\Http\Controllers\QuestionsController::class, 'dislike']);

Route::get('/questions/create/question', [\App\Http\Controllers\QuestionsController::class, 'create']); //shows create question form
Route::post('/questions/create/question', [\App\Http\Controllers\QuestionsController::class, 'store']); //saves the created question to the databse
Route::delete('/questions/{question}', [\App\Http\Controllers\QuestionsController::class, 'destroy']); //deletes question from the database

Route::get('/questions/create/answer', [\App\Http\Controllers\AnswersController::class, 'create']);
Route::post('/questions/create/answer', [\App\Http\Controllers\AnswersController::class, 'store']); //saves the created answer to the databse
Route::delete('/questions/delete/answer', [\App\Http\Controllers\AnswersController::class, 'destroy']); //deletes answer from the database

Route::post('/questions/like/answer',[\App\Http\Controllers\AnswersController::class, 'like']);
Route::post('/questions/dislike/answer',[\App\Http\Controllers\AnswersController::class, 'dislike']);