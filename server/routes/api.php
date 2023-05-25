<?php

use App\Http\Controllers\IrregularsController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\VocabularyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/irregular', [IrregularsController::class, 'getIrregulars']);
Route::get('/irregular-paginate', [IrregularsController::class, 'getIrregularsPaginate']);
Route::get('/list-game', [GamesController::class, 'getListGame']);
Route::get('/game-{id}', [GamesController::class, 'show']);
Route::get('/list-users', [UserController::class, 'index']);
Route::get('/history-{user_id}-{game_id}', [GamesController::class, 'getScoresByUser']);
Route::get('/top-score-{game_id}', [GamesController::class, 'getSccoresOfAllUsers']);
Route::get('/notes-{user_id}', [VocabularyController::class, 'getNotesByUser']);

Route::post('/notes-word-{user_id}-{word_id}', [VocabularyController::class, 'addNotesWordByUser']);
Route::post('/notes-irregular-{user_id}-{irregular_id}', [VocabularyController::class, 'addNotesIrregularByUser']);

Route::get('/word-english', [VocabularyController::class, 'wordEnglish']);
