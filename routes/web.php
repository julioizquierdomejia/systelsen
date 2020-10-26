<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('clients')->name('clients/')->group(static function() {
            Route::get('/',                                             'ClientsController@index')->name('index');
            Route::get('/create',                                       'ClientsController@create')->name('create');
            Route::post('/',                                            'ClientsController@store')->name('store');
            Route::get('/{client}/edit',                                'ClientsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ClientsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{client}',                                    'ClientsController@update')->name('update');
            Route::delete('/{client}',                                  'ClientsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('m-models')->name('m-models/')->group(static function() {
            Route::get('/',                                             'MModelsController@index')->name('index');
            Route::get('/create',                                       'MModelsController@create')->name('create');
            Route::post('/',                                            'MModelsController@store')->name('store');
            Route::get('/{mModel}/edit',                                'MModelsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MModelsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{mModel}',                                    'MModelsController@update')->name('update');
            Route::delete('/{mModel}',                                  'MModelsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('m-brands')->name('m-brands/')->group(static function() {
            Route::get('/',                                             'MBrandsController@index')->name('index');
            Route::get('/create',                                       'MBrandsController@create')->name('create');
            Route::post('/',                                            'MBrandsController@store')->name('store');
            Route::get('/{mBrand}/edit',                                'MBrandsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MBrandsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{mBrand}',                                    'MBrandsController@update')->name('update');
            Route::delete('/{mBrand}',                                  'MBrandsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('motors')->name('motors/')->group(static function() {
            Route::get('/',                                             'MotorsController@index')->name('index');
            Route::get('/create',                                       'MotorsController@create')->name('create');
            Route::post('/',                                            'MotorsController@store')->name('store');
            Route::get('/{motor}/edit',                                 'MotorsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MotorsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{motor}',                                     'MotorsController@update')->name('update');
            Route::delete('/{motor}',                                   'MotorsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('statuses')->name('statuses/')->group(static function() {
            Route::get('/',                                             'StatusController@index')->name('index');
            Route::get('/create',                                       'StatusController@create')->name('create');
            Route::post('/',                                            'StatusController@store')->name('store');
            Route::get('/{status}/edit',                                'StatusController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StatusController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{status}',                                    'StatusController@update')->name('update');
            Route::delete('/{status}',                                  'StatusController@destroy')->name('destroy');
        });
    });
});