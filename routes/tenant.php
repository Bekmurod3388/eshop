<?php

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here is where you can register 'tenant' routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "tenant" middleware group. Now create something great!
|
*/
/**
 * Tenant Namespace Routes
 */
Route::group(['namespace' => 'Tenant'], function () {

    /**
     * Project Routes
     */
    Route::group(['prefix' => '/{shop}', 'as' => 'shops.'], function () {

        /**
         * Files Routes
         */
        Route::resource('/files', 'ProjectFileController');
    });

    /**
     * Projects Routes
     */
    Route::resource('/projects', 'ProjectController');
});
