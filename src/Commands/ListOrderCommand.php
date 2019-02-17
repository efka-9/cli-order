<?php

// src/Command/CreateUserCommand.php
namespace App\Commands;

use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use App\Repositories\OrderRepository;

class ListOrderCommand extends Command
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
            ->setName('order:list')
            ->setDescription('List of orders');
    }

    /**
     * @param InputInterface $input 
     * @param OutputInterface $output 
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->orderRepository->list(new SymfonyStyle($input, $output));
    }
}