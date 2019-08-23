<?php


Route::group([

    'middleware' => 'api',

], function () {
    Route::delete('reciperemove/{id}', 'RecipeController@destroy');
    Route::post('recipesdetail', 'RecipeController@store');
    Route::get('recipeslist', 'RecipeController@index');
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
