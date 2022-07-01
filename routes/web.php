<?php

use App\Http\Controllers\SummaryBatamController;
use App\Http\Controllers\SummaryDeliserdangController;
use App\Http\Controllers\SummaryMedanController;
use App\Http\Controllers\SummaryPematangsiantarController;
use App\Http\Controllers\SummaryReportController;
use App\Models\SummaryDeliserdang;
use App\Models\SummaryPematangsiantar;
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

// Route::get('/', function () {
//     // return view('welcome');
//     return "helooo";
// });

Route::get('/', [SummaryReportController::class, 'index']);
Route::get('/medan',[SummaryMedanController::class, 'index']);
Route::get('/batam',[SummaryBatamController::class, 'index']);
Route::get('/deliserdang',[SummaryDeliserdangController::class, 'index']);
Route::get('/pematangsiantar',[SummaryPematangsiantarController::class, 'index']);

Route::resource('/SummaryMedan',SummaryMedanController::class);
Route::get('/SearchSummaryMedan/{slug}',[SummaryMedanController::class, 'SearchSummaryMedan']);
Route::get('/SearchByPmtMedan/{slug}',[SummaryMedanController::class, 'SearchByPmt']);

Route::resource('/SummaryBatam',SummaryBatamController::class);
Route::get('/SearchSummaryBatam/{slug}',[SummaryBatamController::class, 'SearchSummaryBatam']);
Route::get('/SearchByPmtBatam/{slug}',[SummaryBatamController::class, 'SearchByPmt']);

Route::resource('/SummaryDeliserdang',SummaryDeliserdangController::class);
Route::get('/SearchSummaryDeliserdang/{slug}',[SummaryDeliserdangController::class, 'SearchSummaryDeliserdang']);
Route::get('/SearchByPmtDeliserdang/{slug}',[SummaryDeliserdangController::class, 'SearchByPmtDeliserdang']);

Route::resource('/SummaryPematangsiantar',SummaryPematangsiantarController::class);
Route::get('/SearchSummaryPematangsiantar/{slug}',[SummaryPematangsiantarController::class, 'SearchSummaryPematangsiantar']);
Route::get('/SearchByPmtPematangsiantar/{slug}',[SummaryPematangsiantarController::class, 'SearchByPmtPematangsiantar']);
