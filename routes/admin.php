<?php
/**
 * Created by PhpStorm.
 * User: hxsd
 * Date: 2018/3/1
 * Time: 14:05
 */
Route::group(['prefix'=>'admin'],function (){

    //用户模块
    Route::get('user/create','admin\AdminUserController@create');
    Route::post('user/store','admin\AdminUserController@store');
    Route::get('user/index','admin\AdminUserController@index');
    Route::get('user/edit/{user}','admin\AdminUserController@edit');
    Route::post('user/update','admin\AdminUserController@update');
    Route::get('user/delete/{id}','admin\AdminUserController@delete');

    //分类模块
    Route::get('category/create','admin\CategoryController@create');
    Route::post('category/store','admin\CategoryController@store');
    Route::get('category/index','admin\CategoryController@index');
    Route::get('category/edit/{category}','admin\CategoryController@edit');
    Route::post('category/update','admin\CategoryController@update');
    Route::get('category/delete/{id}','admin\CategoryController@delete');

    //商品模块
    Route::get('good/create','admin\GoodController@create');
    Route::post('good/store','admin\GoodController@store');
    Route::get('good/index','admin\GoodController@index');
    Route::get('good/edit/{good}','admin\GoodController@edit');
    Route::post('good/update','admin\GoodController@update');
    Route::get('good/delete/{id}','admin\GoodController@delete');

    // 角色管理
    Route::get('role/index', 'admin\RoleController@index');
    Route::get('role/create', 'admin\RoleController@create');
    Route::post('role/store', "admin\RoleController@store");
    Route::get('role/{role}/permission', 'admin\RoleController@permission');
    Route::post('role/{role}/permission', 'admin\RoleController@storePermission');

    // 权限管理
    Route::get('permission/index', 'admin\PermissionController@index');
    Route::get('permission/create', 'admin\PermissionController@create');
    Route::post('permission/store', "admin\PermissionController@store");

});