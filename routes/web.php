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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('role', [
//     'middleware' => 'role: Tester'
//     ,'uses' => 'TestController@test'
// ]);

// Route::get('test/{id}/{param}', function($id, $param) {
//     return $id.' '.$param;
// }) -> where(['id' => '[0-9]*', 'param' => '[a-z]*']);

// Route::prefix('user') -> group(function() {
//     Route::get('{id}', 'TestController@testCalling') -> name('id');
// });

// Route::get('{id}', 'TestController@testCalling');

// Route::get('test/{id}/{name}', 'TestController@testView');

// Route::get('login', 'TestController@getLogin');

// Route::post('login', 'TestController@postLogin');

// Route::get('master', function() {
//     return view('master');
// });

// Route::get('testarray', 'TestController@testArray');

// Route::group(['prefix' => 'admin'], function() {
//     Route::name('admin.')->group(function() {
//         Route::get('testarray', 'TestController@testArray')->name('testarray');
//     });    
// });

// Route::name('admin')->group(['prefix' => 'admin'], function(){
//     Route::get('testarray', 'TestController@testArray')->name('testarray');
// });

// Route::group(['prefix' => 'admin'], function() {
//     Route::get('testarray', 'TestController@testArray')->name('testarray');
// });

Route::group(['prefix' => 'test'], function() {
    Route::name('test.')->group(function() {
        Route::get('{id}/{name}', 'TestController@testView')->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+'])->name('testView');
        Route::get('login', 'TestController@getLogin')->name('getLogin');
        Route::post('login', 'TestController@postLoginUseFormRequest')->name('postLogin');
        Route::get('master', function() {
            return view('master.master');
        })->name('master');
        Route::get('testarray', 'TestController@testArray')->name('testarray');
        Route::group(['prefix' => 'table'], function() {
            Route::name('table.')->group(function() {
                Route::get('create-table', function() {
                    Schema::create('test', function($table) {
                        $table->increments('id');
                        $table->string('username', 100);
                        $table->string('pass', 255);
                    });
                })->name('create_table');
                Route::get('rename-table', function() {
                    Schema::rename('test', 'admin');
                })->name('rename-table');
                Route::get('delete-table', function() {
                    Schema::drop('admin');
                })->name('delete-table');
                Route::get('view-data', 'TestController@viewDatabase')->name('view_data');
            });
        });
        Route::get('setcookie', 'TestController@setCookie')->name('setCookie');
        Route::get('getcookie', 'TestController@getCookie')->name('getCookie');
        Route::get('uploadfile', 'TestController@getUploadFile')->name('getUploadFile');
        Route::post('uploadfile', 'TestController@postUploadFile')->name('postUploadFile');
        Route::get('max', function() {
            echo ini_get('post_max_size').'<br>'.ini_get('upload_max_filesize');
        });
        Route::get('delete', function() {
            Storage::delete('files/1.jpeg');
            // Storage::disk('local')->delete('storage/files/.gitconfig');
            // echo base_path();
        });
        // Route::get('test_new/{abc}\\?id={id}\\&name={name?}', function($id, $name = null) {
        //     echo 'okay';
        //     echo '<br>'.$id.'<br>'.$name;
        // })->where(['abc' => 'abc', 'id' => '[0-9]+', 'name' => '[a-z]+']);
        // Route::get('test_new/{id}/{name?}', function($id, $name = null) {
        //     echo $id.' '.$name;
        // });
        Route::get('test_new/{url}', function() {
            echo 'okay';
        })->middleware('testCheckURL');
        // Route::get('regex/{str}', function($str) {
        //     $patt = '/^(search\?q\=).+$/';
        //     if(preg_match($patt, $str)) echo 'yup'; else echo 'nope';
        // });
        Route::get('abort', function() {
            // abort(404);
            echo url()->full();
        });
        Route::get('after/{num}', function($num) {
            return ($num + 5);
        })->middleware('afterMiddleware');
    });
});