<?php

namespace Grid\Model\Query;

/**
 * @property string[] $select
 * @property ConfigQueryFrom $from
 * @property ConfigQueryJoin[] $join
 */
class ConfigQuery
{

    /** @var string[] */
    public $select;

    /** @var ConfigQueryFrom */
    public $from;

    /** @var ConfigQueryJoin[] */
    public $join;

    /** @var ConfigQueryWhere[] */
    public $where;

}
