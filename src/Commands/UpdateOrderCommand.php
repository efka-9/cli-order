<?php

namespace App\Commands;

use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

use App\Models\OrderModel;
use App\Repositories\OrderRepository;

class UpdateOrderCommand extends Command
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
            ->setName('order:update')
            ->setDescription('Update order command');
    }

    /**
     * @param InputInterface $input 
     * @param OutputInterface $output 
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        while (true) {
            $this->orderRepository->list(new SymfonyStyle($input, $output));

            $id = $this->selectOrderToUpdate($input, $output);

            $oderToUpdate = OrderModel::find($id);

            if (! $oderToUpdate) {
                $output->write("Order with id {$id} could not by find.");
                continue;
            }

            $oderToUpdate->update($this->collectUpdateData($input, $output));
        }
    }

    /**
     * @param InputInterface $input 
     * @param OutputInterface $output 
     */
    private function selectOrderToUpdate(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $question = new Question('Please enter the id of order to update: ');
        return $helper->ask($input, $output, $question);
    }

    /**
     * @param InputInterface $input 
     * @param OutputInterface $output 
     */
    private function collectUpdateData(InputInterface $input, OutputInterface $output) : array
    {
        $orderUpdateData = [];
        $helper = $this->getHelper('question');

        $question = new Question('Please enter the email of receiver (Leave blank to take no effect): ');
        $orderUpdateData['email'] = $helper->ask($input, $output, $question);

        $question = new Question('Please enter the meal (Leave blank to take no effect): ');
        $orderUpdateData['meal'] = $helper->ask($input, $output, $question);

        $question = new Question('Please enter the comment (Leave blank to take no effect): ');
        $orderUpdateData['comment'] = $helper->ask($input, $output, $question);

        //unset empty values for update
        foreach ($orderUpdateData as $key => $column) {
            if (! $column) {
                unset($orderUpdateData[$key]);
            }
        }

        return $orderUpdateData;
    }
}