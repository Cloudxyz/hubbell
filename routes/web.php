<?php

Route::group(['middleware' => ['web']], function () {

    // auth laravel routes
    Auth::routes(['register' => false]); // public register disabled for this app

    // error pages
    Route::group(['prefix' => 'error'], function () {
        Route::get('forbidden', 'ErrorController@forbidden')->name('error.forbidden');
        Route::get('not-found', 'ErrorController@notFound')->name('error.not-found');
    });

    // auth middleware
    Route::group(['prefix' => 'system', 'middleware' => 'auth'], function () {

        // dashboard
        Route::get('', 'DashboardController@index');
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        // lists
        Route::group(['prefix' => 'my-lists'], function () {
            Route::group(['middleware' => 'role-permission:my-lists,index'], function () {
                Route::get('', 'ListsController@index')->name('lists');
                Route::get('create', 'ListsController@create')->name('lists.create');
                Route::post('store', 'ListsController@store')->name('lists.store');
                Route::get('show/{list}', 'ListsController@show')->name('lists.show');
                Route::get('edit/{list}', 'ListsController@edit')->name('lists.edit');
                Route::post('update/{id}', 'ListsController@update')->name('lists.update');
                Route::get('destroy/{id}', 'ListsController@destroy')->name('lists.destroy');
                Route::get('destroy/{list}/{id}', 'ListsController@lists_destroy')->name('lists-product.destroy');
            });
        });

        // shops
        Route::group(['prefix' => 'shops'], function () {
            Route::group(['middleware' => 'role-permission:shops,index'], function () {
                Route::get('', 'ShopsController@index')->name('shops');
                Route::get('create', 'ShopsController@create')->name('shops.create');
                Route::post('store', 'ShopsController@store')->name('shops.store');
                Route::get('show/{shop}', 'ShopsController@show')->name('shops.show');
                Route::get('edit/{shop}', 'ShopsController@edit')->name('shops.edit');
                Route::post('update/{id}', 'ShopsController@update')->name('shops.update');
                Route::get('destroy/{id}', 'ShopsController@destroy')->name('shops.destroy');
            });
        });

        // shops-types
        Route::group(['prefix' => 'shops-types'], function () {
            Route::group(['middleware' => 'role-permission:shops-types,index'], function () {
                Route::get('', 'ShopsTypesController@index')->name('shops-types');
                Route::get('create', 'ShopsTypesController@create')->name('shops-types.create');
                Route::post('store', 'ShopsTypesController@store')->name('shops-types.store');
                Route::get('show/{type}', 'ShopsTypesController@show')->name('shops-types.show');
                Route::get('edit/{type}', 'ShopsTypesController@edit')->name('shops-types.edit');
                Route::post('update/{id}', 'ShopsTypesController@update')->name('shops-types.update');
                Route::get('destroy/{id}', 'ShopsTypesController@destroy')->name('shops-types.destroy');
            });
        });

        // addresses
        Route::group(['prefix' => 'addresses'], function () {
            Route::group(['middleware' => 'role-permission:addresses,index'], function () {
                Route::get('', 'AddressesController@index')->name('addresses');
                Route::get('create', 'AddressesController@create')->name('addresses.create');
                Route::post('store', 'AddressesController@store')->name('addresses.store');
                Route::get('show/{type}', 'AddressesController@show')->name('addresses.show');
                Route::get('edit/{type}', 'AddressesController@edit')->name('addresses.edit');
                Route::post('update/{id}', 'AddressesController@update')->name('addresses.update');
                Route::get('destroy/{id}', 'AddressesController@destroy')->name('addresses.destroy');
            });
        });

        // products prefix
        Route::group(['prefix' => 'products'], function () {

            // all products
            Route::group(['middleware' => 'role-permission:products,index'], function () {
                Route::get('', 'ProductsController@index')->name('products');
                Route::get('create', 'ProductsController@create')->name('products.create');
                Route::post('store', 'ProductsController@store')->name('products.store');
                Route::get('show/{product}', 'ProductsController@show')->name('products.show');
                Route::get('edit/{product}', 'ProductsController@edit')->name('products.edit');
                Route::post('update/{id}', 'ProductsController@update')->name('products.update');
                Route::get('destroy/{id}', 'ProductsController@destroy')->name('products.destroy');
            });

            // product: detail
            Route::group(['prefix' => 'detail'], function () {
                Route::get('destroy/{product}/{id}', 'ProductDetailsController@destroy')->name('product-details.destroy');
            });

            // categories
            Route::group(['prefix' => 'categories'], function () {
                Route::group(['middleware' => 'role-permission:products,categories'], function () {
                    Route::get('', 'CategoriesController@index')->name('categories');
                    Route::get('create', 'CategoriesController@create')->name('categories.create');
                    Route::post('store', 'CategoriesController@store')->name('categories.store');
                    Route::get('show/{category}', 'CategoriesController@show')->name('categories.show');
                    Route::get('edit/{category}', 'CategoriesController@edit')->name('categories.edit');
                    Route::post('update/{id}', 'CategoriesController@update')->name('categories.update');
                    Route::get('destroy/{id}', 'CategoriesController@destroy')->name('categories.destroy');
                });
            });
        });

        // posts
        Route::group(['prefix' => 'posts'], function () {
            Route::group(['middleware' => 'role-permission:posts,index'], function () {
                Route::get('', 'PostsController@index')->name('posts');
                Route::get('create', 'PostsController@create')->name('posts.create');
                Route::post('store', 'PostsController@store')->name('posts.store');
                Route::get('show/{post}', 'PostsController@show')->name('posts.show');
                Route::get('edit/{post}', 'PostsController@edit')->name('posts.edit');
                Route::post('update/{id}', 'PostsController@update')->name('posts.update');
                Route::get('destroy/{id}', 'PostsController@destroy')->name('posts.destroy');
            });
        });

        // tags
        Route::group(['prefix' => 'tags'], function () {
            Route::group(['middleware' => 'role-permission:tags,index'], function () {
                Route::get('', 'TagsController@index')->name('tags');
                Route::get('create', 'TagsController@create')->name('tags.create');
                Route::post('store', 'TagsController@store')->name('tags.store');
                Route::get('show/{tag}', 'TagsController@show')->name('tags.show');
                Route::get('edit/{tag}', 'TagsController@edit')->name('tags.edit');
                Route::post('update/{id}', 'TagsController@update')->name('tags.update');
                Route::get('destroy/{id}', 'TagsController@destroy')->name('tags.destroy');
            });
        });

        // images
        Route::group(['prefix' => 'images'], function () {
            Route::get('destroy/{model}/{id}/{type}', 'ImagesController@destroy')->name('images.destroy');
        });

        // resources
        Route::group(['prefix' => 'resources'], function () {
            Route::get('destroy/{model}/{id}/{type}', 'ResourcesController@destroy')->name('resources.destroy');
        });

        // settings
        Route::group(['prefix' => 'settings'], function () {

            Route::get('', 'SettingsController@index')->name('settings');

            // users
            Route::group(['prefix' => 'users'], function () {
                Route::group(['middleware' => 'role-permission:settings,users'], function () {
                    Route::get('', 'UsersController@index')->name('users');
                    Route::get('create', 'UsersController@create')->name('users.create');
                    Route::post('store', 'UsersController@store')->name('users.store');
                    Route::get('show/{user}', 'UsersController@show')->name('users.show');
                    Route::get('edit/{user}', 'UsersController@edit')->name('users.edit');
                    Route::post('update/{id}', 'UsersController@update')->name('users.update');
                    Route::get('destroy/{id}', 'UsersController@destroy')->name('users.destroy');
                });
            });

            // roles
            Route::group(['prefix' => 'roles'], function () {
                Route::group(['middleware' => 'role-permission:settings,roles'], function () {
                    Route::get('', 'RolesController@index')->name('roles');
                });
                Route::get('set-active/{id}', 'RolesController@setActive')->name('roles.set-active');
            });
        });

        // account
        Route::group(['prefix' => 'account'], function () {
            Route::get('', 'AccountController@edit')->name('account');
            Route::post('update', 'AccountController@update')->name('account.update');
        });
    });

    // public routes here
    Route::get('', '_Public\PagesController@home')->name('public.home');
});
