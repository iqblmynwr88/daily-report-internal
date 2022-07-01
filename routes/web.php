<?php

use App\Http\Controllers\SummaryBatamController;
use App\Http\Controllers\SummaryMedanController;
use App\Http\Controllers\SummaryReportController;
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

Route::resource('/SummaryMedan',SummaryMedanController::class);
Route::get('/SearchSummaryMedan/{slug}',[SummaryMedanController::class, 'SearchSummaryMedan']);