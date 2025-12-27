<?php
function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    }
    if ($pow < 0) {
        return 1 / power($val, -$pow);
    }
    return $val * power($val, $pow - 1);
}

function getCurrentTime() {
    $hours = date('G');
    $minutes = date('i');
    
    $hoursWord = declension($hours, 'час', 'часа', 'часов');
    $minutesWord = declension($minutes, 'минута', 'минуты', 'минут');
    
    return "$hours $hoursWord $minutes $minutesWord";
}

function declension($number, $one, $two, $five) {
    $number = abs($number) % 100;
    $n1 = $number % 10;
    if ($number > 10 && $number < 20) {
        return $five;
    }
    if ($n1 > 1 && $n1 < 5) {
        return $two;
    }
    if ($n1 == 1) {
        return $one;
    }
    return $five;
}

function printNumbersDoWhile() {
    $i = 0;
    $result = '';
    do {
        if ($i == 0) {
            $result .= "$i -- это ноль<br>";
        } elseif ($i % 2 == 0) {
            $result .= "$i -- четное число<br>";
        } else {
            $result .= "$i -- нечетное число<br>";
        }
        $i++;
    } while ($i <= 10);
    return $result;
}

function getTranslitArray() {
    return [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
        'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
        'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
        'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts', 'ч' => 'ch',
        'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D',
        'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh', 'З' => 'Z', 'И' => 'I',
        'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
        'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'Ts', 'Ч' => 'Ch',
        'Ш' => 'Sh', 'Щ' => 'Sch', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '',
        'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya'
    ];
}

function transliterate($string) {
    $translitArray = getTranslitArray();
    $result = '';
    $length = mb_strlen($string);
    for ($i = 0; $i < $length; $i++) {
        $char = mb_substr($string, $i, 1);
        if (isset($translitArray[$char])) {
            $result .= $translitArray[$char];
        } else {
            $result .= $char;
        }
    }
    return $result;
}

function transliterateForUrl($string) {
    $transliterated = transliterate($string);
    return str_replace(' ', '_', $transliterated);
}
?>
