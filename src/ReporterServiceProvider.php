<?php

namespace Encore\Admin\Reporter;

use Illuminate\Support\ServiceProvider;

class ReporterServiceProvider extends ServiceProvider
{

	/**
	 * {@inheritdoc}
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__ . '/../views', 'laravel-admin-reporter');

		$this->publishes([__DIR__ . '/../assets' => public_path('packages/laravel-admin-reporter')], 'laravel-admin-reporter');

		Reporter::boot();
	}

}
