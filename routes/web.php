<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;



Route::get('admin', [AuthController::class, 'login_admin']);
Route::post('admin', [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthController::class, 'logout_admin']);

Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    /*Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });*/


    Route::get('admin/admin/list', function () {
        $data['header_title'] = "Admin";
        return view('admin.admin.list', $data);
    });

});


Route::get('/', function () {
    return view('welcome');
});
