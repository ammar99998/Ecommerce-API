<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\loginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   return $request->user();
   
   
});

/*this route to remember the last language and changing the language (AR , EN )*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        
        
        
        	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::get('/', function()
	{
		return View::make('hello');
	});



    });



     ############### product routes#################### 
     
        Route::get('/product', [ProductController::class, 'index'])->middleware('auth:sanctum'); 
        Route::post('/product', [ProductController::class, 'store'])->middleware('auth:sanctum'); 
        Route::post('/product/{id}', [ProductController::class, 'update'])->middleware('auth:sanctum');
        Route::post('/deleteProduct/{id}', [ProductController::class, 'destroy'])->middleware('auth:sanctum');
 ############### Category routes#################### 
 
        Route::get('/category', [CategoryController::class, 'index'])->middleware('auth:sanctum'); 
        Route::post('/category', [CategoryController::class, 'store'])->middleware('auth:sanctum'); 
        Route::post('/category/{id}', [CategoryController::class, 'update'])->middleware('auth:sanctum');
        Route::post('/deletecategory/{id}', [CategoryController::class, 'destroy'])->middleware('auth:sanctum');

    ############### login route  #####################
    Route::post('/login', [loginController::class, 'login']); 
   