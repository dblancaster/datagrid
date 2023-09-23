<?php

/**
 * @property string[] $select
 * @property GridConfigFrom $from
 * @property GridConfigJoin[] $join
 */
class GridConfigQuery
{

    public $select;
    public $from;
    public $join;

}

/**
 * @property string $table
 * @property string $alias
 */
class GridConfigQueryFrom
{

    public $table;
    public $alias;

}

/**
 * @property string $table
 * @property string $alias
 * @property string $leftJoin
 * @property string $rightJoin
 */
class GridConfigQueryJoin
{

    public $table;
    public $alias;
    public $leftJoin;
    public $rightJoin;

}

/**
 * @property string[] $whereAnd
 */
class GridConfigQueryWhere
{

    public $whereAnd;

}
