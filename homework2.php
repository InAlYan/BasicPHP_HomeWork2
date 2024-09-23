<?php

// Задание 1
// Реализовать основные 4 арифметические операции в виде функции с двумя параметрами – два параметра это числа. Обязательно использовать оператор return.

function add($x, $y) {
    return $x + $y;
}

echo 'Задание 1'.PHP_EOL;

echo 'Сложение'.PHP_EOL;
echo add(1,2).PHP_EOL;
echo add(2,3).PHP_EOL;
echo add(3,5).PHP_EOL;
echo add(5,8).PHP_EOL;

function subtruct($x, $y) {
    return $x - $y;
}

echo 'Вычитание'.PHP_EOL;
echo subtruct(2,1).PHP_EOL;
echo subtruct(3,2).PHP_EOL;
echo subtruct(5,3).PHP_EOL;
echo subtruct(8,5).PHP_EOL;

function multiply($x, $y) {
    return $x * $y;
}

echo 'Умножение'.PHP_EOL;
echo multiply(2,1).PHP_EOL;
echo multiply(3,2).PHP_EOL;
echo multiply(5,3).PHP_EOL;
echo multiply(8,5).PHP_EOL;

function divide($x, $y) {
    return $x / $y;
}

echo 'Деление'.PHP_EOL;
echo divide(2,1).PHP_EOL;
echo divide(3,2).PHP_EOL;
echo divide(5,3).PHP_EOL;
echo divide(8,5).PHP_EOL;

// Задание 2
// Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),где
//     $arg1, $arg2 – значения аргументов,
//     $operation – строка с названием операции
//     1. 'add' - сложение;
//     2. 'sub' - вычитание;
//     3. 'mul' - умножение;
//     4. 'div' - деление;
// В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'add':
            return add($arg1, $arg2);
            // break;
        case 'sub':
            return subtruct($arg1, $arg2);
            // break;
        case 'mul':
            return multiply($arg1, $arg2);
            // break;
        case 'div':
            return divide($arg1, $arg2) ;
            // break;
    }
}

echo 'Задание 2'.PHP_EOL;

echo 'Сложение: '.mathOperation(1, 2, 'add').PHP_EOL;
echo 'Вычитание: '.mathOperation(2, 3, 'sub').PHP_EOL;
echo 'Умножение: '.mathOperation(3, 5, 'mul').PHP_EOL;
echo 'Деление: '.mathOperation(8, 5, 'div').PHP_EOL;

// Задание 3.
// Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким: Московская область: Москва, Зеленоград, Клин Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … (названия городов можно найти на maps.yandex.ru).

$regions =  [
            'Московская область' => [
                'Москва', 
                'Зеленоград', 
                'Клин'
            ],
            'Ленинградская область' => [
                'Санкт-Петербург', 
                'Всеволожск', 
                'Павловск', 
                'Кронштадт'
            ],
            'Рязанская область' => [
                'Рязань', 
                'Касимов', 
                'Скопин', 
                'Ряжск', 
                'Сасово'
            ]
            ];

echo 'Задание 3'.PHP_EOL;
foreach ($regions as $region => $cities) {
    echo $region.": ";
    foreach ($cities as $cityIndex => $cityName) {
        $stringToPrint = ($cityIndex === count($cities) - 1) ? $cityName.PHP_EOL : $cityName.', ';
        echo $stringToPrint;
    }
}

// Задание 4.
// Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).Написать функцию транслитерации строк.

$translitAlphabet = ['а' => 'a', 'б' => 'b', 'в' => 'v',
                     'г' => 'g', 'д' => 'd', 'е' => 'e', 
                     'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 
                     'и' => 'i', 'й' => 'y', 'к' => 'k', 
                     'л' => 'l', 'м' => 'm', 'н' => 'n', 
                     'о' => 'o', 'п' => 'p', 'р' => 'r', 
                     'с' => 's', 'т' => 't', 'у' => 'u', 
                     'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 
                     'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 
                     'ъ' => '', 'ы' => 'y', 'ь' => '', 
                     'э' => 'e', 'ю' => 'yu', 'я' => 'ya'];


