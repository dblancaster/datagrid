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

}
