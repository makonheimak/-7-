<?php
require_once 'functions.php';

echo "<h2>Задание 8: Транслитерация</h2>";

$testStrings = [
    'Привет мир',
    'Это тестовая строка',
    'Москва'
];

foreach ($testStrings as $string) {
    echo "$string => " . transliterate($string) . "<br>";
}
?>
