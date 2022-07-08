<?php

use App\Http\Controllers\SummaryBatamController;
use App\Http\Controllers\SummaryDeliserdangController;
use App\Http\Controllers\SummaryMedanController;
use App\Http\Controllers\SummaryPematangsiantarController;
use App\Http\Controllers\SummaryReportController;
use App\Http\Controllers\SummaryWilayah;
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
Route::get('/', [SummaryReportController::class, 'index']);
Route::get('/{slug}',[SummaryWilayah::class, 'index']);
Route::get('/SummaryWilayah/{slug}',[SummaryWilayah::class, 'SummaryWilayah']);
Route::resource('/DetailPertangal',SummaryWilayah::class);
Route::get('/AddKeterangan/{slug}',[SummaryWilayah::class, 'SimpanKeterangan']);
Route::get('/SearchByPmt/{slug}',[SummaryWilayah::class, 'SearchByPmt']);
Route::get('/EditMerchant/{slug}',[SummaryWilayah::class, 'EditMerchant']);
Route::get('/ExportToDoc/{slug}',[SummaryWilayah::class, 'ExportToDoc']);