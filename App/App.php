<?php

// Todas funcoes aqui
declare(strict_types = 1);
function getTransactionFiles(string $dirPath){

    $files = [];
    // simplesmente lendo o caminho até o arquivo 
    // provavelmente foi feito assim para o caso ter mais de um file
    foreach(scandir($dirPath) as $file) {
        // Verifica se o parametro da funcao é de fato um diretorio válido
        if(is_dir($file)) {
            continue;
        }
        $files[] = $dirPath . $file;
    }

    return $files;
}
function getTransactions(string $fileName, ?callable $transactionHandler = null){

    $transactions = [];
    // Abre o arquivo e bota ele numa váriavel legível
    $file = fopen($fileName, 'r');

    // Le linha por linha
    while(($transaction = fgetcsv($file)) !== false){
        if($transactionHandler !== null){
            $transaction = $transactionHandler($transaction);
        }
        $transactions[] = $transaction;
    }
    return $transactions;
}

function extractTransaction(array $transactionRow):array {
    
    // cada indice é renomeado a partir da desestruturação
    [$date, $checkNumber, $description, $amount] = $transactionRow;

    // cada indice é renomeado a partir da desestruturação
    $amount = (float) str_replace(['$', ','], '', $amount);

    return [
        'date'        => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount'      => $amount
    ];
}

function calculateTotals(array $transactionRow): array{

    $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

    foreach($transactionRow as $transaction) {
        $totals['netTotal'] += $transaction['amount'] ;

    if ($transaction['amount'] >= 0){
        $totals['totalIncome'] += $transaction['amount'] ;
    } else {
        $totals['totalExpense'] += $transaction['amount'] ;
    }
  }
  return $totals;
}
