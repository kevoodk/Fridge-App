<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FridgeController;
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
Route::post('/fooditem/update/{id}', [FoodItemController::class, 'update']);
Route::get('/fooditem/{id}', [FoodItemController::class, 'show']);
Route::get('/fooditem/edit/{id}', [FoodItemController::class, 'edit']);
Route::patch('/fooditem/destroy/{id}', [FoodItemController::class, 'destroy']);


Route::get('/foodcat', [FoodCategoryController::class, 'index'])->name('foodcat');
Route::get('/foodcat/create', [FoodCategoryController::class, 'create'])->name('add-foodcat');
Route::post('/foodcat/store', [FoodCategoryController::class, 'store']);
Route::post('/foodcat/update/{id}', [FoodCategoryController::class, 'update']);
Route::get('/foodcat/{id}', [FoodCategoryController::class, 'show']);
Route::get('/foodcat/edit/{id}', [FoodCategoryController::class, 'edit']);
Route::patch('/foodcat/destroy/{id}', [FoodCategoryController::class, 'destroy']);

Route::get('/fridge', [FridgeController::class, 'index'])->name('fridge');
Route::get('/fridge/create', [FridgeController::class, 'create'])->name('add-fridge');
Route::post('/fridge/store', [FridgeController::class, 'store']);