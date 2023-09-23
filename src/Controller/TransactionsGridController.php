<?php

namespace Grid\Controller;

use Exception;
use Grid\Model\Config;

class TransactionsGridController extends GridController
{

    public function getGridId(): string
    {
        return "transactions-grid";
    }

    public function getConfigArray(): array
    {
        return [
            'query' => [
                'select' => [
                    't.id',
                ],
                'from' => [
                    'table' => 'transactions',
                    'alias' => 't',
                ],
            ],
            'columns' => [
                [
                    'id' => 't.id',
                    'label' => 'abc',
                    'type' => 'string',
                    'sortable' => true,
                    'visible' => false,
                    'enabled' => true,
                ],
            ],
        ];
    }

}