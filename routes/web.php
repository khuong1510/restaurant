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

// =============== HOME PAGE =================
Route::group(['prefix' => '/', 'namespace'=>'HomePageController'], function() {

    Route::get('/', 'HomeController@index');

    Route::get('/service', 'HomeController@service');

    Route::get('/contact', 'HomeController@contact');

    Route::get('/menu', 'HomeController@menu');

    Route::get('/gallery', 'HomeController@gallery');
});
// =============== END HOME PAGE =================

// =============== ADMIN PAGE =================
Route::group([  'prefix' => '/admin',
                'namespace'=>'AdminController',
                'middleware' => 'loginAdmin'], function() {

    Route::get('/', function () {
        return view('admin.subpage.dashboard.dashboard');
    });

        // =============== NavBar PAGE =================

    Route::group(['prefix' => '/navbar'], function(){
      
      // Get navbar list
      Route::get('/', 'NavBarController@index');
      
      // Display page create new navbar and execute
      Route::get('/add', 'NavBarController@create');
      Route::post('/store', 'NavBarController@store');

    });
        // =============== END NavBar PAGE =================

    // ======== USERS MANAGEMENT ==========
    Route::group(['prefix' => '/user'], function() {

        // Get users list
        Route::get('/', 'UserController@list');
        Route::post('/', 'UserController@filter');

        // Get add page and execute
        Route::get('/add', 'UserController@add');
        Route::post('/create', 'UserController@create');

        // Get edit page and execute
        Route::get('/edit/{id}', 'UserController@edit');
        Route::post('/update', 'UserController@update');

        // Disable user
        Route::get('change-status', 'UserController@changeUserStatus');

    });
    // ======== END USERS MANAGEMENT ==========

    // ======== CONFIG MANAGEMENT ==========
    Route::group(['prefix' => '/config'], function() {

        // Get homepage config
        Route::get('/homepage', 'ConfigController@showHomepage');
        Route::post('/homepage', 'ConfigController@updateHomepage');

    });
    // ======== END CONFIG MANAGEMENT ==========
});

Route::get('/admin/login', 'AdminController\UserController@getLogin');
Route::post('/admin/login', 'AdminController\UserController@postLogin');
Route::get('/admin/logout', 'AdminController\UserController@getLogout');

// =============== END ADMIN PAGE =================
