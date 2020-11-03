<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home'); // deactivated
//..........................................................................................................................................
//.....................................frontend pages.......................................................................................
Route::get('/', 'FrontendController@index');
Route::get('/product-details/{id}', 'FrontendController@productDetails');
Route::get('/shop-view/','FrontendController@shopView');
Route::get('/shop-view/category/{id}','FrontendController@categoryView');
//video routes
Route::get('/video/play', 'FrontendController@playVideo');
//cart routes
Route::post('/cart/add/','CartController@addProduct');
Route::get('/cart/remove/{id}','CartController@removeProduct');
Route::post('/cart/update/','CartController@updateProduct');
//customer routes
Route::get('/customer/login-form','CustomerController@loginForm');
Route::post('/customer/register','CustomerController@customerRegister');
Route::post('/customer/login','CustomerController@customerLogin');
Route::get('/customer/logout','CustomerController@customerLogout');
//checkout routes
Route::get('/product/shipping','CheckoutController@shippingProduct');
Route::post('/product/shipping','CheckoutController@storeShipping');
Route::get('/shipping/edit/{id}','CheckoutController@editShipping');
Route::post('/shipping/update/{id}','CheckoutController@updateShipping');
Route::get('/payment-method','CheckoutController@paymentMethod');
Route::post('/order-confirm','CheckoutController@storeOrder');
//wishlist routes
Route::get('/wishlist-view', 'WishlistController@index');
Route::post('/wishlist-add', 'WishlistController@store');
Route::get('/wishlist-clear/{id}', 'WishlistController@destroy');
//search routes
Route::post('/search','SearchController@search');
//Color Finding Routes
Route::post('/color-red','SearchController@colorRed');
Route::post('/color-green','SearchController@colorGreen');
Route::post('/color-blue','SearchController@colorBlue');
Route::post('/color-white','SearchController@colorWhite');
Route::post('/color-black','SearchController@colorBlack');
Route::post('/color-yellow','SearchController@colorYellow');
//..........................................................................................................................................
//.....................................backend pages........................................................................................
Route::get('/admin','BackendController@index');
//category routes
Route::get('/admin/category/add','CategoryController@create')->name('add_category');
Route::post('/admin/category/store','CategoryController@store')->name('store_category');
Route::get('/admin/category/manage','CategoryController@manage')->name('manage_category');
Route::get('/admin/category/delete/{id}','CategoryController@destroy');
Route::get('/admin/category/edit/{id}','CategoryController@edit');
Route::post('/admin/category/update/{id}','CategoryController@update');
Route::get('/admin/category/unpublish/{id}','CategoryController@unpublish');
Route::get('/admin/category/publish/{id}','CategoryController@publish');
//product routes
Route::get('/admin/product/add','ProductController@create')->name('add_product');
Route::post('/admin/product/store','ProductController@store')->name('store_product');
Route::get('/admin/product/manage','ProductController@manage')->name('manage_product');
Route::get('/admin/product/edit/{id}','ProductController@edit');
Route::post('/admin/product/update/{id}','ProductController@update');
Route::get('/admin/product/delete/{id}','ProductController@destroy');
Route::get('/admin/product/unpublish/{id}','ProductController@unpublish');
Route::get('/admin/product/publish/{id}','ProductController@publish');
Route::get('/admin/deleted-product/manage','ProductController@manageDeleted')->name('deleted_product');
Route::get('/admin/restore-product/{id}','ProductController@restore');
Route::get('/admin/remove-product/{id}','ProductController@permanentDelete');
//Order info routes
Route::get('/admin/manage/order','OrderController@manageOrder')->name('manage_order');
Route::get('/admin/order/details/{id}','OrderController@orderDetails');
Route::get('/admin/order/delete/{id}','OrderController@destroy');
Route::get('/admin/order/invoice-view/{id}','OrderController@invoiceView');
Route::get('/admin/order/invoice-download/{id}','OrderController@invoiceDownload')->name('invoice_download');
//..........................................................................................................................................

