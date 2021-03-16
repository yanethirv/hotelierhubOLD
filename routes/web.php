<?php

use Illuminate\Support\Facades\Route;
//use ArielMejiaDev\LarapexCharts\LarapexChart;

Route::view('/', 'welcome')->name("welcome");

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'verified');

Route::post('stripe/webhook','StripeWebHookController@handleWebhook');

Route::group(['middleware' => ['role:super-admin,admin']], function () {

});

Route::group(['middleware' => ['auth','verified']], function () {
    Route::view('permissions', 'admin.permissions');
    Route::view('roles', 'admin.roles')->name("roles");
    Route::resource('role', 'Admin\RolesController')->only(['edit', 'update']);
    Route::view('users', 'admin.users')->name("users");
    Route::resource('user', 'Admin\UsersController');
    Route::resource('change-password','Users\PasswordController');
    Route::resource('profile','Users\ProfileController');
    Route::resource('hotel-profile','HotelController');

    /* HOTEL */
    Route::resource('hotel-general','HotelGeneralController');

    
    Route::get("/hotel-profile.downloadProfile/{hotel}", "HotelController@downloadProfile")->name("hotel-profile.downloadProfile");
    Route::resource('update-password','Users\SettingsController');

    //Mi Tarjeta
    Route::get("credit-card", 'BillingController@creditCardForm')->name("billing.credit_card_form");
    Route::post("credit-card", 'BillingController@processCreditCardForm')->name("billing.process_credit_card");
    //Mis Pedidos
    Route::group(["prefix" => "orders"], function () {
        Route::get("/", "OrderController@index")->name("orders.index");
        Route::post("/", "OrderController@process")->name("orders.process");
        Route::get("/invoice/{invoice}", "OrderController@invoice")->name("orders.invoice");
        Route::get("/downloadInvoice/{order}", "OrderController@downloadInvoice")->name("orders.downloadInvoice");
        Route::get("/show-invoice/{order}", "OrderController@showInvoice")->name("orders.show-invoice");
        Route::post("/to_cart/{id}", "OrderController@toCart")->name("orders.to_cart");
        Route::get("/{id}", "OrderController@show")->name("orders.detail");
    });
    //Checkout
    Route::view('checkout', 'shop.checkout')->name("checkout");
    //Subscripciones
    Route::get("plans", "PlanController@index")->name("plans.index");
    Route::get("plans/create", "PlanController@create")->name("plans.create");
    Route::post("plans/store", "PlanController@store")->name("plans.store");
    Route::post("plans/buy", "PlanController@buy")->name("plans.buy");
    Route::post("plans/cancel", "PlanController@cancelSubscription")->name("plans.cancel");
    Route::post("plans/resume", "PlanController@resumeSubscription")->name("plans.resume");
    Route::get("/plans/{plan}", "PlanController@showInvoice")->name("plans.show-invoice");
    Route::get("/plans.downloadInvoice/{plan}", "PlanController@downloadInvoice")->name("plans.downloadInvoice");
    Route::get("/plans-detail/{id}", "PlanController@detail")->name("plans.detail");
    Route::get("/plans-edit/{id}", "PlanController@edit")->name("plans.edit");

    //Servicios-Recurrentes
    Route::get("services-recurring", "ServiceRecurringController@index")->name("services-recurring.index");
    Route::get("services-recurring/create", "ServiceRecurringController@create")->name("services-recurring.create");
    Route::post("services-recurring/store", "ServiceRecurringController@store")->name("services-recurring.store");
    Route::post("services-recurring/buy", "ServiceRecurringController@buy")->name("services-recurring.buy");
    Route::post("services-recurring/cancel", "ServiceRecurringController@cancelSubscription")->name("services-recurring.cancel");
    Route::post("services-recurring/resume", "ServiceRecurringController@resumeSubscription")->name("services-recurring.resume");
    
    //Servicios-OneTime
    Route::get('/shop', 'ProductController@index')->name('shop');
    Route::post("service/{id}/add", "ProductController@addToCart")->name("service.add");
    Route::delete("service/{id}", "ProductController@deleteFromCart")->name("service.delete");

    //Servicios de Activación
    Route::get('/activation-services', 'ActivationController@index')->name('activation-services');
    
    Route::group(["prefix" => "course"], function () {
        Route::get("/{id}/start", "CourseController@start")->name("course.start");
    });

    Route::view('services', 'admin.products')->name("services");
    Route::view('services-request', 'admin.products-request')->name("services-request");
    Route::view('activations-request', 'admin.activations-request')->name("activations-request");
    Route::view('suscriptions', 'admin.suscriptions')->name("suscriptions");
    Route::view('subscriptions-request', 'admin.subscriptions-request')->name("subscriptions-request");
    Route::resource('service', 'ProductController');
    
    Route::view('documents-resources', 'admin.documents-resources')->name("documents-resources");
    Route::resource('document-resource', 'DocumentController');

    Route::view('docs', 'admin.docs')->name("docs");

    // Hotel - Rooms
    Route::view('rooms', 'hotel.rooms')->name("rooms");       // 1 - Apunta a la carpeta views/hotel
    Route::resource('room', 'RoomController');

    // Hotel - Restaurants
    Route::view('restaurants', 'hotel.restaurants')->name("restaurants");       // 1 - Apunta a la carpeta views/hotel
    Route::resource('restaurant', 'RestaurantController');

    // Hotel - Meal Plans
    Route::view('meal-plans', 'hotel.meal-plans')->name("meal-plans");       // 1 - Apunta a la carpeta views/hotel
    Route::resource('meal-plan', 'MealplanController');

     // Hotel - Policies
     Route::view('policies', 'hotel.policies')->name("policies");       // 1 - Apunta a la carpeta views/hotel
     Route::resource('policy', 'PolicyController');

    // Hotel - Rates
    Route::view('rate-plans', 'hotel.rate-plans')->name("rate-plans");       // 1 - Apunta a la carpeta views/hotel
    Route::resource('rate-plan', 'RateplanController');

   // Hotel - Images
   Route::view('hotel-photos', 'hotel.photo')->name("hotel-photos");       // 1 - Apunta a la carpeta views/hotel
   Route::resource('photo', 'PhotoController');

    // Hotel - Rate plans - Rooms
    Route::view('rateplans-rooms', 'hotel.rateplans-rooms')->name("rateplans-rooms");       // 1 - Apunta a la carpeta views/hotel
    Route::resource('rateplan-room', 'RateplanroomController');

    // Hotel - Documents
    Route::view('documents-hotel', 'hotel.documents')->name("documents-hotel");
    Route::resource('documenthotel', 'DocumenthotelController');


    Route::resource('activation', 'ActivationController');
    Route::resource('product-request', 'ProductRequestController');
    Route::resource('plan', 'PlanController');
    Route::resource('subscription-request', 'SubscriptionRequestController');
    Route::get('product-document-download/{id}', 'ProductController@downloadDocument')->name('product-document-download');
    Route::get('plan-document-download/{id}', 'PlanController@downloadDocument')->name('plan-document-download');
    Route::get('message-document-download/{id}', 'MessageController@downloadDocument')->name('message-document-download');

    Route::view('types', 'admin.types');

    //Charts
    Route::get("charts", "ChartController@index")->name("charts");

    //Messages
    Route::get("messages/create", "MessageController@create")->name("messages.create");
    Route::get("massives/create", "MassiveController@create")->name("massives.create");
    Route::get("messages/{id}", "MessageController@show")->name("messages.show");
    Route::post("messages/store", "MessageController@store")->name("messages.store");
    Route::post("massives/store", "MassiveController@store")->name("massives.store");
    Route::get("massives/{id}", "MassiveController@show")->name("massives.show");
    Route::get("notifications", "NotificationController@index")->name("notifications.index");
    Route::patch("notifications/{id}", "NotificationController@read")->name("notifications.read");
    Route::delete("notifications/{id}", "NotificationController@destroy")->name("notifications.destroy");

    //Services Request
    //Route::get("product-request", "ProductRequestController@index")->name("product-request.index");

    //Subscriptions Request
    //Route::get("subscription-request", "SubscriptionRequestController@index")->name("subscription-request.index");

    //Route::get('charts', function () {
    //    $chart = (new LarapexChart)->setTitle('Users')->setXAxis(['Active', 'Guests'])->setDataset([100, 200]);
    //    return view('admin.charts.index', compact('chart'));
    //})->name("charts");
});

Auth::routes(['verify' => true]);