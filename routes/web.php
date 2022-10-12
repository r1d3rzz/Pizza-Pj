<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//For Users
Route::get('/', [FrontendController::class, 'index'])->name('frontend');
Route::get('/pizza/{id}/order', [FrontendController::class, 'show'])->name('pizza.order');
Route::post('/pizza/order', [FrontendController::class, 'store'])->name('order.store');
Route::get('/pizza/category',[CategoryController::class,'index'])->name('pizza.category');


//for Pizza Routes
Route::middleware(['admin','auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/pizza',[PizzaController::class,'index'])->name('pizza.index');
        Route::get('/pizza/create',[PizzaController::class,'create'])->name('pizza.create');
        Route::post('/pizza/store',[PizzaController::class,'store'])->name('pizza.store');
        Route::get('/pizza/{id}/edit',[PizzaController::class,'edit'])->name('pizza.edit');
        Route::put('/pizza/{id}/update',[PizzaController::class,'update'])->name('pizza.update');
        Route::delete('/pizza/{id}/destroy',[PizzaController::class,'destroy'])->name('pizza.destroy');
        Route::get('/user/order',[UserOrderController::class,'index'])->name('user.order');
        Route::put('/order/{id}/status',[UserOrderController::class,'statusChangeHandler'])->name('order.status');
        Route::get('/customers',[UserOrderController::class,'users'])->name('pizza.customers');
        Route::post('/pizza/category',[CategoryController::class,'store'])->name('category.store');
    });
});

