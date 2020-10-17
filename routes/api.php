<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'v1'], function() {
  Route::post('/login', 'API\V1\Auth\LoginController@login');
  Route::post('/register', 'Auth\RegisterController@create');
  Route::get('/users', 'Auth\RegisterController@users');
  Route::get('/users/{id}', 'API\V1\Auth\RegisterController@getUser');
  Route::post('/logout', 'API\V1\Auth\LoginController@logout')->middleware('auth:api');
  // public routes
  Route::get('/languages', 'API\V1\LanguageController@index');
  Route::get('/categories', 'API\V1\CategoryController@index');
  Route::get('/countries', 'API\V1\CountryController@index');
  Route::get('/regions', 'API\V1\RegionController@index');
  Route::get('/districts', 'API\V1\DistrictController@index');
  Route::get('/products', 'API\V1\ProductController@index');

  //Filter routes
    Route::get('/filters', 'API\V1\FilterController@index');
    Route::get('/filters/{id}', 'API\V1\FilterController@show');
    Route::put('/filters/{id}', 'API\V1\FilterController@update');
    Route::post('/filters', 'API\V1\FilterController@store');
    Route::delete('/filters/{id}', 'API\V1\FilterController@destroy');

    //Filter groups routes
    Route::get('/filter-groups', 'API\V1\FilterGroupController@index');
    Route::get('/filter-groups/{id}', 'API\V1\FilterGroupController@show');
    Route::put('/filter-groups/{id}', 'API\V1\FilterGroupController@update');
    Route::post('/filter-groups', 'API\V1\FilterGroupController@store');
    Route::delete('/filter-groups/{id}', 'API\V1\FilterGroupController@destroy');


    Route::group(['middleware' => 'guest'], function() {

      // Product routes
      Route::post('/products', 'API\V1\ProductController@store')->name('api.product.store');
      Route::get('/products', 'API\V1\ProductController@index')->name('api.product.index');
      Route::get('/products/new', 'API\V1\ProductController@getNewProducts')->name('api.product.new');
      Route::get('/products/recommendation', 'API\V1\ProductController@getOurRecommendations')->name('api.product.recommendation');
      Route::get('/products/promotion', 'API\V1\ProductController@getPromotions')->name('api.product.promotion');
      Route::put('/products/{id}', 'API\V1\ProductController@update')->name('api.product.update');
      Route::get('/products/{id}', 'API\V1\ProductController@show')->name('api.product.show');
      //Route::get('/products/exportToExcel', 'API\V1\ProductController@exportToExcel')->name('api.product.export');
      Route::post('/products/importFromExcel', 'API\V1\ProductController@importFromExcel')->name('api.product.import');
      Route::delete('/products/{id}', 'API\V1\ProductController@destroy')->name('api.product.destroy');

      // Product Parameter routes
      Route::post('/parameters', 'API\V1\ParameterController@store')->name('api.parameter.store');
      Route::get('/parameters', 'API\V1\ParameterController@index')->name('api.parameter.index');
      Route::put('/parameters/{id}', 'API\V1\ParameterController@update')->name('api.parameter.update');
      Route::get('/parameters/{id}', 'API\V1\ParameterController@show')->name('api.parameter.show');
      Route::delete('/parameters/{id}', 'API\V1\ParameterController@destroy')->name('api.parameter.destroy');

      // Customer routes
      Route::post('/customers', 'API\V1\CustomerController@store')->name('api.customer.store');
      Route::get('/customers', 'API\V1\CustomerController@index')->name('api.customer.index');
      Route::put('/customers/{id}', 'API\V1\CustomerController@update')->name('api.customer.update');
      Route::get('/customers/{id}', 'API\V1\CustomerController@show')->name('api.customer.show');
      Route::delete('/customers/{id}', 'API\V1\CustomerController@destroy')->name('api.customer.destroy');

      // Delivery Types routes
      Route::post('/delivery-types', 'API\V1\DeliveryTypeController@store')->name('api.deliverytype.store');
      Route::get('/delivery-types', 'API\V1\DeliveryTypeController@index')->name('api.deliverytype.index');
      Route::put('/delivery-types/{id}', 'API\V1\DeliveryTypeController@update')->name('api.deliverytype.update');
      Route::get('/delivery-types/{id}', 'API\V1\DeliveryTypeController@show')->name('api.deliverytype.show');
      Route::delete('/delivery-types/{id}', 'API\V1\DeliveryTypeController@destroy')->name('api.deliverytype.destroy');

      // Stock Status routes
      Route::post('/stock-statuses', 'API\V1\StockStatusController@store')->name('api.stockstatus.store');
      Route::get('/stock-statuses', 'API\V1\StockStatusController@index')->name('api.stockstatus.index');
      Route::put('/stock-statuses/{id}', 'API\V1\StockStatusController@update')->name('api.stockstatus.update');
      Route::get('/stock-statuses/{id}', 'API\V1\StockStatusController@show')->name('api.stockstatus.show');
      Route::delete('/stock-statuses/{id}', 'API\V1\StockStatusController@destroy')->name('api.stockstatus.destroy');

        // Order routes
        Route::post('/orders', 'API\V1\OrderController@store')->name('api.order.store');
        Route::get('/orders', 'API\V1\OrderController@index')->name('api.order.index');
        Route::get('/orders/top', 'API\V1\OrderController@getTopProducts')->name('api.order.top');
        Route::get('/orders/bestseller', 'API\V1\OrderController@getBestsellers')->name('api.order.bestseller');
        Route::put('/orders/{id}', 'API\V1\OrderController@update')->name('api.order.update');
        Route::get('/orders/{id}', 'API\V1\OrderController@show')->name('api.order.show');
        Route::get('/orders/exportToExcel', 'API\V1\OrderController@exportToExcel')->name('api.order.export');
        Route::post('/orders/importFromExcel', 'API\V1\OrderController@importFromExcel')->name('api.order.import');
        Route::delete('/orders/{id}', 'API\V1\OrderController@destroy')->name('api.order.destroy');


        // Order Status routes
      Route::post('/order-statuses', 'API\V1\OrderStatusController@store')->name('api.orderstatus.store');
      Route::get('/order-statuses', 'API\V1\OrderStatusController@index')->name('api.orderstatus.index');
      Route::put('/order-statuses/{id}', 'API\V1\OrderStatusController@update')->name('api.orderstatus.update');
      Route::get('/order-statuses/{id}', 'API\V1\OrderStatusController@show')->name('api.orderstatus.show');
      Route::delete('/order-statuses/{id}', 'API\V1\OrderStatusController@destroy')->name('api.orderstatus.destroy');

      // Payment Method routes
      Route::post('/payment-methods', 'API\V1\PaymentMethodController@store')->name('api.paymentmethod.store');
      Route::get('/payment-methods', 'API\V1\PaymentMethodController@index')->name('api.paymentmethod.index');
      Route::put('/payment-methods/{id}', 'API\V1\PaymentMethodController@update')->name('api.paymentmethod.update');
      Route::get('/payment-methods/{id}', 'API\V1\PaymentMethodController@show')->name('api.paymentmethod.show');
      Route::delete('/payment-methods/{id}', 'API\V1\PaymentMethodController@destroy')->name('api.paymentmethod.destroy');

      // Manufacturer Routes
      Route::get('/manufacturers', 'API\V1\ManufacturerController@index');
      Route::get('/manufacturer/{id}', 'API\V1\ManufacturerController@show');
      Route::put('/manufacturer/{id}', 'API\V1\ManufacturerController@update');
      Route::post('/manufacturer', 'API\V1\ManufacturerController@store');
      Route::delete('/manufacturer/{id}', 'API\V1\ManufacturerController@destroy');

      //Category routes
      Route::get('/categories', 'API\V1\CategoryController@index');
      Route::post('/categories', 'API\V1\CategoryController@store');
      Route::get('/categories/{id}', 'API\V1\CategoryController@show');
      Route::delete('/categories/{id}', 'API\V1\CategoryController@destroy');
      Route::put('/categories/{id}', 'API\V1\CategoryController@update');

      //Region routes
      Route::get('/regions', 'API\V1\RegionController@index');
      Route::get('/regions/{id}', 'API\V1\RegionController@show');
      Route::put('/regions/{id}', 'API\V1\RegionController@update');
      Route::post('/regions', 'API\V1\RegionController@store');
      Route::delete('/regions/{id}', 'API\V1\RegionController@destroy');

      //Country routes
      Route::get('/countries', 'API\V1\CountryController@index');
      Route::get('/countries/{id}', 'API\V1\CountryController@show');
      Route::put('/countries/{id}', 'API\V1\CountryController@update');
      Route::post('/countries', 'API\V1\CountryController@store');
      Route::delete('/countries/{id}', 'API\V1\CountryController@destroy');

      //District routes
      Route::get('/districts', 'API\V1\DistrictController@index');
      Route::get('/districts/{id}', 'API\V1\DistrictController@show');
      Route::put('/districts/{id}', 'API\V1\DistrictController@update');
      Route::post('/districts', 'API\V1\DistrictController@store');
      Route::delete('/districts/{id}', 'API\V1\DistrictController@destroy');

      //Rating routes
      Route::get('/ratings', 'API\V1\RatingController@index');
      Route::get('/ratings/{id}', 'API\V1\RatingController@show');
      Route::put('/ratings/{id}', 'API\V1\RatingController@update');
      Route::post('/ratings', 'API\V1\RatingController@store');
      Route::delete('/ratings/{id}', 'API\V1\RatingController@destroy');

      //My Favorite routes
      Route::get('/my-favorites', 'API\V1\MyFavoriteController@index');
      Route::get('/my-favorites/{id}', 'API\V1\MyFavoriteController@show');
      Route::put('/my-favorites/{id}', 'API\V1\MyFavoriteController@update');
      Route::post('/my-favorites', 'API\V1\MyFavoriteController@store');
      Route::delete('/my-favorites/{id}', 'API\V1\MyFavoriteController@destroy');


      //Recent views routes
      Route::get('/recent-views', 'API\V1\RecentViewController@index');
      Route::get('/recent-views/{id}', 'API\V1\RecentViewController@show');
      Route::put('/recent-views/{id}', 'API\V1\RecentViewController@update');
      Route::post('/recent-views', 'API\V1\RecentViewController@store');
      Route::delete('/recent-views/{id}', 'API\V1\RecentViewController@destroy');

        //Route::get('/parameter-group-descriptions', 'API\V1\AttributeGroupDescriptionController@index');

    Route::resource('categories', 'API\V1\CategoryController')->except(['index', 'show']);
    //Route::resource('parameter', 'API\V1\ParameterController')->except(['index', 'show']);
    Route::resource('countries', 'API\V1\CountryController')->except(['index', 'show']);
    Route::resource('regions', 'API\V1\RegionController')->except(['index', 'show']);
    Route::resource('districts', 'API\V1\DistrictController')->except(['index', 'show']);
    //Route::resource('parameter-descriptions', 'API\V1\ParameterDescriptionController');
    //Route::resource('parameter-groups', 'API\V1\ParameterGroupController')->except(['index', 'show']);
    //Route::resource('parameter-group-descriptions', 'API\V1\ParameterGroupDescriptionController');

        //ShopDetails routes
        Route::get('/shop-details', 'API\V1\ShopDetailController@index');
        Route::get('/shop-details/{id}', 'API\V1\ShopDetailController@show');
        Route::put('/shop-details/{id}', 'API\V1\ShopDetailController@update');
        Route::post('/shop-details', 'API\V1\ShopDetailController@store');
        Route::delete('/shop-details/{id}', 'API\V1\ShopDetailController@destroy');

        //Shops routes
        Route::get('/shops', 'API\V1\ShopController@index');
        Route::get('/shops/{id}', 'API\V1\ShopController@show');
        Route::put('/shops/{id}', 'API\V1\ShopController@update');
        Route::post('/shops', 'API\V1\ShopController@store');
        Route::delete('/shops/{id}', 'API\V1\ShopController@destroy');

        //Purchases routes
        Route::get('/purchases', 'API\V1\PurchaseController@index');
        Route::get('/purchases/{id}', 'API\V1\PurchaseController@show');
        Route::put('/purchases/{id}', 'API\V1\PurchaseController@update');
        Route::post('/purchases', 'API\V1\PurchaseController@store');
        Route::delete('/purchases/{id}', 'API\V1\PurchaseController@destroy');

        //Catch of day routes
        Route::get('/catch-of-days', 'API\V1\CatchOfDayController@index');
        Route::get('/catch-of-days/{id}', 'API\V1\CatchOfDayController@show');
        Route::put('/catch-of-days/{id}', 'API\V1\CatchOfDayController@update');
        Route::post('/catch-of-days', 'API\V1\CatchOfDayController@store');
        Route::delete('/catch-of-days/{id}', 'API\V1\CatchOfDayController@destroy');

        //Shopping cart routes
        Route::get('/shopping-carts', 'API\V1\ShoppingCartController@index');
        Route::get('/shopping-carts/{id}', 'API\V1\ShoppingCartController@show');
        Route::put('/shopping-carts/{id}', 'API\V1\ShoppingCartController@update');
        Route::post('/shopping-carts', 'API\V1\ShoppingCartController@store');
        Route::delete('/shopping-carts', 'API\V1\ShoppingCartController@clear');
        Route::delete('/shopping-carts/{id}', 'API\V1\ShoppingCartController@destroy');

        //Logo
        Route::get('/logos', 'API\V1\LogoController@index');
        Route::get('/logos/{id}', 'API\V1\LogoController@show');
        Route::post('/logos', 'API\V1\LogoController@store');
        Route::delete('/logos/{id}', 'API\V1\LogoController@destroy');

        //Favicon
        Route::get('/favicons', 'API\V1\FaviconController@index');
        Route::get('/favicons/{id}', 'API\V1\FaviconController@show');
        Route::post('/favicons', 'API\V1\FaviconController@store');
        Route::delete('/favicons/{id}', 'API\V1\FaviconController@destroy');

        //Company_ad
        Route::get('/company-ads', 'API\V1\CompanyAdController@index');
        Route::get('/company-ads/{id}', 'API\V1\CompanyAdController@show');
        Route::put('/company-ads/{id}', 'API\V1\CompanyAdController@update');
        Route::post('/company-ads', 'API\V1\CompanyAdController@store');
        Route::delete('/company-ads/{id}', 'API\V1\CompanyAdController@destroy');

        //Eurosoft_ad
        Route::get('/eurosoft-ads', 'API\V1\EurosoftAdController@index');
        Route::get('/eurosoft-ads/{id}', 'API\V1\EurosoftAdController@show');
        Route::post('/eurosoft-ads', 'API\V1\EurosoftAdController@store');
        Route::delete('/eurosoft-ads/{id}', 'API\V1\EurosoftAdController@destroy');

        //Banner
        Route::get('/banners', 'API\V1\BannerController@index');
        Route::get('/banners/{id}', 'API\V1\BannerController@show');
        Route::put('/banners/{id}', 'API\V1\BannerController@update');
        Route::post('/banners', 'API\V1\BannerController@store');
        Route::delete('/banners/{id}', 'API\V1\BannerController@destroy');

        //Shop_ad
        Route::get('/shop-ads', 'API\V1\ShopAdController@index');
        Route::get('/shop-ads/{id}', 'API\V1\ShopAdController@show');
        Route::post('/shop-ads', 'API\V1\ShopAdController@store');
        Route::delete('/shop-ads/{id}', 'API\V1\ShopAdController@destroy');

        //contact
        Route::get('/contacts', 'API\V1\ContactController@index');
        Route::get('/contacts/{id}', 'API\V1\ContactController@show');
        Route::put('/contacts/{id}', 'API\V1\ContactController@update');
        Route::post('/contacts', 'API\V1\ContactController@store');
        Route::delete('/contacts/{id}', 'API\V1\ContactController@destroy');

        //sliders
        Route::get('/sliders', 'API\V1\SliderController@index');
        Route::get('/sliders/{id}', 'API\V1\SliderController@show');
        Route::put('/sliders/{id}', 'API\V1\SliderController@update');
        Route::post('/sliders', 'API\V1\SliderController@store');
        Route::delete('/sliders/{id}', 'API\V1\SliderController@destroy');

    });

});


