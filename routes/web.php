<?php

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get("/", "App\Http\Controllers\RegisterController@index")->name("registers.index");

//Route::get('/registers', [RegisterController::class, 'index'])->name("registers.index");

Route::get("/registers/create", "App\Http\Controllers\RegisterController@create");

Route::post("/registers", "App\Http\Controllers\RegisterController@store")->name("registers.create");

Route::get("/registers/{register}", "App\Http\Controllers\RegisterController@show")->name("registers.show");

Route::get("/registers/{register}/edit", "App\Http\Controllers\RegisterController@edit");

Route::put("/registers/{register}", "App\Http\Controllers\RegisterController@update")->name("registers.update");

Route::delete("/registers/{register}", "App\Http\Controllers\RegisterController@destroy");

Route::get("/stacks", "App\Http\Controllers\StackController@index")->name("stacks.index");

Route::post("/stacks", "App\Http\Controllers\StackController@store")->name("stacks.store");

Route::get("/stacks/create", "App\Http\Controllers\StackController@create");

Route::get("/stacks/{stack}/edit", "App\Http\Controllers\StackController@edit")->name("stacks.edit");

Route::get("/stacks/{stack}", "App\Http\Controllers\StackController@show")->name("stacks.show");

Route::put("/stacks/{stack}", "App\Http\Controllers\StackController@update")->name("stacks.update");

Route::delete("/stacks/{stack}", "App\Http\Controllers\StackController@destroy")->name("stacks.destroy");


