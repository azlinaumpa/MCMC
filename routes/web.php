<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\DeclarationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuditTrailController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware(['auth'])->name('/dashboard');

require __DIR__.'/auth.php';

Route::get('blade', function () {
    return view('base');
}); 


Route::resource('/dashboard',DashboardController::class);
Route::resource('/declaration',DeclarationController::class);
Route::resource('/regist',RegistController::class);
Route::resource('audittrail',AuditTrailController::class);
Route::resource('/report',ReportController::class);

Route::get('declaration/{id}', [DeclarationController::class, 'edit']);
Route::put('declaration/{id}', [DeclarationController::class, 'update']);
Route::get('declaration/{id}/edit2', [DeclarationController::class, 'edit2']);
// Route::get('declaration/{id}/update2', [DeclarationController::class, 'update2']);
Route::put('declaration/{id}/update2', [DeclarationController::class, 'update2']);

// Route::post('/declaration/{declare}/edit2', 'DeclarationController@edit2');
// Route::post('/declaration/{declare}/update2', 'DeclarationController@update2');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
