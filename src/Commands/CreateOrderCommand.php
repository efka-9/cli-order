<?php

// src/Command/CreateUserCommand.php
namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

use App\Models\OrderModel;

class CreateOrderCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('order:create')
            ->setDescription('Create the new order.');
    }

    /**
     * @param InputInterface $input 
     * @param OutputInterface $output 
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        while (true) {
            $order = [];

            $helper = $this->getHelper('question');

            $question = new Question('Please enter the email of receiver: ');
            $order['email'] = $helper->ask($input, $output, $question);

            $question = new Question('Please enter the meal: ');
            $order['meal'] = $helper->ask($input, $output, $question);

            $question = new Question('Please enter the comment: ');
            $order['comment'] = $helper->ask($input, $output, $question);

            OrderModel::create($order);

            $output->writeln([
                '============',
                'Thanks. The order has been created.',
            ]);
        }
    }
}