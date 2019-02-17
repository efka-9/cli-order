<?php

namespace App\Repositories;

use Symfony\Component\Console\Style\SymfonyStyle;

use App\Models\OrderModel;

class OrderRepository
{
    /**
     * @param SymfonyStyle $symfonyStyle 
     */
    public function list(SymfonyStyle $symfonyStyle) : void
    {
        $tableContent = [];

        foreach (OrderModel::all() as $order) {
            $tableContent[] = [
                $order->id, $order->email, $order->meal, $order->comment
            ];
        }

        $symfonyStyle->table(
            ['Id', 'Email', 'Meal', 'Comment'],
            $tableContent
        );
    }
}