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
|
*/

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/login', 'api\AuthController@login');
    Route::post('/register', 'api\AuthController@register');
    Route::post('/logout', 'api\AuthController@logout');
    Route::post('/refresh', 'api\AuthController@refresh');
    Route::get('/user-profile', 'api\AuthController@userProfile');    
});

Route::get('posts' , 'api\postController@index');
Route::get('posts/{id}' , 'api\postController@show');
Route::post('posts' , 'api\postController@store');
Route::put('posts/update' , 'api\postController@update');
Route::delete('posts/delete/{id}' , 'api\postController@delete');
