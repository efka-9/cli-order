<?php

namespace App\Commands;

use Exception;
use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('migrate')
            ->setDescription('Table migration');
    }

    /**
     * @param InputInterface $input 
     * @param OutputInterface $output 
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            Capsule::schema()->create('orders', function ($table) {
                $table->increments('id');
                $table->string('email');
                $table->string('meal');
                $table->text('comment');
                $table->timestamps();
            });
        } catch (Exception $e) {
            $output->write('Table is already created!');
        }
    }
}