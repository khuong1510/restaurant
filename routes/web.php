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

    // =============== NAVBAR PAGE =================
    Route::group(['prefix' => '/navbar'], function(){
        // Get navbar list
        Route::get('/', 'NavbarController@index');
        Route::post('/', 'NavbarController@filter');
        Route::post('/show-fields', 'NavbarController@showByFields');
        Route::get('/change-size-page', 'NavbarController@changeSizePage');

        // Display page create new navbar and execute
        Route::get('/add', 'NavbarController@create');
        Route::post('/store', 'NavbarController@store')->name('navbar.store');

        // Get edit page and execute
        Route::get('/edit/{id}', 'NavbarController@edit');
        Route::post('/update', 'NavbarController@update')->name('navbar.update');

        // Delete navbar link
        Route::get('/delete/{id}', 'NavbarController@destroy');

        // Get navbar by page type
        Route::get('/load-navbar/{pageType}', 'NavbarController@getNavbarByPageType');
    });
    // =============== END NAVBAR PAGE =================

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

    // ======== MENU MANAGEMENT ==========
    Route::group(['prefix' => '/menu'], function() {
        // Get list menu
        Route::get('/', 'MenuController@index');
        Route::post('/', 'MenuController@filter');
        Route::post('/show-fields', 'MenuController@showByFields');
        Route::get('/change-size-page', 'MenuController@changeSizePage');

        // Add new menu
        Route::get('/add', 'MenuController@create');
        Route::post('/create', 'MenuController@store');

        // Update menu
        Route::get('/edit/{id}', 'MenuController@edit');
        Route::post('/update', 'MenuController@update');

        // Delete menu
        Route::get('/delete/{id}', 'MenuController@destroy');
    });
    // ======== END MENU MANAGEMENT ==========
});

Route::get('/admin/login', 'AdminController\UserController@getLogin');
Route::post('/admin/login', 'AdminController\UserController@postLogin');
Route::get('/admin/logout', 'AdminController\UserController@getLogout');

// =============== END ADMIN PAGE =================
