<?php 

// Juncao de tudo

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;
/* literalmente o caminho */
define('APP_PATH', $root . 'App' . DIRECTORY_SEPARATOR );
define('VIEW_PATH', $root .  'views' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'Transactions' . DIRECTORY_SEPARATOR);

require FILES_PATH . 'index.csv';
require APP_PATH . 'App.php';

$files = getTransactionFiles(FILES_PATH);
$transactions = [];

foreach($files as $file){
    $transactions = array_merge($transactions, getTransactions($file, 'extractTransaction'));
}

$totals = calculateTotals($transactions);
require APP_PATH . 'helpers.php';
require VIEW_PATH . 'views.php';

