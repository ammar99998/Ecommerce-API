<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;


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

// Route::get('/', function () {
//     return view('welcome');
// });



        Route::get('/product', [ProductController::class, 'index'])->name('books.show'); 
        Route::post('/product', [ProductController::class, 'create'])->name('books.insert'); 
        Route::post('/product/{id}', [ProductController::class, 'update'])->name('books.update');
        Route::post('p-delete/{id}', [ProductController::class, 'delete'])->name('books.delete');






Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        
        
        
        	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::get('/', function()
	{
		return view('welcome');
	});



    });