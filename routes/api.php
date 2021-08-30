<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('user', 'UserController@index');
Route::post('user', 'UserController@store');
Route::post('user/checkPermission', 'UserController@checkPermission');

Route::get('role', 'RoleController@index');
Route::post('role', 'RoleController@store');

Route::get('permission', 'PermissionController@index');
Route::post('permission', 'PermissionController@store');

Route::get('roletouser', 'RoleUserController@index');
Route::post('roletouser', 'RoleUserController@store');

Route::get('roletopermission', 'RolePermController@index');
Route::post('roletopermission', 'RolePermController@store');
