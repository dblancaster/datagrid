<?php

namespace Grid\Model;

class ConfigColumn
{

    const ALLOWED_TYPES = ['string', 'integer', 'decimal', 'boolean', 'currency', 'date', 'datetime', 'percent'];
    const ALLOWED_SORT = [null, 'asc', 'desc'];

    /** @var string should match the column name coming back from the database */
    public $id;

    /** @var string label used for UI */
    public $label;

    /** @var string */
    public $type;

    /** @var boolean if true this column can be clicked to be sorted in the UI */
    public $sortable;

    /** @var string 'asc' or 'desc' */
    public $sort;

    /** @var integer order of column from left to right */
    public $order;

    /** @var ConfigColumnFilter the filter available for this column */
    public $filter;

    /** @var boolean visible on UI */
    public $visible;

    /** @var boolean available to add to UI, you may want this set to false in order to add a filter */
    public $enabled;

}
