<?php


Route::group([
    'middleware' => 'jwt.auth',
], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('user/terms', 'TermsController@activeTerms');
    Route::post('user/terms/save', 'TermsController@saveUserTermsStatus');
    Route::post('hotel-search','SearchController@hotelSearch');
    Route::post('search-suggestion','SearchController@searchSuggestion');
    Route::post('wishlist-store','WishListController@storeWishList');
    Route::post('wishlist-get','WishListController@getWishList');
    Route::post('destination-get','DestinationController@getDestination');
    Route::post('hotel-get','HotelController@hotelDetails');
    Route::post('hotel-all','HotelController@getAllHotel');


});
Route::post('login', 'AuthController@login');

Route::get('/image-api-link','HotelController@getApiLink');





