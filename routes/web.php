<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\AirportsController;
use App\Http\Controllers\Admin\ChargesController;
use App\Http\Controllers\Admin\ServiceFeeController;
use App\Http\Controllers\Admin\FlightsController;
use App\Http\Controllers\Admin\FareTypeController;
use App\Http\Controllers\Admin\TravelClassController;
use App\Http\Controllers\Admin\TripTypeController;
use App\Http\Controllers\Admin\FlightBookingsController;
use App\Http\Controllers\Admin\AirlinesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\AircraftController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\SearchFlightsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PaymentModeController;
use App\Http\Controllers\Admin\WalletDiscountController;
use App\Http\Controllers\Admin\SalesChannelController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ConvenienceFeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/clear', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
  
    return 'DONE'; //Return anything
});


Route::group([], function () {
    Route::get('/', [App\Http\Controllers\Frontend\IndexController::class,'index'])->name('index');
    Route::get('/flights', [App\Http\Controllers\Frontend\IndexController::class,'flights'])->name('flights');
    Route::get('/flight/booking', [App\Http\Controllers\Frontend\IndexController::class,'flight_booking'])->name('flight-booking');
    
    Route::get('/airplane', [App\Http\Controllers\Frontend\IndexController::class,'airplane'])->name('airplane');
    Route::get('/offer_detail/{id}', [App\Http\Controllers\Frontend\IndexController::class,'offer_detail'])->name('offer_detail');
    Route::any('/flights', [App\Http\Controllers\Frontend\SearchFlightsController::class,'flights'])->name('flights.list');
    Route::any('/search-flights', [App\Http\Controllers\Frontend\SearchFlightsController::class,'search_flights'])->name('search-flights');
    Route::get('/flights_detail', [App\Http\Controllers\Frontend\SearchFlightsController::class,'flights_detail'])->name('flights_detail');
    Route::post('/preview_travel', [App\Http\Controllers\Frontend\SearchFlightsController::class,'showPreviewTravel'])->name('preview_travel');
});

