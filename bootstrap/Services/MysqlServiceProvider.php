<?php

namespace Bootstrap\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class MysqlServiceProvider implements Service
{
	private $capsule;

	public function __construct()
	{
		$this->capsule = new Capsule;

		$this->capsule->addConnection([
			'driver' => 'mysql',
			'host' => getenv('MYSQL_HOST'),
			'database' => getenv('MYSQL_DATABASE'),
			'username' => getenv('MYSQL_USER'),
			'password' => getenv('MYSQL_PASS')
		]);
	}

	public function boot()
	{
		$this->capsule->setAsGlobal();
		$this->capsule->bootEloquent();
	}
}
