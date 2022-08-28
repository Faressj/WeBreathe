<?php

use App\Http\Controllers\ModulesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleCrud;

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

// Route::post('/', [ModulesController::class, 'show']);
Route::get('/', [ModulesController::class, 'show']);

Route::get('create', [ModuleCrud::class, "index"]);
Route::post('add', [ModuleCrud::class, "add"]);

Route::get('module/{id}', function ($id) {
    return view('module', ['modulee'=>$id]);
});