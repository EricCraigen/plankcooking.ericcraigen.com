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

Route::get("/", [
    "uses" => "SinglePagesController@getHomePage",
    "as" => "home"
]);


Route::group(["prefix" => "/"], function() {

    Route::get("about", [
        "uses" => "SinglePagesController@getAboutPage",
        "as" => "about"
    ]);

    Route::get("contact", [
        "uses" => "SinglePagesController@getContactPage",
        "as" => "contact"
    ]);

    Route::get("recipes", [
        "uses" => "SinglePagesController@getRecipesPage",
        "as" => "recipes"
    ]);

    Route::get("reviews", [
        "uses" => "SinglePagesController@getReviewsPage",
        "as" => "reviews"
    ]);

    Route::get("testimonials", [
        "uses" => "SinglePagesController@getTestimonialsPage",
        "as" => "testimonials"
    ]);

});

Route::group(["prefix" => "shop"], function() {

    Route::get("/", [
        "uses" => "ShopController@getShopHomePage",
        "as" => "shop"
    ]);
    Route::get("/spicerubs", [
        "uses" => "ShopController@getSpiceRubsPage",
        "as" => "spicerubs"
    ]);

    Route::get("/cookbooks", [
        "uses" => "ShopController@getCookbooksPage",
        "as" => "cookbooks"
    ]);

    Route::get("/bakingplanks", [
        "uses" => "ShopController@getBakingPlanksPage",
        "as" => "bakingplanks"
    ]);

    Route::get("/bbqplanks", [
        "uses" => "ShopController@getBBQPlanksPage",
        "as" => "bbqplanks"
    ]);

    Route::get("/nutdriver", [
        "uses" => "ShopController@getNutDriverPage",
        "as" => "nutdriver"
    ]);

    Route::post("/spicerubs", [
        "uses" => "ShopController@postAddToCart",
        "as" => "spicerubs"
    ]);

    Route::post("/bakingplanks", [
        "uses" => "ShopController@postAddToCart",
        "as" => "bakingplanks"
    ]);

    Route::post("/cookbooks", [
        "uses" => "ShopController@postAddToCart",
        "as" => "cookbooks"
    ]);

    Route::post("/bbqplanks", [
        "uses" => "ShopController@postAddToCart",
        "as" => "bbqplanks"
    ]);

    Route::post("/nutdriver", [
        "uses" => "ShopController@postAddToCart",
        "as" => "nutdriver"
    ]);

});

Route::group(["prefix" => "cart"], function() {

    Route::get("/", [
        "uses" => "CartController@getCartHomePage",
        "as" => "cart"
    ]);

    Route::get("/checkout", [
        "uses" => "CartController@getCartCheckoutPage",
        "as" => "checkout"
    ]);

    Route::post("/", [
        "uses" => "CartController@postRemoveFromCart",
        "as" => "cart"
    ]);
    
    Route::any("/preview", [
        "uses" => "CartController@postCheckout",
        "as" => "preview"
    ]);

    Route::any("/receipt", [
        "uses" => "CartController@postCartReceiptPage",
        "as" => "receipt"
    ]);
});