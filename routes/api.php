<?php

//use App\Http\Controllers\Api\ForgetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Api\AdminController;
//use App\Http\Controllers\Api\DrugController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\IsDoctor;

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

Route::prefix('user/mobile')->name('user.mobile')->group(function () {
    Route::middleware(['guest:api'])->group(function () {
        //mobile - app
        Route::post('register',[ApiController::class,'create'])->name('create');
        Route::post('check',[ApiController::class,'check'])->name('check');
    });
    Route::middleware(['auth:api'])->group(function () {
        //登入 -> 戶頭資料 紀錄 手機資料庫 : account
        Route::post('logout', [ApiController::class, 'logout'])->name('logout');
        //查看( 下載 資料 表格 )
        Route::post('download', [ApiController::class, 'getDataForm'])->name('getData');
    });
});
