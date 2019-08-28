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

Route::get('/', function () {
    return view('welcome');
});

Route::get('role', [
    'middleware' => 'role: Tester'
    ,'uses' => 'TestController@test'
]);

// Route::get('test/{id}/{param}', function($id, $param) {
//     return $id.' '.$param;
// }) -> where(['id' => '[0-9]*', 'param' => '[a-z]*']);

Route::prefix('user') -> group(function() {
    Route::get('{id}', 'TestController@testCalling') -> name('id');
});

// Route::get('{id}', 'TestController@testCalling');

Route::get('test/{id}/{name}', 'TestController@testView');

Route::get('login', 'TestController@getLogin');

Route::post('login', 'TestController@postLogin');

Route::get('master', function() {
    return view('master');
});

Route::get('testarray', 'TestController@testArray');

Route::group(['prefix' => 'admin'], function() {
    Route::name('admin.')->group(function() {
        Route::get('testarray', 'TestController@testArray')->name('testarray');
    });    
});

// Route::name('admin')->group(['prefix' => 'admin'], function(){
//     Route::get('testarray', 'TestController@testArray')->name('testarray');
// });

// Route::group(['prefix' => 'admin'], function() {
//     Route::get('testarray', 'TestController@testArray')->name('testarray');
// });