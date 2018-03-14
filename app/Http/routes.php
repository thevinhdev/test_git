<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as'=>'homeindex', 'uses'=>'WelcomeController@index']);

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


// thực hiện với admin

Route::group(['prefix'=>'admin','middleware'=>'auth'], function () {
	// Bảng Category
	Route::group(['prefix'=>'cate'], function () {
		// Add
		Route::get('add',['as'=>'admin.cate.getAdd', 'uses'=>'CateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd', 'uses'=>'CateController@postAdd']);
		// Edit
		Route::get('edit/{id}',['as'=>'admin.cate.getEdit', 'uses'=>'CateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit', 'uses'=>'CateController@postEdit']);
		// List
		Route::get('list',['as'=>'admin.cate.getList', 'uses'=>'CateController@getList']);
		// Xóa
		Route::get('delete/{id}',['as'=>'admin.cate.getDelete', 'uses'=>'CateController@getDelete']);
	});
	
	//Bảng Product
	Route::group(['prefix'=>'product'], function () {
		// Add
		Route::get('add',['as'=>'admin.product.getAdd', 'uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd', 'uses'=>'ProductController@postAdd']);
		// Edit
		Route::get('edit/{id}',['as'=>'admin.product.getEdit', 'uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit', 'uses'=>'ProductController@postEdit']);
		// List
		Route::get('list',['as'=>'admin.product.getList', 'uses'=>'ProductController@getList']);
		// Xóa
		Route::get('delete/{id}',['as'=>'admin.product.getDelete', 'uses'=>'ProductController@getDelete']);
	});
	// bảng User
	Route::group(['prefix'=>'user'], function () {
		// Add
		Route::get('add',['as'=>'admin.user.getAdd', 'uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd', 'uses'=>'UserController@postAdd']);
		// Edit
		Route::get('edit/{id}',['as'=>'admin.user.getEdit', 'uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit', 'uses'=>'UserController@postEdit']);
		// List
		Route::get('list',['as'=>'admin.user.getList', 'uses'=>'UserController@getList']);
		// Xóa
		Route::get('delete/{id}',['as'=>'admin.user.getDelete', 'uses'=>'UserController@getDelete']);
	});

});

// Xây dựng Frontend test dao diện
Route::get('index', function () {
	return view('frontend.pages.index');
});

// Loại sản phẩm 
Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham', 'uses'=>'WelcomeController@loaiSanPham']);

// Chi tiết sản phẩm
Route::get('chi-tiet-san-pham/{id}/{tenloai}', ['as'=>'chitietsanpham','uses'=>'WelcomeController@chiTietSAnPham']);

// Liên hệ
Route::get('lien-he', ['as'=>'lienhe','uses'=>'WelcomeController@lienHe']);

// LaravelShoppingcart
//Route::get('mua-hang/{id}/{tensanpham}','uses'=>'WelcomeController@muaHang']);

// Search AutoComplete
Route::get('/autocomplete', ['as'=>'AutoComplete','uses'=>'WelcomeController@searchAutoComplete']);