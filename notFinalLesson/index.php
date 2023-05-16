<?php

// $paid = 1;
// define('STATUS_'.$paid, $paid);
// match($paid) {
//     1 => print 'Olá',
//     2 => print 'Bom dia',
//     3 => print 'Boa noite',
// };
class Test {
    private $closure;
    public function __construct()
    {
        $this->closure = function () {
        };
    }
    public function __destruct()
    {
        echo "destructed\n";
    }
}

$array = [1,2,3,4];
$newArray = array_map(fn($number) => $number * 10, $array);

/* anonima */
/* use É para usar uma variável fora do escopo, mas sem alterar 
o valor original, pois nao é uma referencia como global keyword */

$insertUser = function (int | string $name, $age, ...$datas) use($array): int | float | string  {
    return $datas;
};

echo dirname(__DIR__) . DIRECTORY_SEPARATOR . 'PHPGIO';

define

// echo date_default_timezone_set('UTC'). '<br/>';

// echo date_default_timezone_get();

// echo "<pre>";
// print_r($newArray);
// echo "</pre>";
// $classe = new Test;
// $classe->__construct();

?>