<?php

namespace Grid\Controller;

use Exception;
use Grid\Model\Column\ConfigColumn;
use Grid\Model\Column\ConfigColumnFilter;
use Grid\Model\Config;
use Grid\Model\Query\ConfigQuery;
use Grid\Model\Query\ConfigQueryFrom;
use Grid\Model\Query\ConfigQueryJoin;
use Grid\Model\Query\ConfigQueryWhere;


class ConfigController
{

    /**
     * @throws Exception
     */
    public function compileFromArray(array $configArray): Config
    {
        $config = new Config();
        $this->compileQuery($config, $configArray["query"]);
        $this->compileColumns($config, $configArray["columns"]);
        $this->validate($config);
        return $config;
    }

    /**
     * @throws Exception
     */
    public function validate(Config $config) {
        $errors = [];
        foreach ($config->columns as $column) {
            if (!in_array($column->type, ConfigColumn::ALLOWED_TYPES, true)) {
                $errors[] = "Invalid type value $column->type for $column->id";
            }
            if (!in_array($column->sort, ConfigColumn::ALLOWED_SORT, true)) {
                $errors[] = "Invalid sort value $column->sort for $column->id";
            }

        }
        if ($errors) {
            throw new Exception(implode("\n", $errors));
        }
    }

    public function compileColumns(Config $config, array $columns)
    {
        foreach ($columns as $column) {
            $configColumn = new ConfigColumn();
            $configColumn->id = $column["id"];
            $configColumn->type = $column["type"];
            $configColumn->label = $column["label"] ?? null;
            $configColumn->sortable = (bool)$column["sortable"] ?? false;
            $configColumn->enabled = (bool)$column["enabled"] ?? true;
            $configColumn->visible = (bool)$column["visible"] ?? true;

            if (isset($column["filter"])) {
                $configColumn->filter = new ConfigColumnFilter();
                $configColumn->filter->visible = (bool)$column["filter"] ?? false;
            }

            $config->columns[] = $configColumn;
        }
    }

    public function compileQuery(Config $config, array $query)
    {
        $config->query = $configQuery = new ConfigQuery();

        $configQuery->select = $query["select"];

        $configQueryFrom = new ConfigQueryFrom();
        $configQueryFrom->table = $query["from"]["table"];
        $configQueryFrom->alias = $query["from"]["alias"];
        $configQuery->from = $configQueryFrom;

        if (isset($query["join"])) {
            foreach ($query["join"] as $join) {
                $configJoin = new ConfigQueryJoin();
                $configJoin->table = $join["table"];
                $configJoin->alias = $join["alias"];
                $configJoin->leftJoin = $join["leftJoin"];
                $configJoin->rightJoin = $join["rightJoin"];
                $configQuery->join[] = $configJoin;
            }
        }

        if (isset($query["where"])) {
            foreach ($query["where"] as $where) {
                $configWhere = new ConfigQueryWhere();
                $configWhere->whereAnd = $where["whereAnd"] ?? null;
                $configQuery->where[] = $configWhere;
            }
        }
    }

}
