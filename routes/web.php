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
// Route::get('/SearchSummary/{slug}',[SummaryWilayah::class, 'SearchSummary']);

// Settingan OLD version
// Route::get('/batam',[SummaryBatamController::class, 'index']);
// Route::get('/deliserdang',[SummaryDeliserdangController::class, 'index']);
// Route::get('/pematangsiantar',[SummaryPematangsiantarController::class, 'index']);

// Route::resource('/SummaryMedan',SummaryMedanController::class);
// Route::get('/SearchSummaryMedan/{slug}',[SummaryMedanController::class, 'SearchSummaryMedan']);
// Route::get('/SearchByPmtMedan/{slug}',[SummaryMedanController::class, 'SearchByPmt']);
// Route::get('/AddKeteranganMedan/{slug}',[SummaryMedanController::class, 'SimpanKeteranganMedan']);

// Route::resource('/SummaryBatam',SummaryBatamController::class);
// Route::get('/SearchSummaryBatam/{slug}',[SummaryBatamController::class, 'SearchSummaryBatam']);
// Route::get('/SearchByPmtBatam/{slug}',[SummaryBatamController::class, 'SearchByPmt']);

// Route::resource('/SummaryDeliserdang',SummaryDeliserdangController::class);
// Route::get('/SearchSummaryDeliserdang/{slug}',[SummaryDeliserdangController::class, 'SearchSummaryDeliserdang']);
// Route::get('/SearchByPmtDeliserdang/{slug}',[SummaryDeliserdangController::class, 'SearchByPmtDeliserdang']);

// Route::resource('/SummaryPematangsiantar',SummaryPematangsiantarController::class);
// Route::get('/SearchSummaryPematangsiantar/{slug}',[SummaryPematangsiantarController::class, 'SearchSummaryPematangsiantar']);
// Route::get('/SearchByPmtPematangsiantar/{slug}',[SummaryPematangsiantarController::class, 'SearchByPmtPematangsiantar']);
