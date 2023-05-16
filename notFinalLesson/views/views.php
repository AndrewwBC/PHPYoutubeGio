<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
                background-color: #d9d9d9;

            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>               
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($allTransactions)): ?>
                    <?php foreach ($allTransactions as $transaction): ?>
                        <tr>
                            <td><?= $transaction[0] ?></td>
                            <td><?= $transaction[1]? $transaction[1] : 'Not informed'?></td>
                            <td><?= $transaction[2] ?></td>
                            <?= '$'. substr_compare($transaction[3], '-', 0, 1) ? 
                            "<td style='color:green'>$transaction[3]</td>" : 
                            "<td style='color:red'>$transaction[3]</td>" 
                            ?>
                        </tr>
                    <?php endforeach?>
                <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td style='color: green'>
                        $<?= $sumIncome($onlyNumbers) ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td  style='color: red'>
                    $<?= $sumExpense($onlyNumbers) ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td>
                    $<?= $totalNet ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>