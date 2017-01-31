<?php

namespace MPay24Laravel;

use Illuminate\Support\ServiceProvider;
use mPay24\MPAY24;
use mPay24\MPay24Config;

/**
 * Class MPay24LaravelServiceProvider
 *
 * @author     Stefan Polzer <develop@posit.at>
 * @filesource MPay24LaravelServiceProvider.php
 * @license    MIT
 */
class MPay24LaravelServiceProvider extends ServiceProvider
{
	/**
	 * Configuration Variable
	 *
	 * @var MPay24Config
	 */
	protected $mpay24Config;

	public function __construct($app)
	{
		$config = new MPay24Config();

		$config->setMerchantID(env('MPAY24_MERCHANT_ID', 9000));
		$config->setSoapPassword(env('MPAY24_SOAP_PASSWORD', ''));
		$config->useTestSystem(env('MPAY24_TEST_SYSTEM', true));
		$config->setDebug(env('MPAY24_DEBUG', true));

		$config->setProxyHost(env('MPAY24_PROXY_Host', ''));
		$config->setProxyPort(env('MPAY24_PROXY_Port', ''));
		$config->setProxyUser(env('MPAY24_PROXY_User', ''));
		$config->setProxyPass(env('MPAY24_PROXY_Pass', ''));

		$config->setVerifyPeer(env('MPAY24_VERIFY_PEER', true));

		$config->setSPID(env('MPAY24_SPID'), '');
		$config->setFlexLinkPassword(env('MPAY24_FLEX_LINK_PASSWORD', ''));
		$config->useFlexLinkTestSystem(env('MPAY24_FLEX_LINK_TEST_SYSTEM', true));

		$config->setLogPath(env('MPAY24_LOG_PATH', storage_path('logs')));
		$config->setLogFile(env('MPAY24_LOG_FILE', 'mpay24.log'));

		$config->setEnableCurlLog(env('MPAY24_ENABLE_CURL_LOG', false));
		$config->setCurlLogFile(env('MPAY24_CURL_LOG_FILE', 'mpay24_curl.log'));

		$this->mpay24Config = &$config;

		parent::__construct($app);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('mpay24', function ()
		{
			return new MPAY24($this->mpay24Config);
		});

		$this->app->singleton('mpay24config', function ()
		{
			return $this->mpay24Config;
		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['mpay24', 'mpay24config'];
	}
}
