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

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
    'namespace' => 'Admin',
], function () {

    Route::get('/', 'HomeController@index');

    Route::post('ordering', 'HomeController@ordering');

    Route::get( 'photos',                'PhotoController@index');
    Route::post('photos',                'PhotoController@store');
    Route::get( 'photos/delete/{photo}', 'PhotoController@destroy');

    Route::get( 'categories',                   'CategoryController@index');
    Route::post('categories',                   'CategoryController@store');
    Route::get( 'categories/list',              'CategoryController@listAll');
    Route::get( 'categories/create',            'CategoryController@create');
    Route::get( 'categories/{category}',        'CategoryController@edit');
    Route::post('categories/{category}',        'CategoryController@update');
    Route::get( 'categories/delete/{category}', 'CategoryController@destroy');

    Route::get( 'groups',                'GroupController@index');
    Route::post('groups',                'GroupController@store');
    Route::get( 'groups/list',           'GroupController@listAll');
    Route::get( 'groups/create',         'GroupController@create');
    Route::get( 'groups/{group}',        'GroupController@edit');
    Route::post('groups/{group}',        'GroupController@update');
    Route::get( 'groups/delete/{group}', 'GroupController@destroy');

    Route::get( 'pages',               'PageController@index');
    Route::post('pages',               'PageController@store');
    Route::get( 'pages/list',          'PageController@listAll');
    Route::get( 'pages/create',        'PageController@create');
    Route::get( 'pages/{page}',        'PageController@edit');
    Route::post('pages/{page}',        'PageController@update');
    Route::get( 'pages/delete/{page}', 'PageController@destroy');

    Route::get( 'articles',                  'ArticleController@index');
    Route::post('articles',                  'ArticleController@store');
    Route::get( 'articles/list',             'ArticleController@listAll');
    Route::get( 'articles/create',           'ArticleController@create');
    Route::get( 'articles/{article}',        'ArticleController@edit');
    Route::post('articles/{article}',        'ArticleController@update');
    Route::get( 'articles/delete/{article}', 'ArticleController@destroy');

    Route::get( 'categories/{category}/products',        'ProductController@index');
    Route::post('categories/{category}/products',        'ProductController@store');
    Route::get( 'categories/{category}/products/list',   'ProductController@listAll');
    Route::get( 'categories/{category}/products/json',   'ProductController@listJson');
    Route::get( 'categories/{category}/products/create', 'ProductController@create');
    Route::post('products/parse',                        'ProductController@parsePrices');
    Route::get( 'products/{product}',                    'ProductController@edit');
    Route::post('products/{product}',                    'ProductController@update');
    Route::get( 'products/delete/{product}',             'ProductController@destroy');
    Route::post('products/{product}/import',             'ProductController@importPrices');

   /* Route::get( 'products/{product}/endings',        'EndingController@index');
    Route::post('products/{product}/endings',        'EndingController@store');
    Route::get( 'products/{product}/endings/list',   'EndingController@listAll');
    Route::get( 'products/{product}/endings/create', 'EndingController@create');*/
    Route::get( 'endings',                 'EndingController@index');
    Route::post('endings',                 'EndingController@store');
    Route::get( 'endings/list',            'EndingController@listAll');
    Route::get( 'endings/create',          'EndingController@create');
    Route::get( 'endings/{ending}',        'EndingController@edit');
    Route::post('endings/{ending}',        'EndingController@update');
    Route::get( 'endings/delete/{ending}', 'EndingController@destroy');

    Route::get( 'endinggroups',                       'EndingGroupController@index');
    Route::post('endinggroups',                       'EndingGroupController@store');
    Route::get( 'endinggroups/list',                  'EndingGroupController@listAll');
    Route::get( 'endinggroups/create',                'EndingGroupController@create');
    Route::get( 'endinggroups/{endingGroup}',         'EndingGroupController@edit');
    Route::post('endinggroups/{endingGroup}',         'EndingGroupController@update');
    Route::get( 'endinggroups/{endingGroup}/endings', 'EndingGroupController@listEndings');
    Route::get( 'endinggroups/delete/{endingGroup}',  'EndingGroupController@destroy');

    /*Route::get( 'products/{product}/colours',        'ColourController@index');
    Route::post('products/{product}/colours',        'ColourController@store');
    Route::get( 'products/{product}/colours/list',   'ColourController@listAll');
    Route::get( 'products/{product}/colours/create', 'ColourController@create');*/
    Route::get( 'colours',                  'ColourController@index');
    Route::post('colours',                  'ColourController@store');
    Route::get( 'colours/list',             'ColourController@listAll');
    Route::get( 'colours/create',           'ColourController@create');
    Route::get( 'colours/{colour}',         'ColourController@edit');
    Route::post('colours/{colour}',         'ColourController@update');
    Route::get( 'colours/delete/{colour}',  'ColourController@destroy');

    Route::get( 'colourgroups',                       'ColourGroupController@index');
    Route::post('colourgroups',                       'ColourGroupController@store');
    Route::get( 'colourgroups/list',                  'ColourGroupController@listAll');
    Route::get( 'colourgroups/create',                'ColourGroupController@create');
    Route::get( 'colourgroups/{colourGroup}',         'ColourGroupController@edit');
    Route::post('colourgroups/{colourGroup}',         'ColourGroupController@update');
    Route::get( 'colourgroups/{colourGroup}/colours', 'ColourGroupController@listColours');
    Route::get( 'colourgroups/delete/{colourGroup}',  'ColourGroupController@destroy');

    Route::get( 'orders',         'OrderController@index');
    Route::get( 'orders/list',    'OrderController@listAll');
    Route::get( 'orders/{order}', 'OrderController@edit');
    Route::post('orders/{order}', 'OrderController@update');

    Route::get( 'settings',                   'SettingController@index');
    Route::post('settings',                   'SettingController@store');
    Route::get( 'settings/list',              'SettingController@listAll');
    Route::get( 'settings/create',            'SettingController@create');
    Route::get( 'settings/{setting}',         'SettingController@edit');
    Route::post('settings/{setting}',         'SettingController@update');

    Route::get( 'script',                'ScriptController@index');
    Route::post('script/backup',         'ScriptController@backup');
    Route::post('script/restore',        'ScriptController@restore');
    Route::post('script/price/increase', 'ScriptController@increasePrices');
    Route::post('script/price/decrease', 'ScriptController@decreasePrices');
});

Route::group([
    'middleware' => 'web',
], function () {

    Route::get( 'login',    'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login',    'Auth\LoginController@login');
    Route::get( 'logout',   'Auth\LoginController@logout');

    Route::post('stripewebhook', 'StripeController@webhook');
    Route::post('paypalwebhook', 'PayPalController@webhook');

    Route::get('/', 'HomeController@index');
    Route::get('/{category_slug}','CategoryController@getChildren')
        ->name('category');
    Route::get('/{category_slug}/{child_slug}','CategoryController@getItems')
        ->name('category.items');

});
