<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\CiteController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\NoteChambreController;
use App\Http\Controllers\NoteRecetteController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\RecetteIngredientController;
use App\Http\Controllers\ResponsableCiteController;
use App\Http\Controllers\TypeRecetteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout']);
Route::middleware('auth:api')->post('refresh', [AuthController::class, 'refresh']);
Route::middleware('auth:api')->get('me', [AuthController::class, 'me']);
Route::middleware('auth:api')->group(function () {
    Route::apiResource('chambres', ChambreController::class);
    Route::apiResource('admins', AdminController::class);
    Route::apiResource('chambres', ChambreController::class);
    Route::apiResource('cites', CiteController::class);
    Route::apiResource('etudiants', EtudiantController::class);
    Route::apiResource('ingredients', IngredientController::class);
    Route::apiResource('note_chambres', NoteChambreController::class);
    Route::apiResource('note_recettes', NoteRecetteController::class);
    Route::apiResource('recettes', RecetteController::class);
    Route::apiResource('recette_ingredients', RecetteIngredientController::class);
    Route::apiResource('responsable_cites', ResponsableCiteController::class);
    Route::apiResource('type_recettes', TypeRecetteController::class);
    Route::apiResource('users', UserController::class);
});
Route::group(['middleware' => ['auth:api', 'auth.admin']], function () {
    // Routes pour admin
    
});

Route::group(['middleware' => ['auth:api', 'auth.responsableCite']], function () {
    // Routes pour responsable cite
});

Route::group(['middleware' => ['auth:api', 'auth.etudiant']], function () {
    // Routes pour etudiant
    
});
Route::options('{any}', function () {
    return response('', 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
})->where('any', '.*');


