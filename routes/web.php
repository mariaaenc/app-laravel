<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StackController;
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

/* Route::get("/", "App\Http\Controllers\RegisterController@index")->name("registers.index"); */

Route::get('/', [RegisterController::class, 'index'])->name('registers.index');

Route::get("/registers/create", [RegisterController::class, 'create']);

Route::post("/registers", [RegisterController::class, 'store'])->name("registers.create");

Route::get("/registers/{register}", [RegisterController::class, 'show'])->name("registers.show");

Route::get("/registers/{register}/edit", [RegisterController::class, 'edit']);

Route::put("/registers/{register}", [RegisterController::class, 'update'])->name("registers.update");

Route::delete("/registers/{register}", [RegisterController::class, 'destroy'])->name("registers.destroy");

Route::get("/stacks", [StackController::class, 'index'])->name("stacks.index");

Route::post("/stacks", [StackController::class, 'store'])->name("stacks.store");

Route::get("/stacks/create", [StackController::class, 'create']);

Route::get("/stacks/{stack}/edit", [StackController::class, 'edit'])->name("stacks.edit");

Route::get("/stacks/{stack}", [StackController::class, 'show'])->name("stacks.show");

Route::put("/stacks/{stack}", [StackController::class, 'update'])->name("stacks.update");

Route::delete("/stacks/{stack}", [StackController::class, 'destroy'])->name("stacks.destroy");


