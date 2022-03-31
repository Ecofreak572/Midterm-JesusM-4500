<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
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

    // Computers
    Route::delete('computers/destroy', 'ComputersController@massDestroy')->name('computers.massDestroy');
    Route::resource('computers', 'ComputersController');

    // Phones
    Route::delete('phones/destroy', 'PhonesController@massDestroy')->name('phones.massDestroy');
    Route::resource('phones', 'PhonesController');

    // Tablets
    Route::delete('tablets/destroy', 'TabletsController@massDestroy')->name('tablets.massDestroy');
    Route::resource('tablets', 'TabletsController');

    // Laptops
    Route::delete('laptops/destroy', 'LaptopsController@massDestroy')->name('laptops.massDestroy');
    Route::resource('laptops', 'LaptopsController');

    // Item Manufacturer
    Route::delete('item-manufacturers/destroy', 'ItemManufacturerController@massDestroy')->name('item-manufacturers.massDestroy');
    Route::resource('item-manufacturers', 'ItemManufacturerController');

    // Producthistory
    Route::delete('producthistories/destroy', 'ProducthistoryController@massDestroy')->name('producthistories.massDestroy');
    Route::resource('producthistories', 'ProducthistoryController');
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
