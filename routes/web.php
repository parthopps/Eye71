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



	Route::get('/product' ,'ProductController@index')->name('index');
	Route::get('/product' ,'ProductController@products');
	Route::get('/products/{slug}' ,'ProductController@show')->name('products.show');


	Route::get('/' ,'PageController@index')->name('home');
	Route::get('/' ,'PageController@products');
	Route::get('/search' ,'PageController@search')->name('search');
	Route::get('/categories/{id}' ,'PageController@show')->name('categories.show');
	Route::get('/brand/{id}' ,'PageController@brandshow')->name('brand.show');

	



	








// ...... Backend Admin Route  ...... //

   Route::group(['prefix' => 'admin'] , function(){


        Route::get('/','AdminPagesController@index')->name('admin.index');

    // ...... Product Route  ...... //

	    Route::get('/product/create','AdminPagesController@product_create')->name('backend.pages.product.create');
	    Route::get('/manage_products','AdminPagesController@manage_products')->name('backend.pages.product.index');
	    Route::get('/product/edit/{id}','AdminPagesController@product_edit')->name('backend.pages.product.edit');

	    Route::post('/product_store','AdminPagesController@product_store')->name('admin.product.store');
	    Route::post('/product/update/{id}','AdminPagesController@product_update')->name('backend.pages.product.update');
	    Route::get('/product/delete/{id}','AdminPagesController@product_delete')->name('backend.pages.product.delete');	

     // ...... Category Route  ...... //

	    Route::get('/Category','CategoryController@index')->name('backend.pages.Category.index');
	    Route::get('/category/create','categoryController@category_create')->name('backend.pages.category.create');
	    Route::post('/category_store','categoryController@category_store')->name('admin.category.store');
	    Route::get('/category/delete/{id}','categoryController@delete')->name('backend.pages.category.delete');
	    Route::get('/Category/edit/{id}','CategoryController@edit')->name('backend.pages.category.edit'); 
        Route::post('/Category/update/{id}','CategoryController@update')->name('backend.pages.category.update');


    // ...... Brand Route  ...... //


       Route::get('/brand','BrandController@index')->name('admin.brand');
       Route::get('/brand_create','BrandController@brand_create')->name('admin.brand.create');

       Route::get('/Brand/delete/{id}','BrandController@delete')->name('admin.brand.delete');
       Route::post('/adminbrand','BrandController@brand_store')->name('admin.brand.store');
       Route::get('/Brand/edit/{id}','BrandController@edit')->name('admin.brand.edit');
       Route::post('/Brand/update/{id}','BrandController@update')->name('admin.brand.update');


    // ...... Blog Route  ...... //

      Route::get('/blog','AdminController@index')->name('admin.blog');

      Route::get('/blog_create','AdminController@blog_create')->name('admin.blog.create');
      Route::post('/adminblog','AdminController@blog_store')->name('admin.blog.store');
      Route::get('/blog/edit/{id}','AdminController@edit')->name('admin.blog.edit');
      Route::get('/blog/delete/{id}','AdminController@delete')->name('admin.blog.delete');
      Route::post('/blog/update/{id}','AdminController@update')->name('admin.blog.update');


      // ...... contact Route  ...... //

      Route::get('/contact','ContactController@index')->name('admin.contact');
      Route::get('/contact/delete/{id}','ContactController@delete')->name('admin.contact.delete');
      Route::get('/contact/edit/{id}','ContactController@edit')->name('admin.contact.edit');
      Route::post('/contact/update/{id}','ContactController@update')->name('admin.contact.update');






   }); 



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
