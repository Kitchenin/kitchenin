<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Get all categories and sub-categories.
 */
Route::get('categories', 'Api\CategoryController@index');


Route::group([
    'prefix' => 'basket',
], function () {
    /**
     * Add item to basket.
     */
    Route::post('getItem', 'Api\BasketController@getItem');

    /**
     * Remove item from basket.
     */
    Route::delete('removeItem/{id}', 'Api\BasketController@removeItem');

    /**
     * Update item in basket.
     */
    Route::post('updateItem/{id}', 'Api\BasketController@updateItem');

    /**
     * Get all items from basket.
     */
    Route::get('getBasketItems', 'Api\BasketController@getBasketItems');

    /**
     * Prepare orders
     */
    Route::post('prepareOrder', 'Api\OrderController@prepareOrder');
});

/**
 * Get product object by given Id.
 */
Route::get('product/{slug}', 'Api\ProductController@getItem');

/**
 * Get product object by given Id.
 */
Route::get('category/{slug}', 'Api\CategoryController@getItems');


Route::get('settings', 'Api\SettingsController@getAllSettings');
Route::get('settings/{name}', 'Api\SettingsController@getSettingByName');

Route::get('pages',        'Api\PageController@getAllPages');
Route::get('pages/{slug}', 'Api\PageController@getPageBySlug');

Route::get('articles',        'Api\ArticleController@getArticles');
Route::get('articles/{slug}', 'Api\ArticleController@getArticle');

Route::post('checkout/quote', 'Api\CheckoutController@quote');
Route::post('checkout/validate', 'Api\CheckoutController@validateOrder');
Route::post('checkout/stripe', 'Api\CheckoutController@stripePayment');
Route::post('checkout/stripe/session', 'Api\CheckoutController@stripeSession');
Route::post('checkout/paypal', 'Api\CheckoutController@paypalCreateOrder');
Route::post('checkout/pending', 'Api\CheckoutController@pending');
Route::post('checkout/confirm', 'Api\CheckoutController@confirm');
