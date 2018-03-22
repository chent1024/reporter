<?php

namespace Encore\Admin\Reporter;

use Encore\Admin\Admin;
use Illuminate\Support\Facades\Route;

trait BootExtension
{

	public static function boot()
	{
		static::registerRoutes();
		static::importAssets();

//        Admin::extend('reporter', __CLASS__);
	}

	/**
	 * Register routes for laravel-admin.
	 *
	 * @return void
	 */
	protected static function registerRoutes()
	{
		Route::group([
			'prefix' => config('admin.prefix'), 
			'middleware' => ['web', 'admin'],
			], function ($router)
		{
			$router->resource('exceptions', 'Encore\Admin\Reporter\ExceptionController');
		});
	}

	public static function importAssets()
	{
		Admin::js('/packages/laravel-admin-reporter/prism/prism.js');
		Admin::css('/packages/laravel-admin-reporter/prism/prism.css');
	}

}