Route::group([], function () {
    Route::get('/blog', [IndexController::class,'blog'])->name('blog');
    Route::get('/blog/{slug}', [IndexController::class,'blog_details'])->name('blog_details');
    Route::get('/contactus', [IndexController::class,'contactus'])->name('contactus');
    Route::get('/aboutus', [IndexController::class,'aboutus'])->name('aboutus');
    Route::get('/faqs', [IndexController::class,'faqs'])->name('faqs');
    Route::get('/privacy_policy', [IndexController::class,'privacy_policy'])->name('privacy_policy');
    Route::get('/services', [IndexController::class,'services'])->name('services');
    
    Route::get('/contact', [IndexController::class,'contact'])->name('contact');
   
    Route::get('/choosecity/{id?}', [IndexController::class,'choosecity'])->name('choosecity');
    Route::get('/comingsoon', [IndexController::class,'comingsoon'])->name('comingsoon');
    Route::get('/weddingvendors', [IndexController::class,'weddingvendors'])->name('weddingvendors');
   Route::get('/videos', [IndexController::class,'video'])->name('video');
    Route::get('/videodetails/{id}', [IndexController::class,'videodetail'])->name('videodetail');
    Route::get('/video/details/{id}', [IndexController::class,'vendor_videodetail'])->name('vendor_videodetail');
    Route::get('/blogs', [IndexController::class,'blog'])->name('blog');
 
});   


    Route::get('admin/register', [RegisterController::class,'register'])->name('register');
    Route::post('admin/register/store', [RegisterController::class,'store'])->name('register.store');
    Route::get('admin/login', [LoginController::class,'login'])->name('login');
    Route::post('admin/login/store', [LoginController::class,'Post_login'])->name('post_login');
    Route::get('admin/logout', [LoginController::class,'logout'])->name('logout');

     // get city route
     Route::get('/admin/tour/getAjaxData',  [TourController::class,'getAjaxData'])->name('getAjaxData');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('admin/dashboard', [IndexController::class,'index'])->name('admin');

        Route::group(['middleware' => ['permission:Roles']], function () {

            Route::get('/admin/roles-list/{status?}', [RoleController::class,'roles'])->name('roles-list')->middleware('permission:Roles List');
            Route::get('/admin/roles/create',  [RoleController::class,'create'])->name('roles.create')->middleware('permission:Roles Create');
            Route::post('/admin/roles/store',  [RoleController::class,'store'])->name('roles-store')->middleware('permission:Roles Create');
            Route::get('/admin/roles/edit/{id}', [RoleController::class,'edit'])->name('roles.edit')->middleware('permission:Roles Update');
            Route::get('/admin/role/delete/{id}', [RoleController::class,'destroy'])->name('roles-delete')->middleware('permission:Roles Delete');
            Route::post('/admin/roles/update/{id}', [RoleController::class,'update'])->name('roles-update')->middleware('permission:Roles Update');
            Route::get('/admin/ajax/roles/view/{id}', [RoleController::class,'show'])->name('roles-view')->middleware('permission:Roles List');
            Route::get('/admin/roles/show/{id}', [BlogController::class,'show'])->name('roles.show')->middleware('permission:Roles List');
        });

        Route::group(['middleware' => ['permission:Customer']], function () {

            Route::get('admin/customers-list/{status?}', [CustomerController::class,'index'])->name('admin.customer')->middleware('permission:Customer List');
            Route::get('admin/customers/create', [CustomerController::class,'create'])->name('admin.customer.create')->middleware('permission:Customer Create');
            Route::post('/customers/store', [CustomerController::class,'store'])->name('admin.customer.store')->middleware('permission:Customer Create');
            Route::get('admin/customers/edit/{id}', [CustomerController::class,'edit'])->name('admin.customer.edit')->middleware('permission:Customer Update');
            Route::post('admin/customers/update/{id}', [CustomerController::class,'update'])->name('admin.customer.update')->middleware('permission:Customer Update');
            Route::get('admin/customers/delete/{id}',[CustomerController::class,'destroy'])->name('admin.customer.destroy')->middleware('permission:Customer Delete');
            Route::get('admin/customers/restore/{id}',[CustomerController::class,'restore'])->name('admin.customer.restore')->middleware('permission:Customer Permanent Delete');
            Route::get('admin/customers/permanentdelete/{id}',[CustomerController::class,'permanentdelete'])->name('admin.customer.permanentdelete')->middleware('permission:Customer Permanent Delete');
            Route::get('/admin/customers/show/{id}', [CustomerController::class,'show'])->name('admin.customer.show')->middleware('permission:Customer List');
            Route::get('/admin/customers/status/{status?}/{id?}', [CustomerController::class,'status'])->name('admin.customer.status')->middleware('permission:Customer List');
        
        });

        Route::group(['middleware' => ['permission:Airports']], function () {

            Route::get('admin/airports-list/{status?}', [AirportsController::class,'index'])->name('admin.airports')->middleware('permission:Airports List');
            Route::get('admin/airports/create', [AirportsController::class,'create'])->name('admin.airports.create')->middleware('permission:Airports Create');
            Route::post('/airports/store', [AirportsController::class,'store'])->name('admin.airports.store')->middleware('permission:Airports Create');
            Route::get('admin/airports/edit/{id}', [AirportsController::class,'edit'])->name('admin.airports.edit')->middleware('permission:Airports Update');
            Route::post('admin/airports/update/{id}', [AirportsController::class,'update'])->name('admin.airports.update')->middleware('permission:Airports Update');
            Route::get('admin/airports/delete/{id}',[AirportsController::class,'destroy'])->name('admin.airports.destroy')->middleware('permission:Airports Permanent Delete');
            Route::get('admin/airports/restore/{id}',[AirportsController::class,'restore'])->name('admin.airports.restore')->middleware('permission:Airports Permanent Delete');
            Route::get('admin/airports/permanentdelete/{id}',[AirportsController::class,'permanentdelete'])->name('admin.airports.permanentdelete')->middleware('permission:Airports Permanent Delete');
            Route::get('/admin/airports/show/{id}', [AirportsController::class,'show'])->name('admin.airports.show')->middleware('permission:Airports List');
            Route::get('/admin/airports/status/{status?}/{id?}', [AirportsController::class,'status'])->name('admin.airports.status')->middleware('permission:Airports List');
        
        });


        Route::group(['middleware' => ['permission:Charges']], function () {

            Route::get('admin/charges-list/{status?}', [ChargesController::class,'index'])->name('admin.charges')->middleware('permission:Charges List');
            Route::get('admin/charges/create', [ChargesController::class,'create'])->name('admin.charges.create')->middleware('permission:Charges Create');
            Route::post('admin/charges/store', [ChargesController::class,'store'])->name('admin.charges.store')->middleware('permission:Charges Create');
            Route::get('admin/charges/edit/{id}', [ChargesController::class,'edit'])->name('admin.charges.edit')->middleware('permission:Charges Update');
            Route::post('admin/charges/update/{id}', [ChargesController::class,'update'])->name('admin.charges.update')->middleware('permission:Charges Update');
            Route::get('admin/charges/delete/{id}',[ChargesController::class,'destroy'])->name('admin.charges.destroy')->middleware('permission:Charges Permanent Delete');
            Route::get('admin/charges/restore/{id}',[ChargesController::class,'restore'])->name('admin.charges.restore')->middleware('permission:Charges Permanent Delete');
            Route::get('admin/charges/permanentdelete/{id}',[ChargesController::class,'permanentdelete'])->name('admin.charges.permanentdelete')->middleware('permission:Charges Permanent Delete');
            Route::get('/admin/charges/show/{id}', [ChargesController::class,'show'])->name('admin.charges.show')->middleware('permission:Charges List');
            Route::get('/admin/charges/status/{status?}/{id?}', [ChargesController::class,'status'])->name('admin.charges.status')->middleware('permission:Charges List');
        
        });

        Route::group(['middleware' => ['permission:Service Fee']], function () {

            Route::get('admin/service_fee-list/{status?}', [ServiceFeeController::class,'index'])->name('admin.service_fee')->middleware('permission:Service Fee List');
            Route::get('admin/service_fee/create', [ServiceFeeController::class,'create'])->name('admin.service_fee.create')->middleware('permission:Service Fee Create');
            Route::post('admin/service_fee/store', [ServiceFeeController::class,'store'])->name('admin.service_fee.store')->middleware('permission:Service Fee Create');
            Route::get('admin/service_fee/edit/{id}', [ServiceFeeController::class,'edit'])->name('admin.service_fee.edit')->middleware('permission:Service Fee Update');
            Route::post('admin/service_fee/update/{id}', [ServiceFeeController::class,'update'])->name('admin.service_fee.update')->middleware('permission:Service Fee Update');
            Route::get('admin/service_fee/delete/{id}',[ServiceFeeController::class,'destroy'])->name('admin.service_fee.destroy')->middleware('permission:Service Fee Permanent Delete');
            Route::get('admin/service_fee/restore/{id}',[ServiceFeeController::class,'restore'])->name('admin.service_fee.restore')->middleware('permission:Service Fee Permanent Delete');
            Route::get('admin/service_fee/permanentdelete/{id}',[ServiceFeeController::class,'permanentdelete'])->name('admin.service_fee.permanentdelete')->middleware('permission:Service Fee Permanent Delete');
            Route::get('/admin/service_fee/show/{id}', [ServiceFeeController::class,'show'])->name('admin.service_fee.show')->middleware('permission:Service Fee List');
            Route::get('/admin/service_fee/status/{status?}/{id?}', [ServiceFeeController::class,'status'])->name('admin.service_fee.status')->middleware('permission:Service Fee List');
        
        });

        Route::group(['middleware' => ['permission:Product']], function () {

            Route::get('admin/products-list/{status?}', [ProductController::class,'index'])->name('admin.products')->middleware('permission:Product List');
            Route::get('admin/products/create', [ProductController::class,'create'])->name('admin.products.create')->middleware('permission:Product Create');
            Route::post('admin/products/store', [ProductController::class,'store'])->name('admin.products.store')->middleware('permission:Product Create');
            Route::get('admin/products/edit/{id}', [ProductController::class,'edit'])->name('admin.products.edit')->middleware('permission:Product Update');
            Route::post('admin/products/update/{id}', [ProductController::class,'update'])->name('admin.products.update')->middleware('permission:Product Update');
            Route::get('admin/products/delete/{id}',[ProductController::class,'destroy'])->name('admin.products.destroy')->middleware('permission:Product Permanent Delete');
            Route::get('admin/products/restore/{id}',[ProductController::class,'restore'])->name('admin.products.restore')->middleware('permission:Product Permanent Delete');
            Route::get('admin/products/permanentdelete/{id}',[ProductController::class,'permanentdelete'])->name('admin.products.permanentdelete')->middleware('permission:Product Permanent Delete');
            Route::get('/admin/products/show/{id}', [ProductController::class,'show'])->name('admin.products.show')->middleware('permission:Product List');
            Route::get('/admin/products/status/{status?}/{id?}', [ProductController::class,'status'])->name('admin.products.status')->middleware('permission:Product List');
        
        });

        Route::group(['middleware' => ['permission:Payment Mode']], function () {

            Route::get('admin/paymentmodes-list/{status?}', [PaymentModeController::class,'index'])->name('admin.paymentmodes')->middleware('permission:Payment Mode List');
            Route::get('admin/paymentmodes/create', [PaymentModeController::class,'create'])->name('admin.paymentmodes.create')->middleware('permission:Payment Mode Create');
            Route::post('admin/paymentmodes/store', [PaymentModeController::class,'store'])->name('admin.paymentmodes.store')->middleware('permission:Payment Mode Create');
            Route::get('admin/paymentmodes/edit/{id}', [PaymentModeController::class,'edit'])->name('admin.paymentmodes.edit')->middleware('permission:Payment Mode Update');
            Route::post('admin/paymentmodes/update/{id}', [PaymentModeController::class,'update'])->name('admin.paymentmodes.update')->middleware('permission:Payment Mode Update');
            Route::get('admin/paymentmodes/delete/{id}',[PaymentModeController::class,'destroy'])->name('admin.paymentmodes.destroy')->middleware('permission:Payment Mode Permanent Delete');
            Route::get('admin/paymentmodes/restore/{id}',[PaymentModeController::class,'restore'])->name('admin.paymentmodes.restore')->middleware('permission:Payment Mode Permanent Delete');
            Route::get('admin/paymentmodes/permanentdelete/{id}',[PaymentModeController::class,'permanentdelete'])->name('admin.paymentmodes.permanentdelete')->middleware('permission:Payment Mode Permanent Delete');
            Route::get('/admin/paymentmodes/show/{id}', [PaymentModeController::class,'show'])->name('admin.paymentmodes.show')->middleware('permission:Payment Mode List');
            Route::get('/admin/paymentmodes/status/{status?}/{id?}', [PaymentModeController::class,'status'])->name('admin.paymentmodes.status')->middleware('permission:Payment Mode List');
        
        });

        Route::group(['middleware' => ['permission:Wallet Discount']], function () {

            Route::get('admin/walletdiscount-list/{status?}', [WalletDiscountController::class,'index'])->name('admin.walletdiscount')->middleware('permission:Wallet Discount List');
            Route::get('admin/walletdiscount/create', [WalletDiscountController::class,'create'])->name('admin.walletdiscount.create')->middleware('permission:Wallet Discount Create');
            Route::post('admin/walletdiscount/store', [WalletDiscountController::class,'store'])->name('admin.walletdiscount.store')->middleware('permission:Wallet Discount Create');
            Route::get('admin/walletdiscount/edit/{id}', [WalletDiscountController::class,'edit'])->name('admin.walletdiscount.edit')->middleware('permission:Wallet Discount Update');
            Route::post('admin/walletdiscount/update/{id}', [WalletDiscountController::class,'update'])->name('admin.walletdiscount.update')->middleware('permission:Wallet Discount Update');
            Route::get('admin/walletdiscount/delete/{id}',[WalletDiscountController::class,'destroy'])->name('admin.walletdiscount.destroy')->middleware('permission:Wallet Discount Permanent Delete');
            Route::get('admin/walletdiscount/restore/{id}',[WalletDiscountController::class,'restore'])->name('admin.walletdiscount.restore')->middleware('permission:Wallet Discount Permanent Delete');
            Route::get('admin/walletdiscount/permanentdelete/{id}',[WalletDiscountController::class,'permanentdelete'])->name('admin.walletdiscount.permanentdelete')->middleware('permission:Wallet Discount Permanent Delete');
            Route::get('/admin/walletdiscount/show/{id}', [WalletDiscountController::class,'show'])->name('admin.walletdiscount.show')->middleware('permission:Wallet Discount List');
            Route::get('/admin/walletdiscount/status/{status?}/{id?}', [WalletDiscountController::class,'status'])->name('admin.walletdiscount.status')->middleware('permission:Wallet Discount List');
        
        });

        Route::group(['middleware' => ['permission:Sales Channel']], function () {

            Route::get('admin/sales_channels-list/{status?}', [SalesChannelController::class,'index'])->name('admin.sales_channels')->middleware('permission:Sales Channel List');
            Route::get('admin/sales_channels/create', [SalesChannelController::class,'create'])->name('admin.sales_channels.create')->middleware('permission:Sales Channel Create');
            Route::post('admin/sales_channels/store', [SalesChannelController::class,'store'])->name('admin.sales_channels.store')->middleware('permission:Sales Channel Create');
            Route::get('admin/sales_channels/edit/{id}', [SalesChannelController::class,'edit'])->name('admin.sales_channels.edit')->middleware('permission:Sales Channel Update');
            Route::post('admin/sales_channels/update/{id}', [SalesChannelController::class,'update'])->name('admin.sales_channels.update')->middleware('permission:Sales Channel Update');
            Route::get('admin/sales_channels/delete/{id}',[SalesChannelController::class,'destroy'])->name('admin.sales_channels.destroy')->middleware('permission:Sales Channel Permanent Delete');
            Route::get('admin/sales_channels/restore/{id}',[SalesChannelController::class,'restore'])->name('admin.sales_channels.restore')->middleware('permission:Sales Channel Permanent Delete');
            Route::get('admin/sales_channels/permanentdelete/{id}',[SalesChannelController::class,'permanentdelete'])->name('admin.sales_channels.permanentdelete')->middleware('permission:Sales Channel Permanent Delete');
            Route::get('/admin/sales_channels/show/{id}', [SalesChannelController::class,'show'])->name('admin.sales_channels.show')->middleware('permission:Sales Channel List');
            Route::get('/admin/sales_channels/status/{status?}/{id?}', [SalesChannelController::class,'status'])->name('admin.sales_channels.status')->middleware('permission:Sales Channel List');
        
        });

        Route::group(['middleware' => ['permission:Supplier']], function () {

            Route::get('admin/suppliers-list/{status?}', [SupplierController::class,'index'])->name('admin.suppliers')->middleware('permission:Supplier List');
            Route::get('admin/suppliers/create', [SupplierController::class,'create'])->name('admin.suppliers.create')->middleware('permission:Supplier Create');
            Route::post('admin/suppliers/store', [SupplierController::class,'store'])->name('admin.suppliers.store')->middleware('permission:Supplier Create');
            Route::get('admin/suppliers/edit/{id}', [SupplierController::class,'edit'])->name('admin.suppliers.edit')->middleware('permission:Supplier Update');
            Route::post('admin/suppliers/update/{id}', [SupplierController::class,'update'])->name('admin.suppliers.update')->middleware('permission:Supplier Update');
            Route::get('admin/suppliers/delete/{id}',[SupplierController::class,'destroy'])->name('admin.suppliers.destroy')->middleware('permission:Supplier Permanent Delete');
            Route::get('admin/suppliers/restore/{id}',[SupplierController::class,'restore'])->name('admin.suppliers.restore')->middleware('permission:Supplier Permanent Delete');
            Route::get('admin/suppliers/permanentdelete/{id}',[SupplierController::class,'permanentdelete'])->name('admin.suppliers.permanentdelete')->middleware('permission:Supplier Permanent Delete');
            Route::get('/admin/suppliers/show/{id}', [SupplierController::class,'show'])->name('admin.suppliers.show')->middleware('permission:Supplier List');
            Route::get('/admin/suppliers/status/{status?}/{id?}', [SupplierController::class,'status'])->name('admin.suppliers.status')->middleware('permission:Supplier List');
        
        });
        
        Route::group(['middleware' => ['permission:Convenience Fee']], function () {

            Route::get('admin/conveniencefee-list/{status?}', [ConvenienceFeeController::class,'index'])->name('admin.conveniencefee')->middleware('permission:Convenience Fee List');
            Route::get('admin/conveniencefee/create', [ConvenienceFeeController::class,'create'])->name('admin.conveniencefee.create')->middleware('permission:Convenience Fee Create');
            Route::post('admin/conveniencefee/store', [ConvenienceFeeController::class,'store'])->name('admin.conveniencefee.store')->middleware('permission:Convenience Fee Create');
            Route::get('admin/conveniencefee/edit/{id}', [ConvenienceFeeController::class,'edit'])->name('admin.conveniencefee.edit')->middleware('permission:Convenience Fee Update');
            Route::post('admin/conveniencefee/update/{id}', [ConvenienceFeeController::class,'update'])->name('admin.conveniencefee.update')->middleware('permission:Convenience Fee Update');
            Route::get('admin/conveniencefee/delete/{id}',[ConvenienceFeeController::class,'destroy'])->name('admin.conveniencefee.destroy')->middleware('permission:Convenience Fee Permanent Delete');
            Route::get('admin/conveniencefee/restore/{id}',[ConvenienceFeeController::class,'restore'])->name('admin.conveniencefee.restore')->middleware('permission:Convenience Fee Permanent Delete');
            Route::get('admin/conveniencefee/permanentdelete/{id}',[ConvenienceFeeController::class,'permanentdelete'])->name('admin.conveniencefee.permanentdelete')->middleware('permission:Convenience Fee Permanent Delete');
            Route::get('/admin/conveniencefee/show/{id}', [ConvenienceFeeController::class,'show'])->name('admin.conveniencefee.show')->middleware('permission:Convenience Fee List');
            Route::get('/admin/conveniencefee/status/{status?}/{id?}', [ConvenienceFeeController::class,'status'])->name('admin.conveniencefee.status')->middleware('permission:Convenience Fee List');
        
        });

        Route::group(['middleware' => ['permission:Flights']], function () {

            Route::get('admin/flights-list/{status?}', [FlightsController::class,'index'])->name('admin.flights_list')->middleware('permission:Flights List');
            Route::get('admin/flights/create', [FlightsController::class,'create'])->name('admin.flights.create')->middleware('permission:Flights Create');
            Route::post('admin/flights/store', [FlightsController::class,'store'])->name('admin.flights.store')->middleware('permission:Flights Create');
            Route::get('admin/flights/edit/{id}', [FlightsController::class,'edit'])->name('admin.flights.edit')->middleware('permission:Flights Update');
            Route::post('admin/flights/update/{id}', [FlightsController::class,'update'])->name('admin.flights.update')->middleware('permission:Flights Update');
            Route::get('admin/flights/delete/{id}',[FlightsController::class,'destroy'])->name('admin.flights.destroy')->middleware('permission:Flights Permanent Delete');
            Route::get('admin/flights/restore/{id}',[FlightsController::class,'restore'])->name('admin.flights.restore')->middleware('permission:Flights Permanent Delete');
            Route::get('admin/flights/permanentdelete/{id}',[FlightsController::class,'permanentdelete'])->name('admin.flights.permanentdelete')->middleware('permission:Flights Permanent Delete');
            Route::get('/admin/flights/show/{id}', [FlightsController::class,'show'])->name('admin.flights.show')->middleware('permission:Flights List');
            Route::get('/admin/flights/status/{status?}/{id?}', [FlightsController::class,'status'])->name('admin.flights.status')->middleware('permission:Flights List');
        
        });


        Route::group(['middleware' => ['permission:Fare Type']], function () {

            Route::get('admin/fare_type-list/{status?}', [FareTypeController::class,'index'])->name('admin.fare_type')->middleware('permission:Fare Type List');
            Route::get('admin/fare_type/create', [FareTypeController::class,'create'])->name('admin.fare_type.create')->middleware('permission:Fare Type Create');
            Route::post('/fare_type/store', [FareTypeController::class,'store'])->name('admin.fare_type.store')->middleware('permission:Fare Type Create');
            Route::get('admin/fare_type/edit/{id}', [FareTypeController::class,'edit'])->name('admin.fare_type.edit')->middleware('permission:Fare Type Update');
            Route::post('admin/fare_type/update/{id}', [FareTypeController::class,'update'])->name('admin.fare_type.update')->middleware('permission:Fare Type Update');
            Route::get('admin/fare_type/delete/{id}',[FareTypeController::class,'destroy'])->name('admin.fare_type.destroy')->middleware('permission:Fare Type Permanent Delete');
            Route::get('admin/fare_type/restore/{id}',[FareTypeController::class,'restore'])->name('admin.fare_type.restore')->middleware('permission:Fare Type Permanent Delete');
            Route::get('admin/fare_type/permanentdelete/{id}',[FareTypeController::class,'permanentdelete'])->name('admin.fare_type.permanentdelete')->middleware('permission:Fare Type Permanent Delete');
            Route::get('/admin/fare_type/show/{id}', [FareTypeController::class,'show'])->name('admin.fare_type.show')->middleware('permission:Fare Type List');
            Route::get('/admin/fare_type/status/{status?}/{id?}', [FareTypeController::class,'status'])->name('admin.fare_type.status')->middleware('permission:Fare Type List');
        
        });

        Route::group(['middleware' => ['permission:Travel Class']], function () {

            Route::get('admin/travel_class-list/{status?}', [TravelClassController::class,'index'])->name('admin.travel_class')->middleware('permission:Travel Class List');
            Route::get('admin/travel_class/create', [TravelClassController::class,'create'])->name('admin.travel_class.create')->middleware('permission:Travel Class Create');
            Route::post('/travel_class/store', [TravelClassController::class,'store'])->name('admin.travel_class.store')->middleware('permission:Travel Class Create');
            Route::get('admin/travel_class/edit/{id}', [TravelClassController::class,'edit'])->name('admin.travel_class.edit')->middleware('permission:Travel Class Update');
            Route::post('admin/travel_class/update/{id}', [TravelClassController::class,'update'])->name('admin.travel_class.update')->middleware('permission:Travel Class Update');
            Route::get('admin/travel_class/delete/{id}',[TravelClassController::class,'destroy'])->name('admin.travel_class.destroy')->middleware('permission:Travel Class Permanent Delete');
            Route::get('admin/travel_class/restore/{id}',[TravelClassController::class,'restore'])->name('admin.travel_class.restore')->middleware('permission:Travel Class Permanent Delete');
            Route::get('admin/travel_class/permanentdelete/{id}',[TravelClassController::class,'permanentdelete'])->name('admin.travel_class.permanentdelete')->middleware('permission:Travel Class Permanent Delete');
            Route::get('/admin/travel_class/show/{id}', [TravelClassController::class,'show'])->name('admin.travel_class.show')->middleware('permission:Travel Class List');
            Route::get('/admin/travel_class/status/{status?}/{id?}', [TravelClassController::class,'status'])->name('admin.travel_class.status')->middleware('permission:Travel Class List');
        
        });

        Route::group(['middleware' => ['permission:Airlines']], function () {

            Route::get('admin/airlines-list/{status?}', [AirlinesController::class,'index'])->name('admin.airlines')->middleware('permission:Airlines List');
            Route::get('admin/airlines/create', [AirlinesController::class,'create'])->name('admin.airlines.create')->middleware('permission:Airlines Create');
            Route::post('/airlines/store', [AirlinesController::class,'store'])->name('admin.airlines.store')->middleware('permission:Airlines Create');
            Route::get('admin/airlines/edit/{id}', [AirlinesController::class,'edit'])->name('admin.airlines.edit')->middleware('permission:Airlines Update');
            Route::post('admin/airlines/update/{id}', [AirlinesController::class,'update'])->name('admin.airlines.update')->middleware('permission:Airlines Update');
            Route::get('admin/airlines/delete/{id}',[AirlinesController::class,'destroy'])->name('admin.airlines.destroy')->middleware('permission:Airlines Permanent Delete');
            Route::get('admin/airlines/restore/{id}',[AirlinesController::class,'restore'])->name('admin.airlines.restore')->middleware('permission:Airlines Permanent Delete');
            Route::get('admin/airlines/permanentdelete/{id}',[AirlinesController::class,'permanentdelete'])->name('admin.airlines.permanentdelete')->middleware('permission:Airlines Permanent Delete');
            Route::get('/admin/airlines/show/{id}', [AirlinesController::class,'show'])->name('admin.airlines.show')->middleware('permission:Airlines List');
            Route::get('/admin/airlines/status/{status?}/{id?}', [AirlinesController::class,'status'])->name('admin.airlines.status')->middleware('permission:Airlines List');
        
        });

        Route::group(['middleware' => ['permission:Aircraft']], function () {

            Route::get('admin/aircraft-list/{status?}', [AircraftController::class,'index'])->name('admin.aircraft')->middleware('permission:Aircraft List');
            Route::get('admin/aircraft/create', [AircraftController::class,'create'])->name('admin.aircraft.create')->middleware('permission:Aircraft Create');
            Route::post('/aircraft/store', [AircraftController::class,'store'])->name('admin.aircraft.store')->middleware('permission:Aircraft Create');
            Route::get('admin/aircraft/edit/{id}', [AircraftController::class,'edit'])->name('admin.aircraft.edit')->middleware('permission:Aircraft Update');
            Route::post('admin/aircraft/update/{id}', [AircraftController::class,'update'])->name('admin.aircraft.update')->middleware('permission:Aircraft Update');
            Route::get('admin/aircraft/delete/{id}',[AircraftController::class,'destroy'])->name('admin.aircraft.destroy')->middleware('permission:Aircraft Permanent Delete');
            Route::get('admin/aircraft/restore/{id}',[AircraftController::class,'restore'])->name('admin.aircraft.restore')->middleware('permission:Aircraft Permanent Delete');
            Route::get('admin/aircraft/permanentdelete/{id}',[AircraftController::class,'permanentdelete'])->name('admin.aircraft.permanentdelete')->middleware('permission:Aircraft Permanent Delete');
            Route::get('/admin/aircraft/show/{id}', [AircraftController::class,'show'])->name('admin.aircraft.show')->middleware('permission:Aircraft List');
            Route::get('/admin/aircraft/status/{status?}/{id?}', [AircraftController::class,'status'])->name('admin.aircraft.status')->middleware('permission:Aircraft List');
        
        });

        Route::group(['middleware' => ['permission:Trip Type']], function () {

            Route::get('admin/trip_type-list/{status?}', [TripTypeController::class,'index'])->name('admin.trip_type')->middleware('permission:Trip Type List');
            Route::get('admin/trip_type/create', [TripTypeController::class,'create'])->name('admin.trip_type.create')->middleware('permission:Trip Type Create');
            Route::post('/trip_type/store', [TripTypeController::class,'store'])->name('admin.trip_type.store')->middleware('permission:Trip Type Create');
            Route::get('admin/trip_type/edit/{id}', [TripTypeController::class,'edit'])->name('admin.trip_type.edit')->middleware('permission:Trip Type Update');
            Route::post('admin/trip_type/update/{id}', [TripTypeController::class,'update'])->name('admin.trip_type.update')->middleware('permission:Trip Type Update');
            Route::get('admin/trip_type/delete/{id}',[TripTypeController::class,'destroy'])->name('admin.trip_type.destroy')->middleware('permission:Trip Type Permanent Delete');
            Route::get('admin/trip_type/restore/{id}',[TripTypeController::class,'restore'])->name('admin.trip_type.restore')->middleware('permission:Trip Type Permanent Delete');
            Route::get('admin/trip_type/permanentdelete/{id}',[TripTypeController::class,'permanentdelete'])->name('admin.trip_type.permanentdelete')->middleware('permission:Trip Type Permanent Delete');
            Route::get('/admin/trip_type/show/{id}', [TripTypeController::class,'show'])->name('admin.trip_type.show')->middleware('permission:Trip Type List');
            Route::get('/admin/trip_type/status/{status?}/{id?}', [TripTypeController::class,'status'])->name('admin.trip_type.status')->middleware('permission:Trip Type List');
        
        });

        Route::group(['middleware' => ['permission:Vendor']], function () {

            Route::any('/admin/vendor-list/{status?}', [VendorController::class,'index'])->name('admin.vendor')->middleware('permission:Vendor List');
            Route::any('/admin/vendor/get_sub_cat',  [VendorController::class,'get_sub_cat'])->name('get_sub_cat');
            Route::any('/admin/vendor/store',  [VendorController::class,'store'])->name('admin.vendor.store')->middleware('permission:Vendor Create');
            Route::any('/admin/vendor/payment/delete/{id}',  [VendorController::class,'payment_delete'])->name('payment.delete')->middleware('permission:Vendor Permanent Delete');
            Route::any('/admin/vendor/video/delete/{id}',  [VendorController::class,'delete'])->name('video.delete');
            Route::any('/admin/vendor/create',  [VendorController::class,'create_info'])->name('admin.vendor.info')->middleware('permission:Vendor Create');
            Route::any('/admin/vendor/store_info',  [VendorController::class,'store_info'])->name('admin.vendor.store_info')->middleware('permission:Vendor Create');
            Route::get('/admin/vendor/edit/{id}', [VendorController::class,'edit'])->name('admin.vendor.edit')->middleware('permission:Vendor Update');
            Route::get('/admin/vendor/delete/{id}',[VendorController::class,'destroy'])->name('admin.vendor.destroy')->middleware('permission:Vendor Permanent Delete');
            Route::get('/admin/vendor/restore/{id}',[VendorController::class,'restore'])->name('admin.vendor.restore')->middleware('permission:Vendor Permanent Delete');
            Route::get('/admin/vendor/permanentdelete/{id}',[VendorController::class,'permanentdelete'])->name('admin.vendor.permanentdelete')->middleware('permission:Vendor Permanent Delete');
            Route::get('/admin/vendor/show/{id}', [VendorController::class,'show'])->name('admin.vendor.show')->middleware('permission:Vendor List');
            Route::post('/admin/vendor/update/{id}', [VendorController::class,'update'])->name('admin.vendor.update')->middleware('permission:Vendor Update');
            Route::get('/admin/vendor/status/{status?}/{id?}', [VendorController::class,'status'])->name('admin.vendor.status')->middleware('permission:Vendor List');
            Route::get('/admin/vendor/account_status/{account_status?}/{id?}', [VendorController::class,'account_status'])->name('admin.vendor.account_status')->middleware('permission:Vendor List');
            Route::post('/admin/vendor/vendor_status/{id?}', [VendorController::class,'vendor_status'])->name('admin.vendor.status.update')->middleware('permission:Vendor Update');
            Route::post('/admin/vendor/images/approve/{id}', [VendorController::class,'image_approval'])->name('admin.vendor.image_approve')->middleware('permission:Vendor List');
            Route::any('/admin/get/service',  [VendorController::class,'get_service'])->name('get-service');
            Route::get('front/getCity', [VendorController::class,'getCity'])->name('getCity');
            Route::get('front/vendor/cashfree/{id}', [CashfreePaymentController::class,'store'])->name('vendor.cashfree');
            
        });


        Route::group(['middleware' => ['permission:Agency']], function () {

            Route::get('/admin/agency', [AgencyController::class,'index'])->name('admin.agency')->middleware('permission:Agency List');
            Route::get('/admin/agency/create',  [AgencyController::class,'create'])->name('admin.agency.create')->middleware('permission:Agency Create');
            Route::post('/admin/agency/store',  [AgencyController::class,'store'])->name('admin.agency.store')->middleware('permission:Agency Create');
            Route::get('/admin/agency/edit/{id}', [AgencyController::class,'edit'])->name('admin.agency.edit')->middleware('permission:Agency Update');
            Route::get('/admin/agency/delete/{id}',[AgencyController::class,'destroy'])->name('admin.agency.destroy')->middleware('permission:Agency Permanent Delete');
            Route::post('/admin/agency/bulk/delete/',[AgencyController::class,'bulkDelete'])->name('agency.bulk.delete')->middleware('permission:Agency Permanent Delete');
            Route::get('/admin/agency/restore/{id}',[AgencyController::class,'restore'])->name('admin.agency.restore')->middleware('permission:Agency Permanent Delete');
            Route::get('/admin/agency/permanentdelete/{id}',[AgencyController::class,'permanentdelete'])->name('admin.agency.permanentdelete')->middleware('permission:Agency Permanent Delete');
            Route::post('/admin/agency/update/{id}', [AgencyController::class,'update'])->name('admin.agency.update')->middleware('permission:Agency Update');
            Route::get('/admin/agency/show/{id}', [AgencyController::class,'show'])->name('admin.agency.show')->middleware('permission:Agency List');
            Route::get('/admin/agency/status/{status?}/{id?}', [AgencyController::class,'status'])->name('admin.agency.status')->middleware('permission:Agency List');
    
        });

        Route::group(['middleware' => ['permission:Permission']], function () {

            Route::get('admin/permission-list', [PermissionsController::class,'index'])->name('admin.permission')->middleware('permission:Permission List');
            Route::get('admin/permission/create', [PermissionsController::class,'create'])->name('admin.permission.create')->middleware('permission:Permission Create');
            Route::post('admin/permission/store', [PermissionsController::class,'store'])->name('admin.permission.store')->middleware('permission:Permission Create');
            Route::get('admin/permission/edit/{id}', [PermissionsController::class,'edit'])->name('admin.permission.edit')->middleware('permission:Permission Update');
            Route::post('admin/permission/update/{id}', [PermissionsController::class,'update'])->name('admin.permission.update')->middleware('permission:Permission Update');
            Route::get('admin/permission/delete/{id}',[PermissionsController::class,'destroy'])->name('admin.permission.delete')->middleware('permission:Permission Delete');
            Route::get('admin/permission/show/{id}',[PermissionsController::class,'show'])->name('admin.permission.show')->middleware('permission:Permission List');
        });

        Route::group(['middleware' => ['permission:Coupon']], function () {

            Route::get('/admin/coupon-list', [CouponController::class,'index'])->name('admin.coupon')->middleware('permission:Coupon List');
            Route::get('/admin/coupon/create',  [CouponController::class,'create'])->name('admin.coupon.create')->middleware('permission:Coupon Create');
            Route::post('/admin/coupon/store',  [CouponController::class,'store'])->name('admin.coupon.store')->middleware('permission:Coupon Create');
            Route::get('/admin/coupon/edit/{id}', [CouponController::class,'edit'])->name('admin.coupon.edit')->middleware('permission:Coupon Update');
            Route::get('/admin/coupon/delete/{id}',[CouponController::class,'destroy'])->name('admin.coupon.destroy')->middleware('permission:Coupon Delete');
            Route::get('/admin/coupon/restore/{id}',[CouponController::class,'restore'])->name('admin.coupon.restore')->middleware('permission:Coupon Permanent Delete');
            Route::get('/admin/coupon/permanentdelete/{id}',[CouponController::class,'permanentdelete'])->name('admin.coupon.permanentdelete')->middleware('permission:Coupon Permanent Delete');
            Route::post('/admin/coupon/update/{id}', [CouponController::class,'update'])->name('admin.coupon.update')->middleware('permission:Coupon Update');
            Route::get('/admin/coupon/show/{id}', [CouponController::class,'show'])->name('admin.coupon.show')->middleware('permission:Coupon List');
            Route::get('/admin/coupon/status/{status?}/{id?}', [CouponController::class,'status'])->name('admin.coupon.status')->middleware('permission:Coupon List');
    
        });

        Route::group(['middleware' => ['permission:Booking']], function () {

            Route::get('/admin/bookings', [BookingController::class,'index'])->name('admin.booking.list')->middleware('permission:Booking List');
            Route::get('/admin/bookings-detail/{booking_id}', [BookingController::class,'BookingDetail'])->name('admin.booking.detail')->middleware('permission:Booking List');
            Route::get('/admin/generate-ticket/{booking_id}', [BookingController::class,'GenerateTicket'])->name('admin.booking.generate_ticket')->middleware('permission:Generate Ticket');
            Route::get('/admin/bookings/search', [BookingController::class,'search_bookings'])->name('admin.booking.search')->middleware('permission:Booking List');
            Route::get('/admin/bookings/card', [BookingController::class,'booking_card'])->name('admin.booking.card')->middleware('permission:Booking List');
            Route::post('/admin/create-ticket', [BookingController::class,'CreateTicket'])->name('admin.booking.create.ticket')->middleware('permission:Booking List');
    
        });


        Route::group([], function () {

            Route::get('/admin/flight/bookings', [FlightBookingsController::class,'index'])->name('admin.flight_bookings');
            Route::get('/admin/flight/bookings/detail', [FlightBookingsController::class,'index'])->name('admin.flight_bookings.show');
    
        });

        Route::group(['middleware' => ['permission:Coupon']], function () {
            Route::get('/admin/flights/search', [SearchFlightsController::class,'search_flights'])->name('admin.search.flights')->middleware('permission:Coupon List');
            Route::get('/admin/flights/data', [SearchFlightsController::class,'flights'])->name('admin.flights')->middleware('permission:Coupon List');
        });
    });
