<?php

use App\Http\Controllers\StudentController;
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
//     return view('home');
// });

Route::get('/', [StudentController::class, 'index'])->name("home");
Route::get('/add-data', [StudentController::class, 'show'])->name("add-data");
Route::post('/store-data', [StudentController::class, 'store'])->name("store-data");
Route::get('/edit-data/{id?}', [StudentController::class, 'edit']);
Route::post('/update-data/{id?}', [StudentController::class, 'update']);
Route::get('/delete-data/{id}', [StudentController::class, 'destroy']);
