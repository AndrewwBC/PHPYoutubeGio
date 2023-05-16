<?php

declare(strict_types=1);

function formatDollarAmount(string $amount): string {

    if($amount > 0) {
        return '$'.$amount;
    } else {
        $amount = str_replace('-', '', $amount);
        return '-'.'$'.$amount;
    }
}

function getDateFormat(string $date): string {
    
    $date = date('M j, Y', strtotime($date));

    return $date;
}
