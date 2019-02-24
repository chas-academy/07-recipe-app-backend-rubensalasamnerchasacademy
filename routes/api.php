<?php


Route::group([

    'middleware' => 'api',

], function () {

    Route::post('reciperemove', 'RecipeController@destroy');
    Route::post('recipesdetail', 'RecipeController@store');
    Route::get('recipeslist', 'RecipeController@show');
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    
    

});
