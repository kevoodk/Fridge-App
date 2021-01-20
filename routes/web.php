<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodItemController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/fooditem', [FoodItemController::class, 'index'])->name('fooditem');
Route::get('/fooditem/create', [FoodItemController::class, 'create'])->name('add-fooditem');
Route::post('/fooditem/store', [FoodItemController::class, 'store']);
Route::get('/fooditem/{id}', [FoodItemController::class, 'show']);
Route::get('/fooditem/edit/{id}', [FoodItemController::class, 'edit']);
Route::patch('/fooditem/destroy/{id}', [FoodItemController::class, 'destroy']);
