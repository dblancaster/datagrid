<?php

namespace Grid\Model;

class Config
{

    /** @var string */
    public $label;

    /** @var ConfigQuery */
    public $query;

    /** @var ConfigColumn[] */
    public $columns = [];

}
