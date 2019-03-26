<?php namespace Neonexxa\BillplzWrapperV3;
use Illuminate\Support\ServiceProvider;
use Neonexxa\BillplzWrapperV3\Billplz;
class BillplzServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$app = $this->app ?: app();
		$appVersion = method_exists($app, 'version') ? $app->version() : $app::VERSION;
		$laravelVersion = substr($appVersion, 0, strpos($appVersion, '.'));
		$isLumen = false;
		// if (strpos(strtolower($laravelVersion), 'lumen') !== false)
		// {
		// 	$isLumen = true;
		// 	$laravelVersion = str_replace('Lumen (', '', $laravelVersion);
		// }
		// if ($laravelVersion == 5)
		// {
			$this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'billplz');
			// if ($isLumen)
			// {
			// 	$this->publishes([
			// 		__DIR__ . '/../config/config.php' => base_path('config/ttwitter.php'),
			// 	]);
			// }
			// else
			// {
				$this->publishes([
					__DIR__.'/../../config/config.php' => config_path('billplz.php'),
				]);
			// }
		// }
		$this->app->singleton(Billplz::class, function () use ($app) {
			return new Billplz($app['config'], $app['session.store']);
		});
	}
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['billplz'];
	}
}