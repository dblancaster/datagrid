<?php

namespace Grid\Model\Column;

class ConfigColumn
{

    const ALLOWED_TYPES = ['string', 'integer', 'decimal', 'boolean', 'currency', 'date', 'datetime', 'percent'];
    const ALLOWED_SORT = ['', 'asc', 'desc'];

    /** @var string should match the column name coming back from the database */
    public $id;

    /** @var string label used for UI */
    public $label;

    /** @var string */
    public $type;

    /** @var boolean if true this column can be clicked to be sorted in the UI */
    public $sortable;

    /** @var string '', 'asc' or 'desc' */
    public $sort;

    /** @var integer order of column from left to right */
    public $order;

    /** @var ConfigColumnFilter the filter available for this column */
    public $filter;

    /** @var boolean visible on UI */
    public $visible;

    /** @var boolean available to add to UI */
    public $enabled;

    public function validate()
    {
        if (!in_array($this->type, self::ALLOWED_TYPES, true)) {
            throw new \InvalidArgumentException("Invalid status value {$this->type}");
        }
        if (!in_array($this->sort, self::ALLOWED_SORT, true)) {
            throw new \InvalidArgumentException("Invalid status value {$this->type}");
        }
    }

}
