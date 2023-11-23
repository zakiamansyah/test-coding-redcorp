<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){
   return redirect('/employee');
});
Route::prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('/table', [EmployeeController::class, 'table']);
    Route::post('/create', [EmployeeController::class, 'create']);
    Route::post('/update/{id}', [EmployeeController::class, 'update']);
    Route::get('/read/{id}', [EmployeeController::class, 'read']);
    Route::get('/delete/{id}', [EmployeeController::class, 'delete']);
});

Route::prefix('employee_detail')->group(function () {
    Route::post('/update/{id}', [EmployeeController::class, 'updateDetail']);
    Route::get('/read/{id}', [EmployeeController::class, 'readDetail']);
});
