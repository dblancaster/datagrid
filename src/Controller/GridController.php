<?php

namespace Grid\Controller;

use Grid\Model\Config;

class GridController
{

    protected $config;

    public function __construct(Config $config)
    {
        $this->setConfig($config);
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(Config $config)
    {
        return $this->config = $config;
    }

}