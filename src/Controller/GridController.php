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

    /**
     * @throws Exception
     */
    public function getConfig(): Config
    {
        $config = $this->configController->compileFromArray($this->getConfigArray());
        $configArray = json_decode(json_encode($config), true);
        $this->mergeDataIntoConfig($configArray, []);
        return json_decode($configArray);
    }

    /**
     * @param $configArray array of Config
     * @param $dataArray array of Config (but with just the saved data values for columns and filters)
     * @return void
     */
    public function mergeDataIntoConfig(&$configArray, $dataArray)
    {
        foreach ($dataArray as $key => $data) {
            if (is_array($data)) {
                if (isset($configArray[$key]) && is_array($configArray[$key])) {
                    $this->mergeDataIntoConfig($configArray[$key], $data);
                    continue;
                }
                continue;
            }
            $configArray[$key] = $data;
        }
    }
}