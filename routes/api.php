<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MotivationController;
use App\Http\Controllers\ReservationController;

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
Route::controller(AuthController::class)->group(function(){

    Route::post('register','register');
    Route::post('login','login');

});

Route::controller(MotivationController::class)->group(function(){

    Route::post('create_motivation','create_motivation');
    Route::post('edit_motivation/{id}','edit_motivation');
    Route::get('motivations','motivations');
    Route::get('motivation_app','motivation_app');
    Route::get('get_motivation/{id}','get_motivation');
    Route::get('delete_motivation/{id}','delete_motivation');
   
});
Route::controller(ServiceController::class)->group(function(){

    Route::post('create_service','create_service');
    Route::get('services','services');
    Route::get('get_service/{id}','get_service');
    Route::get('delete_service/{id}','delete_service');
    Route::post('edit_service/{id}','edit_service');
   
});

Route::controller(ReservationController::class)->group(function(){

    Route::get('reservations','reservations');
    Route::post('create_reservation','create_reservation');
   
});
