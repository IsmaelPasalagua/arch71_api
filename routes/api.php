<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
| and dont forget the 'Quetzal' piece
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for Product CRUD
Route::get('/products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@show');
Route::post('/products', 'ProductController@store');
Route::put('/products/{id}', 'ProductController@update');
Route::delete('/products/{id}', 'ProductController@destroy');
Route::post('/products/search', 'ProductController@search');

// Route for Category CRUD
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');
Route::post('/categories', 'CategoryController@store');
Route::put('/categories/{id}', 'CategoryController@update');
Route::delete('/categories/{id}', 'CategoryController@destroy');

// Route for Sale CRUD
Route::get('/sales', 'SaleController@index');
Route::get('/sales/{id}', 'SaleController@show');
Route::post('/sales', 'SaleController@store');
Route::put('/sales/{id}', 'SaleController@update');
Route::delete('/sales/{id}', 'SaleController@destroy');

// Route for Customer CRUD
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/{id}', 'CustomerController@show');
Route::post('/customers', 'CustomerController@store');
Route::put('/customers/{id}', 'CustomerController@update');
Route::delete('/customers/{id}', 'CustomerController@destroy');
Route::post('/customers/search', 'CustomerController@search');