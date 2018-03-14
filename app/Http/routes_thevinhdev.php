<?php

Route::get('/', ['as'=>'homeindex', 'uses'=>'WelcomeController@index']);

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('foo', function () {
    return 'Hello World';
});