<?php

require 'bootstrap/Application.php';

use Symfony\Component\Console\Application;

use App\Commands\MigrateCommand;
use App\Commands\ListOrderCommand;
use App\Commands\CreateOrderCommand;
use App\Commands\DeleteOrderCommand;
use App\Commands\UpdateOrderCommand;

$application = new Application();

$application->add(new CreateOrderCommand());
$application->add(new MigrateCommand());
$application->add(new ListOrderCommand());
$application->add(new DeleteOrderCommand());
$application->add(new UpdateOrderCommand());

$application->run();

