<?php

use App\Http\Controllers\Frontend\ClientesController;

Route::get('/', 'HomeController@index')->name('home');
Auth::routes(['register' => false]);

//GRUPO DE FRONT
Route::prefix('cliente')->namespace('Frontend')->group(function () {
    Route::get('registrar', 'ClientesController@create')->name('registraCliente');
    Route::post('login', 'CustomAuthController@login')->name('login');
    Route::middleware('cliente')->group(function () {
        Route::get('perfil', 'ClientesController@perfilClientes')->name('perfilCliente');
        Route::get('logout', 'CustomAuthController@logout')->name('logout');
    });
});


Route::group(['as' => '/', 'namespace' => 'Frontend' ], function () {
     Route::get('paquete-turistico/{id}', 'PaquetesController@show')->name('ver_paquete');
     Route::get('paquetes-turisticos', 'PaquetesController@index')->name('lista_paquetes');
 });


Route::post('registrarCliente', [ClientesController::class , 'registrarCliente'])->name('registrarCliente');



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

   

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Prestadores De Servicios
    Route::resource('prestadores-de-servicios', 'PrestadoresDeServiciosController', ['except' => ['destroy']]);

    // Estados
    Route::delete('estados/destroy', 'EstadosController@massDestroy')->name('estados.massDestroy');
    Route::resource('estados', 'EstadosController');

    // Municipios
    Route::delete('municipios/destroy', 'MunicipiosController@massDestroy')->name('municipios.massDestroy');
    Route::resource('municipios', 'MunicipiosController');

    // Destinos
    Route::delete('destinos/destroy', 'DestinosController@massDestroy')->name('destinos.massDestroy');
    Route::resource('destinos', 'DestinosController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Clientes
    Route::delete('clientes/destroy', 'ClientesController@massDestroy')->name('clientes.massDestroy');
    Route::resource('clientes', 'ClientesController');

    // Idiomas
    Route::delete('idiomas/destroy', 'IdiomasController@massDestroy')->name('idiomas.massDestroy');
    Route::resource('idiomas', 'IdiomasController');

    // Divisas
    Route::delete('divisas/destroy', 'DivisasController@massDestroy')->name('divisas.massDestroy');
    Route::resource('divisas', 'DivisasController');

    // Estatus Reservas
    Route::delete('estatus-reservas/destroy', 'EstatusReservasController@massDestroy')->name('estatus-reservas.massDestroy');
    Route::resource('estatus-reservas', 'EstatusReservasController');

    // Estatus Pagos
    Route::delete('estatus-pagos/destroy', 'EstatusPagosController@massDestroy')->name('estatus-pagos.massDestroy');
    Route::resource('estatus-pagos', 'EstatusPagosController');

    // Reservas
    Route::delete('reservas/destroy', 'ReservasController@massDestroy')->name('reservas.massDestroy');
    Route::resource('reservas', 'ReservasController');

    // Detalle De Reserva
    Route::delete('detalle-de-reservas/destroy', 'DetalleDeReservaController@massDestroy')->name('detalle-de-reservas.massDestroy');
    Route::resource('detalle-de-reservas', 'DetalleDeReservaController');

    // Pagos
    Route::delete('pagos/destroy', 'PagosController@massDestroy')->name('pagos.massDestroy');
    Route::resource('pagos', 'PagosController');

    // Enlaces
    Route::delete('enlaces/destroy', 'EnlacesController@massDestroy')->name('enlaces.massDestroy');
    Route::resource('enlaces', 'EnlacesController');

    // Bloques Pagina
    Route::delete('bloques-paginas/destroy', 'BloquesPaginaController@massDestroy')->name('bloques-paginas.massDestroy');
    Route::post('bloques-paginas/media', 'BloquesPaginaController@storeMedia')->name('bloques-paginas.storeMedia');
    Route::post('bloques-paginas/ckmedia', 'BloquesPaginaController@storeCKEditorImages')->name('bloques-paginas.storeCKEditorImages');
    Route::resource('bloques-paginas', 'BloquesPaginaController');

    // Admin Config
    Route::delete('admin-configs/destroy', 'AdminConfigController@massDestroy')->name('admin-configs.massDestroy');
    Route::resource('admin-configs', 'AdminConfigController');

    // Banners
    Route::delete('banners/destroy', 'BannersController@massDestroy')->name('banners.massDestroy');
    Route::post('banners/media', 'BannersController@storeMedia')->name('banners.storeMedia');
    Route::post('banners/ckmedia', 'BannersController@storeCKEditorImages')->name('banners.storeCKEditorImages');
    Route::resource('banners', 'BannersController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

/*
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Prestadores De Servicios
    Route::resource('prestadores-de-servicios', 'PrestadoresDeServiciosController', ['except' => ['destroy']]);

    // Estados
    Route::delete('estados/destroy', 'EstadosController@massDestroy')->name('estados.massDestroy');
    Route::resource('estados', 'EstadosController');

    // Municipios
    Route::delete('municipios/destroy', 'MunicipiosController@massDestroy')->name('municipios.massDestroy');
    Route::resource('municipios', 'MunicipiosController');

    // Destinos
    Route::delete('destinos/destroy', 'DestinosController@massDestroy')->name('destinos.massDestroy');
    Route::resource('destinos', 'DestinosController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Clientes
    Route::delete('clientes/destroy', 'ClientesController@massDestroy')->name('clientes.massDestroy');
    Route::resource('clientes', 'ClientesController');

    // Idiomas
    Route::delete('idiomas/destroy', 'IdiomasController@massDestroy')->name('idiomas.massDestroy');
    Route::resource('idiomas', 'IdiomasController');

    // Divisas
    Route::delete('divisas/destroy', 'DivisasController@massDestroy')->name('divisas.massDestroy');
    Route::resource('divisas', 'DivisasController');

    // Estatus Reservas
    Route::delete('estatus-reservas/destroy', 'EstatusReservasController@massDestroy')->name('estatus-reservas.massDestroy');
    Route::resource('estatus-reservas', 'EstatusReservasController');

    // Estatus Pagos
    Route::delete('estatus-pagos/destroy', 'EstatusPagosController@massDestroy')->name('estatus-pagos.massDestroy');
    Route::resource('estatus-pagos', 'EstatusPagosController');

    // Reservas
    Route::delete('reservas/destroy', 'ReservasController@massDestroy')->name('reservas.massDestroy');
    Route::resource('reservas', 'ReservasController');

    // Detalle De Reserva
    Route::delete('detalle-de-reservas/destroy', 'DetalleDeReservaController@massDestroy')->name('detalle-de-reservas.massDestroy');
    Route::resource('detalle-de-reservas', 'DetalleDeReservaController');

    // Pagos
    Route::delete('pagos/destroy', 'PagosController@massDestroy')->name('pagos.massDestroy');
    Route::resource('pagos', 'PagosController');

    // Enlaces
    Route::delete('enlaces/destroy', 'EnlacesController@massDestroy')->name('enlaces.massDestroy');
    Route::resource('enlaces', 'EnlacesController');

    // Bloques Pagina
    Route::delete('bloques-paginas/destroy', 'BloquesPaginaController@massDestroy')->name('bloques-paginas.massDestroy');
    Route::post('bloques-paginas/media', 'BloquesPaginaController@storeMedia')->name('bloques-paginas.storeMedia');
    Route::post('bloques-paginas/ckmedia', 'BloquesPaginaController@storeCKEditorImages')->name('bloques-paginas.storeCKEditorImages');
    Route::resource('bloques-paginas', 'BloquesPaginaController');

    // Admin Config
    Route::delete('admin-configs/destroy', 'AdminConfigController@massDestroy')->name('admin-configs.massDestroy');
    Route::resource('admin-configs', 'AdminConfigController');

    // Banners
    Route::delete('banners/destroy', 'BannersController@massDestroy')->name('banners.massDestroy');
    Route::post('banners/media', 'BannersController@storeMedia')->name('banners.storeMedia');
    Route::post('banners/ckmedia', 'BannersController@storeCKEditorImages')->name('banners.storeCKEditorImages');
    Route::resource('banners', 'BannersController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});*/
