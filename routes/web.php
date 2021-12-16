<?php

use App\model\trainee;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

// login
Route::prefix('login')->group(function(){
    Route::get('/',[
        'as' => 'login.form',
        'uses' => 'loginController@login_form'
    ]);
    Route::post('/login_check',[
        'as' => 'login.check',
        'uses' => 'loginController@login_check'
    ]);
    Route::get('/logout',[
        'as' => 'logout',
        'uses' => 'loginController@logout'
    ]);
});

// admin
Route::prefix('admin')->group(function(){
    Route::get('/',[
        'as' => 'home.index',
        'uses' => 'admin\homeController@index',
        'middleware' => 'can:admin'
    ]);
    Route::prefix('user')->group(function(){
        // trainee
        Route::prefix('trainee')->group(function(){
            Route::get('/',[
                'as' => 'user.index_trainee',
                'uses' => 'admin\userController@index_trainee',
                'middleware' => 'can:admin'
            ]);
            Route::get('/create',[
                'as' => 'user.create_trainee',
                'uses' => 'admin\userController@create_trainee',
                'middleware' => 'can:admin'
            ]);
            Route::post('/store',[
                'as' => 'user.store_trainee',
                'uses' => 'admin\userController@store_trainee',
                'middleware' => 'can:admin'
            ]);
            Route::get('/edit/{id}',[
                'as' => 'user.edit_trainee',
                'uses' => 'admin\userController@edit_trainee',
                'middleware' => 'can:admin'
            ]);
            Route::post('/update/{id}',[
                'as' => 'user.update_trainee',
                'uses' => 'admin\userController@update_trainee',
                'middleware' => 'can:admin'
            ]);
            Route::post('/delete',[
                'as' => 'user.delete_trainee',
                'uses' => 'admin\userController@delete_trainee',
                'middleware' => 'can:admin'
            ]);
        });
        // trainer
        Route::prefix('trainer')->group(function(){
            Route::get('/',[
                'as' => 'user.index_trainer',
                'uses' => 'admin\userController@index_trainer',
                'middleware' => 'can:admin'
            ]);
            Route::get('/create',[
                'as' => 'user.create_trainer',
                'uses' => 'admin\userController@create_trainer',
                'middleware' => 'can:admin'
            ]);
            Route::post('/store',[
                'as' => 'user.store_trainer',
                'uses' => 'admin\userController@store_trainer',
                'middleware' => 'can:admin'
            ]);
            Route::get('/edit/{id}',[
                'as' => 'user.edit_trainer',
                'uses' => 'admin\userController@edit_trainer',
                'middleware' => 'can:admin'
            ]);
            Route::post('/update/{id}',[
                'as' => 'user.update_trainer',
                'uses' => 'admin\userController@update_trainer',
                'middleware' => 'can:admin'
            ]);
            Route::post('/delete',[
                'as' => 'user.delete_trainer',
                'uses' => 'admin\userController@delete_trainer',
                'middleware' => 'can:admin'
            ]);
        });
    });
    Route::prefix('category')->group(function(){
        Route::get('/',[
            'as' => 'category.index',
            'uses' => 'admin\categoryController@index',
            'middleware' => 'can:admin'
        ]);
        Route::get('/create',[
            'as' => 'category.create',
            'uses' => 'admin\categoryController@create',
            'middleware' => 'can:admin'
        ]);
        Route::post('/store',[
            'as' => 'category.store',
            'uses' => 'admin\categoryController@store',
            'middleware' => 'can:admin'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'category.edit',
            'uses' => 'admin\categoryController@edit',
            'middleware' => 'can:admin'
        ]);
        Route::post('/update/{id}',[
            'as' => 'category.update',
            'uses' => 'admin\categoryController@update',
            'middleware' => 'can:admin'
        ]);
        Route::post('/delete',[
            'as' => 'category.delete',
            'uses' => 'admin\categoryController@delete',
            'middleware' => 'can:admin'
        ]);
    });
    Route::prefix('course')->group(function(){
        Route::get('/',[
            'as' => 'course.index',
            'uses' => 'admin\courseController@index',
            'middleware' => 'can:admin'
        ]);
        Route::get('/create',[
            'as' => 'course.create',
            'uses' => 'admin\courseController@create',
            'middleware' => 'can:admin'
        ]);
        Route::post('/store',[
            'as' => 'course.store',
            'uses' => 'admin\courseController@store',
            'middleware' => 'can:admin'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'course.edit',
            'uses' => 'admin\courseController@edit',
            'middleware' => 'can:admin'
        ]);
        Route::post('/update/{id}',[
            'as' => 'course.update',
            'uses' => 'admin\courseController@update',
            'middleware' => 'can:admin'
        ]);
        Route::post('/delete',[
            'as' => 'course.delete',
            'uses' => 'admin\courseController@delete',
            'middleware' => 'can:admin'
        ]);
    });
    Route::prefix('topic/{id_course}')->group(function(){
        Route::get('/',[
            'as' => 'topic.index',
            'uses' => 'admin\topicController@index',
            'middleware' => 'can:admin'
        ]);
        Route::get('/create',[
            'as' => 'topic.create',
            'uses' => 'admin\topicController@create',
            'middleware' => 'can:admin'
        ]);
        Route::post('/store',[
            'as' => 'topic.store',
            'uses' => 'admin\topicController@store',
            'middleware' => 'can:admin'
        ]);
        Route::get('edit/{id}',[
            'as' => 'topic.edit',
            'uses' => 'admin\topicController@edit',
            'middleware' => 'can:admin'
        ]);
        Route::post('/update/{id}',[
            'as' => 'topic.update',
            'uses' => 'admin\topicController@update',
            'middleware' => 'can:admin'
        ]);
        Route::post('/delete',[
            'as' => 'topic.delete',
            'uses' => 'admin\topicController@delete',
            'middleware' => 'can:admin'
        ]);
    });
});

// user
Route::prefix('/')->group(function(){
    Route::get('/',[
        'as' => 'home.home',
        'uses' => 'user\homeController@index'
    ]);
    Route::get('/single_course/{id}',[
        'as' => 'home.single_course',
        'uses' => 'user\homeController@single_course'
    ]);
    Route::post('/view_topic',[
        'as' => 'home.view_topic',
        'uses' => 'user\homeController@view_topic'
    ]);
    Route::post('/search_course',[
        'as' => 'home.search_course',
        'uses' => 'user\homeController@search_course'
    ]);
    Route::post('/search_dropdown',[
        'as' => 'home.search_dropdown',
        'uses' => 'user\homeController@search_dropdown'
    ]);
    Route::post('/search_option',[
        'as' => 'home.search_option',
        'uses' => 'user\homeController@search_option'
    ]);
});