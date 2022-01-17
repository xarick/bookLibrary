<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('news', NewsController::class);
    $router->resource('advertisements', AdvertisementController::class);
    $router->resource('book-years', BookYearController::class);
    $router->resource('book-sections', BookSectionController::class);
    $router->resource('book-authors', BookAuthorController::class);
    $router->resource('books', BookController::class);

});
