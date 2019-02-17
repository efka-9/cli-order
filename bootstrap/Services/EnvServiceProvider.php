<?php

namespace Bootstrap\Services;

use Dotenv\Dotenv;

class EnvServiceProvider implements Service
{
	public function boot() : void
	{
		$dotenv = Dotenv::create(__DIR__. '/../../');
		$dotenv->load();
	}
}


