<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1;
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

Route::prefix('v1')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        /**
         * Email Address Module
         */
        Route::prefix('email-address')->name('email-address')->group(function () {
            Route::get('/basic-validation', [V1\EmailAddress\BasicValidationController::class, "handle"])->name('basic-validation');
        });
        /**
         * Person Name Module
         */
        Route::prefix('person')->name('person')->group(function () {
            Route::get('/name', [V1\PersonName\NormalizeController::class, "handle"])->name('name');
        });
        /**
         * Phone Number Module
         */
        Route::prefix('phone-number')->name('phone-number')->group(function () {
            Route::get('/validation', [V1\PhoneNumber\ValidationController::class, "handle"])->name('validation');
        });
        /**
         * Text Module
         */
        Route::prefix('text')->name('text')->group(function () {
            Route::get('/mask', [V1\Text\MaskController::class, "handle"])->name('mask');
            Route::get('/between', [V1\Text\BetweenController::class, "handle"])->name('between');
            Route::get('/encode64', [V1\Text\Encode64Controller::class, "handle"])->name('encode64');
            Route::get('/decode64', [V1\Text\Decode64Controller::class, "handle"])->name('decode64');
            Route::get('/random', [V1\Text\RandomController::class, "handle"])->name('random');
            Route::get('/pad-both', [V1\Text\PadBothController::class, "handle"])->name('pad-both');
        });
    });
});
