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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get', 'post'], '/admin', 'AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Index Page
Route::get('/','IndexController@index');

// Category/Listing Page
Route::get('/products/{url}','ProductsController@products');

// Product Detail Page
Route::get('product/{id}','ProductsController@product');

// Get Product Attribute Price
Route::get('/get-product-price', 'ProductsController@getProductPrice');

// Add to Cart Route
Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtocart');

// Cart Page
Route::match(['get', 'post'], '/cart','ProductsController@cart');

// Delete Product from Cart Page
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');

// Update Product Quality in Cart
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');



// Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd', 'AdminController@chkPassword');


// Admin Categories Routes
Route::match(['get', 'post'], '/admin/add-category','CategoryController@addCategory');
Route::match(['get', 'post'], '/admin/edit-category/{id}','CategoryController@editCategory');
Route::match(['get', 'post'], '/admin/delete-category/{id}','CategoryController@deleteCategory');
Route::get('/admin/view-categories','CategoryController@viewCategories');

// Admin Products Routes
Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
Route::match(['get','post'], '/admin/edit-product/{id}', 'ProductsController@editProduct');
Route::get('/admin/view-products','ProductsController@viewProducts');
Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');

// Route to delete  product image
Route::get('/admin/delete-product-image/{id}', 'ProductsController@deleteProductImage');

// Products Attribute Routes
Route::match(['get', 'post'], 'admin/add-attributes/{id}', 'ProductsController@addAttributes');
Route::match(['get', 'post'], 'admin/edit-attributes/{id}', 'ProductsController@editAttributes');
Route::match(['get', 'post'], 'admin/add-images/{id}', 'ProductsController@addImages');
Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');
Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImage');

// Add Coupon Routes
Route::match(['get','post'],'/admin/add-coupon','CouponsController@addCoupon');

// Edit Coupon Routes
Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editCoupon');

// View Coupon Routes
Route::get('/admin/view-coupons','CouponsController@viewCoupons');



//  });

Route::get('/logout', 'AdminController@logout');

// Route::get('/admin', 'AdminController@login');