function translit(string $inString, array $transAlBet): string {
    $outString = '';
    for ($i=0; $i<strlen($inString); $i++) { 
        $curSymb = mb_substr($inString, $i, 1);
        if (array_key_exists(mb_strtolower($curSymb), $transAlBet)) {
            if (mb_strtolower($curSymb) !== $curSymb) {
                $transLitSymbol = $transAlBet[mb_strtolower($curSymb)]; // Может быть несколько англ символов, например на букву Щ - shch
                $outString = $outString . mb_strtoupper(mb_substr($transLitSymbol, 0, 1)) . mb_substr($transLitSymbol, 1);
            } else {
                $outString = $outString . $transAlBet[$curSymb];
            }
        } else {
            $outString = $outString . $curSymb;
        }
    }
    return $outString;
};

echo 'Задание 4'.PHP_EOL;
$textToTranslit = 'HeLLo eVeRyOnE!!! Счастливая Юляша шила Плащ и не дошила... Щебет птиц помогал ей.';
echo $textToTranslit.PHP_EOL;
echo translit($textToTranslit, $translitAlphabet).PHP_EOL;

// Задание 5.
//     С помощью рекурсии организовать функцию возведения числа в степень.
//     Формат:
//         function power($val, $pow), где
//         $val – заданное число,
//         $pow – степень.

function power($val, $pow) {
    if ($pow === 1) return $val;
    return $val * power($val, $pow - 1);
}

echo 'Задание 5'.PHP_EOL;
$val1 = 2;
$pow1 = 3;
echo $val1." в степени ".$pow1." равно ".power($val1, $pow1).PHP_EOL;
$val1 = 3;
$pow1 = 2;
echo $val1." в степени ".$pow1." равно ".power($val1, $pow1).PHP_EOL;
$val1 = 3;
$pow1 = 4;
echo $val1." в степени ".$pow1." равно ".power($val1, $pow1).PHP_EOL;
$val1 = 1;
$pow1 = 1;
echo $val1." в степени ".$pow1." равно ".power($val1, $pow1).PHP_EOL;


// Задание 6.
//     Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
//         22 часа 15 минут
//         21 час 43 минуты

// 1 час    |   11 часов  |  21 час
// 2 часа   |   12 часов  |  22 часа
// 3 часа   |   13 часов  |  23 часа
// 4 часа   |   14 часов  |  24 часа
// ----------             ----------
// 5 часов      15 часов
// 6 часов      16 часов
// 7 часов      17 часов
// 8 часов      18 часов
// 9 часов      19 часов
// 10 часов     20 часов

// 1 минута  |  11 минут  |  21 минута   31 минута   41 минута   51 минута
//------------            ------------------------------------------------
// 2 минуты  |  12 минут  |  22 минуты   32 минуты   42 минуты   52 минуты
// 3 минуты  |  13 минут  |  23 минуты   33 минуты   43 минуты   53 минуты
// 4 минуты  |  14 минут  |  24 минуты   34 минуты   44 минуты   54 минуты
//------------            ------------------------------------------------
// 5 минут      15 минут     25 минут    35 минут    45 минут    55 минут
// 6 минут      16 минут     26 минут    36 минут    46 минут    56 минут
// 7 минут      17 минут     27 минут    37 минут    47 минут    57 минут
// 8 минут      18 минут     28 минут    38 минут    48 минут    58 минут
// 9 минут      19 минут     29 минут    39 минут    49 минут    59 минут
// 10 минут     20 минут     30 минут    40 минут    50 минут    60 минут

echo 'Задание 6'.PHP_EOL;

function time_in_words($curTime) {
    $timeString = date("H:i:s", $curTime);
    $timeParts = explode(":", $timeString);

    if ($timeParts[0] >= 5 && $timeParts[0] <= 20) {
        $hours = "часов";
    } else {
        if ($timeParts[0] % 10 === 1) {
            $hours = "час";
        } else {
            $hours = "часа";
        }
    };

    if (($timeParts[1] >= 5 && $timeParts[1] <= 20) || ($timeParts[1] % 10 >= 5 && $timeParts[1] % 10 <= 9) || $timeParts[1] % 10 === 0) {
        $minutes = "минут";
    } else {
        if ($timeParts[1] % 10 === 1) {
            $minutes = "минута";
        } else {
            $minutes = "минуты";
        }
    };

    return $timeParts[0]." ".$hours." ".$timeParts[1]." ".$minutes.PHP_EOL;
}

echo time_in_words(time());

// docker run --rm -v ${pwd}/:/cli php:8.2-cli php /cli/homework2.php
