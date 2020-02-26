<?php

namespace JaopMX\FaqPackage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class FaqServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->registerRoutes();
		$this->registerResources();
		
		$this->publishes([
			__DIR__.'/../config/faq.php' => config_path('faq.php')
		], 'faq_config');

		$this->publishes([
			__DIR__.'/migrations/' => database_path('migrations')
		], 'faq_migrations');
	}

	public function register()
	{
		$this->mergeConfigFrom(
            __DIR__.'/../config/faq.php', 'faq'
		);
	}

	public function registerRoutes()
	{
		Route::group([
			'prefix' => 'faq',
			'middleware' => 'web',
			'namespace' => 'JaopMX\FaqPackage\Controllers'
		], function () {
			$this->loadRoutesFrom(__DIR__ . '/routes.php');
		});

		return $this;
	}

	public function registerResources()
	{
		$this->loadViewsFrom(__DIR__ . '/views', 'FaqPackage');

		return $this;
	}
}