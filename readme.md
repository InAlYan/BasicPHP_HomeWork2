### Задание 1.
    Реализовать основные 4 арифметические операции в виде функции с двумя параметрами – два параметра это числа. Обязательно использовать оператор return.

**Решение:**
---

```
function add($x, $y) {
    return $x + $y;
}

function subtruct($x, $y) {
    return $x - $y;
}

function multiply($x, $y) {
    return $x * $y;
}

function divde($x, $y) {
    return $x / $y;
}
```

### Задание 2.
    Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),где
        $arg1, $arg2 – значения аргументов,
        $operation – строка с названием операции
        1. 'add' - сложение;
        2. 'sub' - вычитание;
        3. 'mul' - умножение;
        4. 'div' - деление;
    В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

**Решение:**
---

```
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
```

### Задание 3.
Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким: Московская область: Москва, Зеленоград, Клин Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … (названия городов можно найти на maps.yandex.ru).

**Решение:**
---

```
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

foreach ($regions as $region => $cities) {
    echo $region.": ";
    foreach ($cities as $cityIndex => $cityName) {
        $stringToPrint = ($cityIndex === count($cities) - 1) ? $cityName.PHP_EOL : $cityName.', ';
        echo $stringToPrint;
    }
}


```

### Задание 4.
    Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).Написать функцию транслитерации строк.

**Решение:**
---

```
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
```

### Задание 5.
    С помощью рекурсии организовать функцию возведения числа в степень.
    Формат:
        function power($val, $pow), где
        $val – заданное число,
        $pow – степень.

**Решение:**
---

```
function power($val, $pow) {
    if ($pow === 1) return $val;
    return $val * power($val, $pow - 1);
}
```


#### Задание 6.
    Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
        22 часа 15 минут
        21 час 43 минуты

**Решение:**
---

```
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
```
