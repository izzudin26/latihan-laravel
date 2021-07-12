<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\matakuliahcontroller;
use App\Http\Controllers\dosencontroller;

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
    return view('welcome');
});


Route::get('/api/matakuliah', [matakuliahcontroller::class, 'collections']);
Route::get('/api/matakuliah/{id}', [matakuliahcontroller::class, 'get']);
Route::post('/api/matakuliah', [matakuliahcontroller::class, 'create']);
Route::put('/api/matakuliah/{id}', [matakuliahcontroller::class, 'update']);
Route::delete('/api/matakuliah/{id}', [matakuliahcontroller::class, 'remove']);

Route::post('/api/dosen/login', [dosencontroller::class, 'login']);
Route::post('/api/dosen/registration', [dosencontroller::class, 'register']);





