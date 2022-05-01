<?php

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
use App\Http\Controllers\UserController;


Route::get('/home', function () {
    return view('welcome');
});


Route::get('/save','UserController@insert');

Route::get('/details','UserController@show');

Route::post('/store','UserController@storein');

Route::get('/deleterecord/{id}','UserController@deletedata');

Route::get('/updateform/{id}','UserController@updatefrm');

Route::put('/update/{id}','UserController@updatedata');

Route::get('/getuser','UserController@getuser');

Route::get('/delrecord/{id}','UserController@deletedata');

Route::get('/getdetail','UserController@getdetails');

Route::get('/getdata','UserController@getrecord');

// Route::get('/login','UserController@loginpage');

// Route::get('/login','UserController@loginpage');
Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[UserController::class,'loginpage'])->name('login');
    Route::post('login',[UserController::class,'saveLogin'])->name('login');
    
    Route::get('register',[UserController::class,'registerpage'])->name('register');
    Route::post('register',[UserController::class,'saveRegister'])->name('register');
    
});
Route::group(['middleware'=>'auth'],function(){
    Route::get('home',[UserController::class,'home'])->name('home');
    Route::get('logout',[UserController::class,'logout'])->name('logout');
});
