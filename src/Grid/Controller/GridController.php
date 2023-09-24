<?php

namespace Grid\Controller;

use Exception;
use Grid\Model\Config;

abstract class GridController
{

    protected $configController;

    public function __construct()
    {
        $this->configController = new ConfigController();
    }

    abstract public function getGridId(): string;

    abstract public function getConfigArray(): array;

    public function getConfig(): Config
    {
        $config = $this->configController->compileFromArray($this->getConfigArray());
        $this->mergeSavedDataIntoConfig($config, []);
        return $config;
    }

    /**
     * @param $configArray array of Config
     * @param $dataArray array of Config (but with just the saved data values for columns and filters)
     * @return void
     */
    public function mergeSavedDataIntoConfig(Config $config, array $dataArray)
    {
        foreach ($config->columns as $column) {
            foreach ($dataArray["columns"] ?? [] as $columnArray) {
                $column->sort = $columnArray["sort"] ?? null;
                $column->visible = $columnArray["visible"] ?? null;
                $column->label = $columnArray["label"] ?? $column->label;
                $column->order = $columnArray["order"] ?? $column->order;

                $filter = $columnArray["filter"] ?? null;
                if (isset($column->filter) && $filter) {
                    $filter->visible = $filter["visible"] ?? $filter->visible;
                    $filter->data = $filter["data"] ?? null;
                }
            }
        }
    }

    public function getSQL(): string
    {
        return $this->configController->compileSQL($this->getConfig());
    }

}