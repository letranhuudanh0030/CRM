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



Route::group(['prefix' => '', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/task/{id}/detail', 'MaintenanceController@detail');
    Route::post('/task/detail/update', 'MaintenanceController@update');
    Route::post('/task/detail/success', 'MaintenanceController@change_success');
    Route::post('/task/upload', 'MaintenanceController@upload');

    Route::get('task/export', 'DashboardController@export');
    Route::get('task/export_pdf', 'DashboardController@export_pdf');

    Route::group(['prefix' => 'devices', 'middleware' => 'auth.admin'], function () {
        Route::get('list', 'DeviceController@index');
        Route::post('store', 'DeviceController@store');
        Route::post('update', 'DeviceController@update');
        Route::post('delete', 'DeviceController@delete');
        Route::post('update_status', 'DeviceController@update_status');
    });
    
    Route::group(['prefix' => 'branch', 'middleware' => 'auth.admin'], function () {
        Route::get('list', 'BranchController@index');
        Route::post('store', 'BranchController@store');
        Route::post('update', 'BranchController@update');
        Route::post('delete', 'BranchController@delete');
        Route::post('update_status', 'BranchController@update_status');
    });

    Route::group(['prefix' => 'device_type', 'middleware' => 'auth.admin'], function () {
        Route::get('list', 'DeviceTypeController@index');
        Route::post('store', 'DeviceTypeController@store');
        Route::post('update', 'DeviceTypeController@update');
        Route::post('delete', 'DeviceTypeController@delete');
        Route::post('update_status', 'DeviceTypeController@update_status');
    });
    
    Route::group(['prefix' => 'permission', 'middleware' => 'auth.admin'], function () {
        Route::get('list', 'PermissionController@index');
        Route::post('store', 'PermissionController@store');
        Route::post('update', 'PermissionController@update');
        Route::post('delete', 'PermissionController@delete');
        Route::post('update_status', 'PermissionController@update_status');
    });
    
    Route::group(['prefix' => 'user', 'middleware' => 'auth.admin'], function () {
        Route::get('list', 'UserController@index');
        Route::post('store', 'UserController@store');
        Route::post('update', 'UserController@update');
        Route::post('delete', 'UserController@delete');
        Route::post('update_status', 'UserController@update_status');
        Route::post('update_password', 'UserController@update_password');
        Route::post('check_email', 'UserController@check_email');
    });
    
    Route::group(['prefix' => 'task'], function () {
        Route::get('list', 'MaintenanceController@index');
        Route::post('store', 'MaintenanceController@store');
        Route::post('update', 'MaintenanceController@update');
        Route::post('delete', 'MaintenanceController@delete');
        Route::post('update_status', 'MaintenanceController@update_status');
        Route::post('upload', 'MaintenanceController@upload');
        Route::get('mail', 'MaintenanceController@sendMail');
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
