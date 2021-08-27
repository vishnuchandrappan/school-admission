<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UserController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'users'
], function ($router) {
    Route::post('/', [UserController::class, 'store']);
    Route::get('/students', [
        UserController::class, 'getStudents'
    ]);
    Route::get('/students/{user}', [UserController::class, 'getStudent']);
    Route::put('/verifyUser', [UserController::class, 'verifyUser']);
    Route::put('/updatePassword', [UserController::class, 'updatePassword'])->middleware('auth');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'logs'
], function ($router) {
    Route::get('/', [LogsController::class, 'showLogs'])->middleware('auth');
});


Route::group([
    'middleware' => 'auth',
    'prefix' => 'details'
], function ($router) {
    Route::post('/', [
        DetailsController::class, 'store'
    ]);
    Route::post(
        '/documents',
        [DetailsController::class, 'uploadDocs']
    );
    Route::get('/documents', [DetailsController::class, 'getSupportingDocs']);
    Route::get('/', [DetailsController::class, 'show']);
});

Route::patch('/payments/{payment}', [DetailsController::class, 'verifyPayment']);
