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
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::get('/contact', [EventController::class, 'contact']);
Route::get('/products/{id?}',[EventController::class, 'products' ]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/create', [EventController::class, 'create']);
        Route::get('/dashboard', [EventController::class, 'dashboard']);
        Route::delete('/events/destroy/{id}', [EventController::class, 'destroy']);
        Route::get('/events/edit/{id}', [EventController::class, 'edit']);
        Route::put('/events/update/{id}', [EventController::class, 'update']);
});

