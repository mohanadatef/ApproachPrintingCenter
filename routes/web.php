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

Auth::routes();
/*---------------Home-------*/
Route::get('/admin','admin\HomeController@index');
Route::get('/admin/laser/bills/{id}','admin\HomeController@index_laser');
Route::get('/admin/print/bills/{id}','admin\HomeController@index_print');
Route::get('/admin/material/bills/{id}','admin\HomeController@index_type');
Route::get('/print/laser/bills/{id}','admin\HomeController@laser_print_bills');
Route::get('/print/print/bills/{id}','admin\HomeController@print_print_bills');
Route::get('/print/material/bills/{id}','admin\HomeController@type_print_bills');
/*---------------log-------*/
Route::get('/admin/log','admin\LogController@indexlog')->middleware('permission:log-show');
/*---------------User-------*/
Route::get('/admin/user','admin\UserController@indexuser')->middleware('permission:user-show');
Route::get('/admin/user/create','admin\UserController@createuserget')->middleware('permission:user-create');
Route::post('/admin/user/create','admin\UserController@createuserpost')->middleware('permission:user-create');
Route::get('/admin/user/edit/{id}','admin\UserController@edituserget')->middleware('permission:user-edit');
Route::post('/admin/user/edit/{id}','admin\UserController@edituserpost')->middleware('permission:user-edit');
Route::get('/admin/user/reset/{id}','admin\UserController@resetpassworduserget')->middleware('permission:user-password');
Route::Post('/admin/user/reset/{id}','admin\UserController@resetpassworduserpost')->middleware('permission:user-password');
Route::get('/admin/user/statues/{id}','admin\UserController@editstatues')->middleware('permission:user-statues');
Route::get('/admin/user/reset/code/{id}','admin\UserController@resetcodeuserget')->middleware('permission:user-code');
Route::Post('/admin/user/reset/code/{id}','admin\UserController@resetcodeuserpost')->middleware('permission:user-code');
Route::get('/admin/user_transaction/','admin\UserController@user_transaction_get')->middleware('permission:user-transaction');
Route::Post('/admin/user_transaction/create','admin\UserController@user_transaction_post')->middleware('permission:user-transaction');
/*---------------role-------*/
Route::get('/admin/role','admin\RoleController@indexrole')->middleware('permission:role-show');
Route::get('/admin/role/create','admin\RoleController@createroleget')->middleware('permission:role-create');
Route::post('/admin/role/create','admin\RoleController@createrolepost')->middleware('permission:role-create');
Route::get('/admin/role/edit/{id}','admin\RoleController@editroleget')->middleware('permission:role-edit');
Route::post('/admin/role/edit/{id}','admin\RoleController@editrolepost')->middleware('permission:role-edit');
/*---------------permission-------*/
Route::get('/admin/permission','admin\PermissionController@indexpermission')->middleware('permission:permission-show');
Route::get('/admin/permission/create','admin\PermissionController@createpermissionget')->middleware('permission:permission-create');
Route::post('/admin/permission/create','admin\PermissionController@createpermissionpost')->middleware('permission:permission-create');
Route::get('/admin/permission/edit/{id}','admin\PermissionController@editpermissionget')->middleware('permission:permission-edit');
Route::post('/admin/permission/edit/{id}','admin\PermissionController@editpermissionpost')->middleware('permission:permission-edit');
/*---------------type->material-------*/
Route::get('/admin/material','admin\TypeController@index')->middleware('permission:type-show');
Route::get('/admin/material/create','admin\TypeController@createget')->middleware('permission:type-create');
Route::post('/admin/material/create','admin\TypeController@createpost')->middleware('permission:type-create');
Route::get('/admin/material/edit/{id}','admin\TypeController@editget')->middleware('permission:type-edit');
Route::patch('/admin/material/edit/{id}','admin\TypeController@editpost')->middleware('permission:type-edit');
/*---------------size-------*/
Route::get('/admin/size','admin\SizeController@index')->middleware('permission:size-show');
Route::get('/admin/size/create','admin\SizeController@createget')->middleware('permission:size-create');
Route::post('/admin/size/create','admin\SizeController@createpost')->middleware('permission:size-create');
Route::get('/admin/size/edit/{id}','admin\SizeController@editget')->middleware('permission:size-edit');
Route::patch('/admin/size/edit/{id}','admin\SizeController@editpost')->middleware('permission:size-edit');
/*---------------color-------*/
Route::get('/admin/color','admin\ColorController@index')->middleware('permission:color-show');
Route::get('/admin/color/create','admin\ColorController@createget')->middleware('permission:color-create');
Route::post('/admin/color/create','admin\ColorController@createpost')->middleware('permission:color-create');
Route::get('/admin/color/edit/{id}','admin\ColorController@editget')->middleware('permission:color-edit');
Route::patch('/admin/color/edit/{id}','admin\ColorController@editpost')->middleware('permission:color-edit');
/*---------------machine-------*/
Route::get('/admin/machine','admin\MachineController@index')->middleware('permission:machine-show');
Route::get('/admin/machine/create','admin\MachineController@createget')->middleware('permission:machine-create');
Route::post('/admin/machine/create','admin\MachineController@createpost')->middleware('permission:machine-create');
Route::get('/admin/machine/edit/{id}','admin\MachineController@editget')->middleware('permission:machine-edit');
Route::patch('/admin/machine/edit/{id}','admin\MachineController@editpost')->middleware('permission:machine-edit');
/*---------------store-------*/
Route::get('/admin/store','admin\StoreController@index')->middleware('permission:store-show');
Route::get('/admin/store/problem','admin\StoreController@indexproblem')->middleware('permission:store-show');
Route::get('/admin/store/create','admin\StoreController@createget')->middleware('permission:store-create');
Route::post('/admin/store/create','admin\StoreController@createpost')->middleware('permission:store-create');
Route::get('/admin/store/edit/{id}','admin\StoreController@editget')->middleware('permission:store-edit');
Route::patch('/admin/store/edit/{id}','admin\StoreController@editpost')->middleware('permission:store-edit');
Route::get('/admin/store/shop/{id}','admin\StoreController@shopget')->middleware('permission:store-shop');
Route::patch('/admin/store/shop/{id}','admin\StoreController@shoppost')->middleware('permission:store-shop');
/*---------------print_price-------*/
Route::get('/admin/print_price','admin\Print_PriceController@index')->middleware('permission:print-price-show');
Route::get('/admin/print_price/create','admin\Print_PriceController@createget')->middleware('permission:print-price-create');
Route::post('/admin/print_price/create','admin\Print_PriceController@createpost')->middleware('permission:print-price-create');
Route::get('/admin/print_price/edit/{id}','admin\Print_PriceController@editget')->middleware('permission:print-price-edit');
Route::patch('/admin/print_price/edit/{id}','admin\Print_PriceController@editpost')->middleware('permission:print-price-edit');
Route::get('/admin/print_price/delete/{id}','admin\Print_PriceController@delete')->middleware('permission:print-price-delete');
/*---------------customer-------*/
Route::get('/admin/customer','admin\CustomerController@index')->middleware('permission:customer-show');
Route::get('/admin/customer/wallet','admin\CustomerController@indexwallet')->middleware('permission:customer-wallet');
Route::get('/admin/customer/create','admin\CustomerController@createget')->middleware('permission:customer-create');
Route::POST('/admin/customer/create','admin\CustomerController@createpost')->middleware('permission:customer-create');
Route::get('/admin/customer/edit/{id}','admin\CustomerController@editget')->middleware('permission:customer-edit');
Route::patch('/admin/customer/edit/{id}','admin\CustomerController@editpost')->middleware('permission:customer-edit');
Route::get('/admin/customer/statues/{id}','admin\CustomerController@editstatues')->middleware('permission:customer-status');
Route::get('/admin/wallet_system','admin\CustomerController@wallet_all_customer')->middleware('permission:wallet-system');
/*---------------store_transaction-------*/
Route::get('/admin/store_transaction','admin\Store_TransactionController@index')->middleware('permission:store-transaction-show');
Route::get('/admin/store_transaction/enter','admin\Store_TransactionController@enter')->middleware('permission:store-transaction-enter-show');
Route::get('/admin/store_transaction/directed','admin\Store_TransactionController@directed')->middleware('permission:store-transaction-directed-show');
/*-------------------------------order--------------------------*/
Route::get('/admin/order/start/customer','admin\OrderController@startsearchforordercustomer')->middleware('permission:order-start-customer');
Route::get('/admin/order/information/customer/{id}','admin\OrderController@orderinformation')->middleware('permission:order-information-customer');
Route::POST('/admin/order/search/customer/all','admin\OrderController@searchforordercustomer')->middleware('permission:order-search-customer-all');
Route::get('/admin/order/finish/index','admin\OrderController@allorderfinish')->middleware('permission:order-finish-index-all');
Route::get('/admin/order/finish/time','admin\OrderController@dayorderfinishtime')->middleware('permission:order-finish-index-day');
Route::get('/admin/order/finish/day','admin\OrderController@dayorderfinish')->middleware('permission:order-finish-index-day');
Route::get('/admin/order/work','admin\OrderController@allorderwork')->middleware('permission:order-work-index');
Route::get('/admin/order/information/{id}','admin\OrderController@orderinformation')->middleware('permission:order-information');
Route::get('/admin/order/start','admin\OrderController@start')->middleware('permission:order-search-customer');
Route::get('/admin/order/customer/create','admin\OrderController@createcustomerget')->middleware('permission:customer-create');
Route::POST('/admin/order/customer/create','admin\OrderController@createcustomerpost')->middleware('permission:customer-create');
Route::get('/admin/order/customer/edit/{id}','admin\OrderController@editcustomerget')->middleware('permission:customer-edit');
Route::patch('/admin/order/customer/edit/{id}','admin\OrderController@editcustomerpost')->middleware('permission:customer-edit');
Route::POST('/admin/order/search/customer','admin\OrderController@search')->middleware('permission:order-search-customer');
Route::get('/admin/order/buy/material/{customer}','admin\OrderController@buytype')->middleware('permission:order-buy-type');
Route::get('/admin/order/buy/print/{customer}','admin\OrderController@buyprint')->middleware('permission:order-buy-print');
Route::get('/admin/order/buy/laser/{customer}','admin\OrderController@buylaser')->middleware('permission:order-buy-laser');
Route::get('/admin/order/finish/{customer}','admin\OrderController@orderfinish')->middleware('permission:order-finish');
/*-----------------------------cart_type---------------*/
Route::POST('/admin/order/add/cart/material/{customer}','admin\CartController@addcarttype')->middleware('permission:order-add-type-cart');
Route::get('/admin/order/show/cart/material/{customer}','admin\CartController@showcarttype')->middleware('permission:order-cart-type-check');
Route::get('/admin/order/cansal/cart/material/{id}','admin\CartController@cansalcarttype')->middleware('permission:order-cart-type-cansal');
Route::get('/admin/order/edit/cart/materialid}','admin\CartController@editcarttype')->middleware('permission:order-cart-type-edit');
Route::patch('/admin/order/update/cart/material/{id}','admin\CartController@updatecarttype')->middleware('permission:order-cart-type-edit');
/*-----------------------------cart_print---------------*/
Route::POST('/admin/order/add/cart/print/{customer}','admin\CartController@addcartprint')->middleware('permission:order-add-print-cart');
Route::get('/admin/order/show/cart/print/{customer}','admin\CartController@showcartprint')->middleware('permission:order-cart-print-check');
Route::get('/admin/order/cansal/cart/print/{id}','admin\CartController@cansalcartprint')->middleware('permission:order-cart-print-cansal');
Route::get('/admin/order/edit/cart/print/{id}','admin\CartController@editcartprint')->middleware('permission:order-cart-print-edit');
Route::patch('/admin/order/update/cart/print/{id}','admin\CartController@updatecartprint')->middleware('permission:order-cart-print-edit');
/*-----------------------------cart_laser---------------*/
Route::POST('/admin/order/add/cart/laser/{customer}','admin\CartController@addcartlaser')->middleware('permission:order-add-laser-cart');
Route::get('/admin/order/show/cart/laser/{customer}','admin\CartController@showcartlaser')->middleware('permission:order-cart-laser-check');
Route::get('/admin/order/cansal/cart/laser/{id}','admin\CartController@cansalcartlaser')->middleware('permission:order-cart-laser-cansal');
Route::get('/admin/order/edit/cart/laser/{id}','admin\CartController@editcartlaser')->middleware('permission:order-cart-laser-edit');
Route::POST('/admin/order/update/cart/laser/{id}','admin\CartController@updatecartlaser')->middleware('permission:order-cart-laser-edit');
/*----------------------------cart_file------------------------*/
Route::get('/admin/order/cansal/cart/file/{id}','admin\CartController@cansalcartfile')->middleware('permission:order-cart-file-cansal');
/*----------------------------order_laser------------------------*/
Route::get('/admin/order/laser','admin\LaserController@index')->middleware('permission:laser-show');
Route::get('/admin/order/laser/work','admin\LaserController@worklaser')->middleware('permission:laser-work');
Route::get('/admin/order/laser/information/{id}','admin\LaserController@showlaser')->middleware('permission:laser-information');
Route::get('/admin/order/laser/code/{id}','admin\LaserController@lasercodeskip')->middleware('permission:laser-skip');
Route::patch('/admin/order/laser/skip/{id}','admin\LaserController@skiplaser')->middleware('permission:laser-skip');
Route::patch('/admin/order/laser/start/{id}','admin\LaserController@startlaser')->middleware('permission:laser-start');
Route::get('/admin/order/laser/finish/index','admin\LaserController@orderlaserfinishindex')->middleware('permission:laser-finish-index');
Route::get('/admin/order/laser/finish/time','admin\LaserController@orderlaserfinishindexdaytime')->middleware('permission:laser-finish-index-day');
Route::get('/admin/order/laser/finish/day','admin\LaserController@orderlaserfinishindexday')->middleware('permission:laser-finish-index-day');
Route::get('/admin/order/laser/finish/problem','admin\LaserController@orderlaserfinishproblem')->middleware('permission:laser-finish-problem');
Route::patch('/admin/order/laser/cashier/{id}','admin\LaserController@cashierlasergo')->middleware('permission:laser-go-cashier');
Route::get('/admin/order/laser/end/{id}','admin\LaserController@endlaser')->middleware('permission:laser-end');
Route::get('/admin/order/laser/finish/{id}','admin\LaserController@finishlaser')->middleware('permission:laser-finish');
/*-----------------------------chasier_laser----------------------*/
Route::get('/admin/chasier/laser/index','admin\ChasierController@chasierorderlaserindex')->middleware('permission:chasier-laser-index');
Route::get('/admin/chasier/laser/index/pay','admin\ChasierController@chasierorderlaserpayindex')->middleware('permission:chasier-laser-index-pay');
Route::get('/admin/chasier/laser/pay/{id}','admin\ChasierController@chasierlaserinformation')->middleware('permission:chasier-pay');
Route::patch('/admin/chasier/laser/pay/finish/{id}','admin\ChasierController@chasierlaserpayfinish')->middleware('permission:chasier-pay');
Route::get('/admin/chasier/laser/discount/{id}','admin\ChasierController@chasierdiscountlaser')->middleware('permission:chasier-laser-discount');
Route::patch('/admin/chasier/laser/discount/pay/{id}','admin\ChasierController@chasierdiscountlasercode')->middleware('permission:chasier-laser-discount');
Route::get('/admin/chasier/laser/discarded/{id}','admin\ChasierController@order_laser_discarded')->middleware('permission:chasier-laser-discarded');
Route::get('/admin/chasier/laser/bills/{id}','admin\ChasierController@order_laser_print');
/*-----------------------------chasier_print----------------------*/
Route::get('/admin/chasier/print/index','admin\ChasierController@chasierorderprintindex')->middleware('permission:chasier-print-index');
Route::get('/admin/chasier/print/index/pay','admin\ChasierController@chasierorderprintpayindex')->middleware('permission:chasier-print-index-pay');
Route::get('/admin/chasier/print/pay/{id}','admin\ChasierController@chasierprintinformation')->middleware('permission:chasier-pay');
Route::patch('/admin/chasier/print/pay/finish/{id}','admin\ChasierController@chasierprintpayfinish')->middleware('permission:chasier-pay');
Route::get('/admin/chasier/print/discount/{id}','admin\ChasierController@chasierdiscountprint')->middleware('permission:chasier-print-discount');
Route::patch('/admin/chasier/print/discount/pay/{id}','admin\ChasierController@chasierdiscountprintcode')->middleware('permission:chasier-print-discount');
Route::get('/admin/chasier/print/discarded/{id}','admin\ChasierController@order_print_discarded')->middleware('permission:chasier-print-discarded');
/*-----------------------------chasier_type----------------------*/
Route::get('/admin/chasier/material/discarded/{id}','admin\ChasierController@order_type_discarded')->middleware('permission:chasier-type-discarded');
Route::get('/admin/chasier/material/index','admin\ChasierController@chasierordertypeindex')->middleware('permission:chasier-type-index');
Route::get('/admin/chasier/material/index/pay','admin\ChasierController@chasierordertypepayindex')->middleware('permission:chasier-type-index-pay');
Route::get('/admin/chasier/material/pay/{id}','admin\ChasierController@chasiertypeinformation')->middleware('permission:chasier-pay');
Route::patch('/admin/chasier/material/pay/finish/{id}','admin\ChasierController@chasiertypepayfinish')->middleware('permission:chasier-pay');
Route::get('/admin/chasier/material/discount/{id}','admin\ChasierController@chasierdiscounttype')->middleware('permission:chasier-type-discount');
Route::patch('/admin/chasier/material/discount/pay/{id}','admin\ChasierController@chasierdiscounttypecode')->middleware('permission:chasier-type-discount');
/*---------------------------------------chasier_customer-------------------------*/
Route::get('/admin/chasier/start','admin\ChasierController@chasiercustomer')->middleware('permission:chasier-start-customer');
Route::POST('/admin/chasier/search/customer','admin\ChasierController@chasiersearchcustomer')->middleware('permission:chasier-search-customer');
Route::patch('/admin/chasier/customer/add/{id}','admin\ChasierController@chasieraddmoney')->middleware('permission:chasier-add-money');
Route::get('/admin/chasier/wallet','admin\ChasierController@chasiercustomerwallet')->middleware('permission:chasier-wallet-customer');
Route::POST('/admin/chasier/search/customer/wallet','admin\ChasierController@chasiersearchcustomerwallet')->middleware('permission:chasier-search-customer-wallet');
/*----------------------------order_print------------------------*/
Route::get('/admin/order/print/index/machine/{id}','admin\PrintController@index')->middleware('permission:print-show');
Route::get('/admin/order/print/information/{id}','admin\PrintController@showprint')->middleware('permission:print-information');
Route::get('/admin/order/print/information/reply/{id}','admin\PrintController@replyprint')->middleware('permission:print-information');
Route::get('/admin/order/print/code/{id}','admin\PrintController@printcodeskip')->middleware('permission:print-skip');
Route::patch('/admin/order/print/skip/{id}','admin\PrintController@skipprint')->middleware('permission:print-skip');
Route::get('/admin/order/print/work','admin\PrintController@workprint')->middleware('permission:print-work');
Route::patch('/admin/order/print/end/{id}','admin\PrintController@endprint')->middleware('permission:print-end');
Route::get('/admin/order/print/finish/index/machine/{id}','admin\PrintController@orderprintfinishindex')->middleware('permission:print-finish-index');
Route::get('/admin/order/print/finish/time/machine/{id}','admin\PrintController@orderprintfinishindexdaytime')->middleware('permission:print-finish-index-day');
Route::get('/admin/order/print/finish/day/machine/{id}','admin\PrintController@orderprintfinishindexday')->middleware('permission:print-finish-index-day');
Route::get('/admin/order/print/finish/index','admin\PrintController@orderprintfinishindexall')->middleware('permission:print-finish-index-all');
Route::get('/admin/order/print/finish/time','admin\PrintController@orderprintfinishindexdayalltime')->middleware('permission:print-finish-index-all-day');
Route::get('/admin/order/print/finish/day','admin\PrintController@orderprintfinishindexallday')->middleware('permission:print-finish-index-all-day');
/*---------------Import_price-------*/
Route::get('/admin/store/import/price','admin\TempletPriceController@importpriceget')->middleware('permission:import-price-create');
Route::Post('/admin/store/import/price','admin\TempletPriceController@importpricepost')->middleware('permission:import-price-create');
Route::get('/admin/store/import/index/price','admin\TempletPriceController@indexTemplet_Price')->middleware('permission:import-price-create');
Route::get('/admin/store/import/error/price','admin\TempletPriceController@unmatchedPriceGrouped')->middleware('permission:import-price-create');
Route::get('/admin/store/import/save/price','admin\TempletPriceController@SavePriceGrouped')->middleware('permission:import-price-create');
/*-------------------------------type_order--------------------------*/
Route::get('/admin/order/material/finish/index','admin\TypeOrderController@ordertypefinishindex')->middleware('permission:type-finish-index');
Route::get('/admin/order/material/finish/time','admin\TypeOrderController@ordertypefinishindexdaytime')->middleware('permission:type-finish-index-day');
Route::get('/admin/order/material/finish/day','admin\TypeOrderController@ordertypefinishindexday')->middleware('permission:type-finish-index-day');
/*-------------------------------chasier--------------------------*/
Route::get('/admin/chasier/end','admin\ChasierController@endchasiershow')->middleware('permission:chasier-end');
Route::post('/admin/chasier/end/finish','admin\ChasierController@endchasier')->middleware('permission:chasier-end');
/*---------------store_transaction-------*/
Route::get('/admin/chasier_transaction','admin\Chasier_TransactionController@index')->middleware('permission:chasier-transaction-show');
/*---------------Import_customer-------*/
Route::get('/admin/import/customer','admin\TempletCustomerController@importcustomerget')->middleware('permission:import-customer-create');
Route::Post('/admin/import/customer','admin\TempletCustomerController@importcustomerpost')->middleware('permission:import-customer-create');
Route::get('/admin/import/index/customer','admin\TempletCustomerController@indexTemplet_Customer')->middleware('permission:import-customer-create');
Route::get('/admin/import/error/customer','admin\TempletCustomerController@unmatchedCustomerGrouped')->middleware('permission:import-customer-create');
Route::get('/admin/import/save/customer','admin\TempletCustomerController@SaveCustomerGrouped')->middleware('permission:import-customer-create');
/*-------------------------------clear cache--------------------------*/
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return redirect('/admin')->with('message','clear done');
});
Route::get('get-type-list','admin\OrderController@getTypeList');
Route::get('get-size-list','admin\OrderController@getSizeList');
Route::get('get-color-list','admin\OrderController@getColorList');