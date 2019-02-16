<?php

// src/Command/CreateUserCommand.php
namespace App\Commands;

use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

use App\Models\OrderModel;
use App\Repositories\OrderRepository;

class DeleteOrderCommand extends Command
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository;
        
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('order:delete')
            ->setDescription('List of orders');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        while (true) {
            $this->orderRepository->list(new SymfonyStyle($input, $output));

            $question = new Question('Please enter the id of order to delete: ');
            $idToDelete = $helper->ask($input, $output, $question);

            OrderModel::destroy($idToDelete);

            $output->writeln([
                '============',
                'The order has been deleted.',
            ]);
        }
    }
}