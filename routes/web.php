<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\WarehouseController;

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

Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Employees
    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', [ProfileController::class, 'index']);
        Route::get('/addemployee', [ProfileController::class, 'addemployee'])->name('addemployee');
        Route::post('/addemployee', [ProfileController::class, 'store']);
        Route::get('/profile/{id}', [ProfileController::class, 'show']);
        Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('editprofile');
        Route::put('/profile/{id}/edit', [ProfileController::class, 'update']);
        Route::get('/profile/{id}/change-password', [ProfileController::class, 'changepassword'])->name('changepassword');
        Route::put('/profile/{id}/change-password', [ProfileController::class, 'updatepassword']);
        Route::get('/profile/{id}/change-role', [ProfileController::class, 'changerole'])->name('changerole');
        Route::put('/profile/{id}/change-role', [ProfileController::class, 'updaterole']);
        Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('destroyemployeee');
    });
    // Companies
    Route::group(['prefix' => 'companies'], function() {
        Route::get('/', [CompaniesController::class, 'index']);
        Route::get('/addcompany', [CompaniesController::class, 'addcompany'])->name('addcompany');
        Route::post('/addcompany', [CompaniesController::class, 'store']);
        Route::get('/profile/{id}', [CompaniesController::class, 'show']);
        Route::get('/profile/{id}/edit', [CompaniesController::class, 'edit'])->name('editcompany');
        Route::put('/profile/{id}/edit', [CompaniesController::class, 'update']);
        Route::delete('/profile/{id}', [CompaniesController::class, 'destroy'])->name('destroycompany');
    });
    // Warehouse
    Route::group(['prefix' => 'warehouse'],function () {
        Route::get('/', [WarehouseController::class, 'index']);
        Route::get('/items/additem', [WarehouseController::class, 'additem'])->name('additem');
        Route::post('/items/additem', [WarehouseController::class, 'store']);
        Route::get('/items/{id}', [WarehouseController::class, 'showitem']);
        Route::get('/items/{id}/edit', [WarehouseController::class, 'edititem'])->name('edititem');
        Route::put('/items/{id}/edit', [WarehouseController::class, 'itemupdate']);
        Route::delete('/items/{id}', [WarehouseController::class, 'destroyitem'])->name('destroyitem');
    });
    // Warehouse - Category
    Route::group(['prefix' => 'warehouse/category'],function () {
        Route::get('/', [WarehouseController::class, 'categoryindex']);
        Route::get('/addcategory', [WarehouseController::class, 'addcategory'])->name('addcategory');
        Route::post('/addcategory', [WarehouseController::class, 'storecategory']);
        Route::get('/{id}/edit', [WarehouseController::class, 'editcategory'])->name('editcategory');
        Route::put('/{id}/edit', [WarehouseController::class, 'categoryupdate']);
        Route::delete('/{id}', [WarehouseController::class, 'destroycategory'])->name('destroycategory');
    });
    // Warehouse - Location
    Route::group(['prefix' => 'warehouse/location'],function () {
        Route::get('/', [WarehouseController::class, 'locationindex']);
    });
});


