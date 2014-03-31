<?php
// POST, PUT, PATCH, DELETE メソッドに対して CSRF フィルターを適用
Route::when('*', 'csrf', array('POST', 'PUT', 'PATCH', 'DELETE'));
// Route 定義
// コントローラーで指定したり
Route::controller('user', 'UserController');
// 個別で指定したり
Route::get('/', 'HomeController@index');
Route::post('ribbit', 'HomeController@ribbit');
Route::post('follow', 'HomeController@follow');
Route::post('unfollow', 'HomeController@unfollow');
Route::get('profile/{username}', 'HomeController@profile');
