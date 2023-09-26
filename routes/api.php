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
     // posts routes
               Route::group(['middleware' => ['auth:sanctum']], function () {
                  Route::get('/product', [ProductController::class, 'index']); 
                  Route::get('/product/{id}', [ProductController::class, 'show']);
                  Route::post('/product', [ProductController::class, 'store']); 
                  Route::post('/product/{id}', [ProductController::class, 'update']);
                  Route::post('/deleteProduct/{id}', [ProductController::class, 'destroy']);
                  });
        
     ############### Category routes#################### 
 // categoies routes
         Route::group(['middleware' => ['auth:sanctum']], function () {
               Route::get('/category', [CategoryController::class, 'index']);
               Route::get('/category/{id}', [CategoryController::class, 'show']);  
               Route::post('/category', [CategoryController::class, 'store']); 
               Route::post('/category/{id}', [CategoryController::class, 'update']);
               Route::post('/deletecategory/{id}', [CategoryController::class, 'destroy']);

           



         });
        

     ############### login route  #####################
     Route::post('/login', [loginController::class, 'login']); 
     Route::post('/logout', [loginController::class, 'logout'])->middleware('auth:sanctum');
    