<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Editor;
use App\Http\Middleware\Administrador;

Route::middleware(['auth'])->group(function () {



    Route::get('admin/painel', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);


    /* MaintainProduct */
    Route::get('admin/manter-produto/index', ['as' => 'admin.maintainProduct.index', 'uses' => 'Admin\MaintainProduct@index']);
    Route::get('admin/manter-produto/show/{id}', ['as' => 'admin.maintainProduct.show', 'uses' => 'Admin\OderCOntroller@show']);
    Route::get('admin/manter-produto/create', ['as' => 'admin.maintainProduct.create', 'uses' => 'Admin\MaintainProduct@create']);
    Route::post('admin/manter-produto/store', ['as' => 'admin.odmaintainProducter.store', 'uses' => 'Admin\MaintainProduct@store']);
    Route::get('admin/manter-produto/edit/{id}', ['as' => 'admin.maintainProduct.edit', 'uses' => 'Admin\MaintainProduct@edit']);
    Route::put('admin/manter-produto/update/{id}', ['as' => 'admin.maintainProduct.update', 'uses' => 'Admin\MaintainProduct@update']);
    Route::get('admin/manter-produto/delete/{id}', ['as' => 'admin.maintainProduct.delete', 'uses' => 'Admin\MaintainProduct@destroy']);
    /**end  maintain Product */

    /* Maintain Category */
    Route::get('admin/manter-produtos/index', ['as' => 'admin.maintainCategory.index', 'uses' => 'Admin\MaintainCategory@index']);
    Route::get('admin/manter-produtos/show/{id}', ['as' => 'admin.maintainCategory.show', 'uses' => 'Admin\MaintainCategory@show']);
    Route::get('admin/manter-produtos/create', ['as' => 'admin.maintainCategory.create', 'uses' => 'Admin\MaintainCategory@create']);
    Route::post('admin/manter-produtos/store', ['as' => 'admin.maintainCategory.store', 'uses' => 'Admin\MaintainCategory@store']);
    Route::get('admin/manter-produtos/edit/{id}', ['as' => 'admin.maintainCategory.edit', 'uses' => 'Admin\MaintainCategory@edit']);
    Route::put('admin/manter-produtos/update/{id}', ['as' => 'admin.maintainCategory.update', 'uses' => 'Admin\MaintainCategory@update']);
    Route::get('admin/manter-produtos/delete/{id}', ['as' => 'admin.maintainCategory.delete', 'uses' => 'Admin\MaintainCategory@destroy']);
    /**end  Maintain Category */



    /* keep Brand*/
    Route::get('admin/manter-marcas/index', ['as' => 'admin.keepBrand.index', 'uses' => 'Admin\KeepBrandController@index']);
    Route::get('admin/manter-marcas/show/{id}', ['as' => 'admin.keepBrand.show', 'uses' => 'Admin\KeepBrandController@show']);
    Route::get('admin/manter-marcas/create', ['as' => 'admin.keepBrand.create', 'uses' => 'Admin\KeepBrandController@create']);
    Route::post('admin/manter-marcas/store', ['as' => 'admin.keepBrand.store', 'uses' => 'Admin\KeepBrandController@store']);
    Route::get('admin/manter-marcas/edit/{id}', ['as' => 'admin.keepBrand.edit', 'uses' => 'Admin\KeepBrandController@edit']);
    Route::put('admin/manter-marcas/update/{id}', ['as' => 'admin.keepBrand.update', 'uses' => 'Admin\KeepBrandController@update']);
    Route::get('admin/manter-marcas/delete/{id}', ['as' => 'admin.keepBrand.delete', 'uses' => 'Admin\KeepBrandController@destroy']);
    /**end  keep Brand */





    Route::middleware(['Administrador'])->group(function () {

        /* User */
        Route::get('admin/user/index', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index']);
        Route::get('admin/user/show/{id}', ['as' => 'admin.user.show', 'uses' => 'Admin\UserController@show'])->withoutMiddleware('Administrador');
        Route::get('admin/user/permissoes/{id}', ['as' => 'admin.user.permition', 'uses' => 'Admin\UserController@permition'])->withoutMiddleware('Administrador');
        Route::get('admin/user/activity/{id}', ['as' => 'admin.user.activity', 'uses' => 'Admin\UserController@activity'])->withoutMiddleware('Administrador');
        Route::get('admin/user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit'])->withoutMiddleware('Administrador');
        Route::put('admin/user/update/{id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update'])->withoutMiddleware('Administrador');
        Route::get('admin/user/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@destroy']);
        /* end user */

        //delete permition user
        Route::get('admin/permition/delete/{id}', ['as' => 'admin.permiton.delete', 'uses' => 'Admin\UserPermissionController@destroy']);
    });
});
