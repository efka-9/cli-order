<?php

require __DIR__ . '/../vendor/autoload.php';

use Bootstrap\Services\Service;
use Bootstrap\Services\EnvServiceProvider;
use Bootstrap\Services\MysqlServiceProvider;

class Application
{
	/**
	 * @param Service $service 
	 */
	public function register(Service $service) : void
	{
		$service->boot();
	}
}

$app = new Application();

$app->register(new EnvServiceProvider);
$app->register(new MysqlServiceProvider);

return $app;
