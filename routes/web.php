<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//Clients
Route::get('/all-clients', [AdminController::class, 'users'])->name('admin.users');
Route::post('/add-client', [AdminController::class, 'addusers'])->name('users.add');
Route::post('/update-client', [AdminController::class, 'updateusers'])->name('users.update');
Route::get('/delete-client/{id}', [AdminController::class, 'delusers'])->name('users.del');
Route::get('/view-client/{id}', [AdminController::class, 'viewusers'])->name('users.view');  

