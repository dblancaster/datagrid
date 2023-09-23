<?php

namespace Grid\Model;

use Grid\Model\Column\ConfigColumn;
use Grid\Model\Query\ConfigQuery;

class Config
{

    /** @var ConfigQuery */
    public $source;

    /** @var ConfigColumn[] */
    public $columns = [];

    public function validate()
    {
        foreach ($this->columns as $column) {
            $column->validate();
        }
    }

}
