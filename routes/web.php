<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projectController;
use App\Http\Controllers\rewardController;
use App\Http\Controllers\teamController;
use App\Http\Controllers\testimonialsController;
use App\Http\Controllers\updaateController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\userController;
use App\Http\Controllers\StripeController;

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

//auth route for both
Route::group(['middleware' =>['auth']],function(){
    Route::get('/dashboard','App\Http\Controllers\DashboardControlller@index')->name('dashboard');
    Route::get('/about','App\Http\Controllers\aboutController@index')->name('about');
    Route::get('/testimonial','App\Http\Controllers\testimonialsController@test')->name('testimonial');
    Route::get('/teams','App\Http\Controllers\teamController@test')->name('teams');

});
Route::group(['middleware' =>['auth','role:admin']],function(){

    Route::resource('/project', projectController::class);
    Route::resource('/reward', rewardController::class);
    Route::resource('/updates', updaateController::class);
    Route::resource('/team', teamController::class);
    Route::resource('/testimonials', testimonialsController::class);
    Route::resource('/comment', commentController::class);


    //Route::post('project', 'ProjectController@store')
    });
    Route::group(['middleware' =>['auth','role:projectinvestor']],function(){
        Route::post('/detail/{id}','App\Http\Controllers\DetailController@store')->name('detail');
        //Route::put('/detail/{id}','App\Http\Controllers\DetailController@store')->name('detail');
        Route::get('/detail/{id}','App\Http\Controllers\DetailController@create')->name('detail');

        Route::get('/detail/{id}','App\Http\Controllers\DetailController@show')->name('detail');
        //Route::post ('/payment', [userController::class,'call'] )->name('payment');
        //Route::get ( '/payment', function () {
          //  return view ( 'project.cardform' );
        //}
        Route::get('stripe', [StripeController::class, 'index'])->name('stripe');
Route::post('payment-process', [StripeController::class, 'process']);
    // });
        //Route::post('project', 'ProjectController@store')
        });
        Route::group(['middleware' =>['auth','role:projectresponsable']],function(){
            Route::post('/deatil1/{id}','App\Http\Controllers\projectresponsableController@store')->name('detail1');
            //Route::put('/detail/{id}','App\Http\Controllers\DetailController@store')->name('detail');
            Route::get('/deatil1/{id}','App\Http\Controllers\projectresponsableController@create')->name('detail1');
            Route::post('/rewardlist','App\Http\Controllers\projectresponsableController@storeres')->name('detail1');
            Route::get('/createlist','App\Http\Controllers\projectresponsableController@index')->name('createres');
            Route::post('/createlist','App\Http\Controllers\projectresponsableController@storere')->name('detail1');
            Route::get('/rewardlist','App\Http\Controllers\projectresponsableController@createre')->name('createre');

            Route::get('/createres','App\Http\Controllers\projectresponsableController@createres')->name('createres');
            Route::get('/deatil1/{id}','App\Http\Controllers\projectresponsableController@show')->name('detail1');
//storere
            //Route::post('project', 'ProjectController@store')
            });
require __DIR__.'/auth.php';
