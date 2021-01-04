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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

    Route::get('/{id}/inventory', 'App\Http\Controllers\InventoryController@index')->name('inventory.index');
    Route::get('/{id}/{stock_id}/inventory', 'App\Http\Controllers\InventoryController@detail')->name('inventory.detail');
    Route::post('/{id}/{stock_id}/inventory', 'App\Http\Controllers\InventoryController@edit');

    Route::get('/sales_management', 'App\Http\Controllers\SalesController@sales')->name('sales.index');
    Route::post('/sales_management', 'App\Http\Controllers\SalesController@createsales');

    Route::get('/{store_id}/sales_prev', 'App\Http\Controllers\SalesPrevController@sales_prev')->name('sales_prev.index');
    Route::post('/{store_id}/sales_prev', 'App\Http\Controllers\SalesPrevController@date_search');
    Route::get('/{store_id}/{sales_id}/sales_prev', 'App\Http\Controllers\SalesPrevDetailController@detail')->name('sales_prev.detail');
    Route::post('/{store_id}/{sales_id}/sales_prev', 'App\Http\Controllers\SalesPrevDetailController@edit');

    Route::get('/configuration/person', 'App\Http\Controllers\ConfigController@config')->name('config.index');
    Route::post('/configuration/person', 'App\Http\Controllers\configController@config_edit');
    Route::get('/configuration/stock', 'App\Http\Controllers\ConfigStockController@stock')->name('config.stock');
    Route::post('/configuration/stock', 'App\Http\Controllers\ConfigStockController@stock_edit');
});

Auth::routes();

Route::group(['middleware' => ['auth.admin']], function() {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.index');
    Route::post('/admin/logout', 'App\Http\Controllers\Admin\AdminLogoutController@logout')->name('admin.logout');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\ManageProductController@index')->name('admin.products');
    Route::post('/admin/products', 'App\Http\Controllers\Admin\ManageProductController@edit');
    Route::get('/admin/product_types', 'App\Http\Controllers\Admin\ManageProductTypeController@index')->name('admin.product_types');
    Route::post('/admin/product_types', 'App\Http\Controllers\Admin\ManageProductTypeController@edit');
    Route::get('/admin/stores', 'App\Http\Controllers\Admin\ManageStoreController@index')->name('admin.stores');
    Route::post('/admin/stores', 'App\Http\Controllers\Admin\ManageStoreController@edit');
});

Route::get('/admin/login', 'App\Http\Controllers\Admin\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\Admin\AdminLoginController@login');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
