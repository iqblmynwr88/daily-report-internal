<?php

use App\Http\Controllers\ComunicationRestApiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SummaryBatamController;
use App\Http\Controllers\SummaryDeliserdangController;
use App\Http\Controllers\SummaryMedanController;
use App\Http\Controllers\SummaryPematangsiantarController;
use App\Http\Controllers\SummaryReportController;
use App\Http\Controllers\SummaryWilayah;
use App\Http\Controllers\UtilityController;
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

// =========================================================================================================================
Route::get('/phpinfo',function () {return phpinfo();});
// =========================================================================================================================

Route::group(['prefix' => '/', 'middleware' => ['check.session']], function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [SummaryReportController::class, 'dashboard']);
    Route::get('/{slug}',[SummaryWilayah::class, 'index']);
    Route::get('/SummaryWilayah/{slug}',[SummaryWilayah::class, 'SummaryWilayah']);
    Route::resource('/DetailPertangal',SummaryWilayah::class);
    Route::get('/AddKeterangan/{slug}',[SummaryWilayah::class, 'SimpanKeterangan']);
    Route::get('/SearchByPmt/{slug}',[SummaryWilayah::class, 'SearchByPmt']);
    Route::get('/EditMerchant/{slug}',[SummaryWilayah::class, 'EditMerchant']);
    Route::get('/ExportToDoc/{slug}',[SummaryWilayah::class, 'ExportToDoc']);
    Route::get('/GetDetailTrx/{slug}',[SummaryWilayah::class, 'GetDetailTrx']);
    
    // Get Data from REST API POB v4
    // =========================================================================================================================
    Route::get('/parsing/{slug}',[ComunicationRestApiController::class, 'index']);
    // Route::get('/test', [UtilityController::class, 'index']);
    
    Route::get('/utility/doubledata', [UtilityController::class, 'index']);
    Route::get('/CekDoubleData/{slug}', [UtilityController::class, 'CekDoubleData']);

    Route::get('/GetAllDataParsing/{wilayah}',[ComunicationRestApiController::class, 'GetAllDataParsing']);
    Route::get('/UpdateKeteranganMerchant/{slug}',[ComunicationRestApiController::class, 'UpdateKeteranganMerchant']);
});


// Proses Login
Route::group(['prefix' => '/', 'middleware' => ['guest']], function () {
    Route::post('/login',[LoginController::class, 'auth']);
    Route::get('/', [SummaryReportController::class, 'index']);
});