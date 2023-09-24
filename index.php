<?php

use Grid\Other\TransactionsGridController;

require 'vendor/autoload.php';

$configController = new TransactionsGridController();
print $configController->getSQL();
