<?php

declare(strict_types = 1);
echo '<pre>';

if(!file_exists('../transactions/index.csv')){

    mkdir('transactions/index.csv', recursive: true);
    file_put_contents('transactions/index.php', '01/04/2021	7777	Transaction 1	$150.43
    01/05/2021		Transaction 2	$700.25
    01/06/2021		Transaction 3	-$1,303.97
    01/07/2021		Transaction 4	$46.78
    01/08/2021		Transaction 5	$816.87
    01/11/2021	1934	Transaction 6	-$1,002.53
    01/12/2021	7307	Transaction 7	$532.22
    01/13/2021	1352	Transaction 8	-$704.59
    01/14/2021		Transaction 9	$98.04
    01/15/2021		Transaction 10	-$204.56
    01/25/2021		Transaction 11	$1,056.27
    01/26/2021		Transaction 12	$550.10
    01/27/2021		Transaction 13	-$825.77
    01/28/2021	4250	Transaction 14	$212.68
    01/29/2021		Transaction 15	$195.68
    02/02/2021	9915	Transaction 16	-$463.75
    02/03/2021		Transaction 17	$78.02
    02/04/2021		Transaction 18	$268.81
    02/05/2021		Transaction 19	$1,360.55
    02/08/2021		Transaction 20	-$594.46
    02/09/2021	9125	Transaction 21	$467.39
    02/10/2021		Transaction 22	$39.49
    02/11/2021	7929	Transaction 23	-$81.87
    02/12/2021		Transaction 24	$255.64
    02/12/2021		Transaction 25	$13.51');
    
    return;
}
$file = fopen('../transactions/index.csv', 'r');

$allTransactions = [];
while(($line = fgetcsv($file)) !== false) {
    array_push($allTransactions, $line);
}

echo DIRECTORY_SEPARATOR;

$onlyNumbers =  array_map(fn($transaction) => $transaction[3],$allTransactions);

$sumIncome = function($onlyNumbers){

    $onlyPositive = array_map(fn($positive) => 
    substr_compare($positive, '-', 0, 1) ? 
    floatval(substr_replace($positive,'', 0, 1)) : 0, 
    $onlyNumbers);

    $finalSum = array_reduce($onlyPositive, fn($acc, $current) => $acc + $current);
    
    return $finalSum;
};

$sumExpense = function($onlyNumbers){

    $onlyNegative = array_map(fn($negative) => 
    substr_compare($negative, '-$', 0, 1) ? 
    0 : floatval(substr_replace($negative,'', 0, 2)), 
    $onlyNumbers);

    $finalSum = array_reduce($onlyNegative, fn($acc, $current) => $acc + $current);

    return $finalSum;
};

$totalNet = $sumIncome($onlyNumbers) - $sumExpense($onlyNumbers);


require '../views/views.php';
