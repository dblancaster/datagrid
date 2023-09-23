<?php

namespace Grid\Model;

use Grid\Model\Column\ConfigColumn;
use Grid\Model\Query\ConfigQuery;

class Config
{

    /** @var string */
    public $label;

    /** @var ConfigQuery */
    public $query;

    /** @var ConfigColumn[] */
    public $columns = [];

}
