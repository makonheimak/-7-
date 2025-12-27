<?php
require_once 'functions.php';

echo "<h2>Задание 9: Транслитерация для URL</h2>";

$testStrings = [
    'Привет мир',
    'Название статьи',
    'Пример заголовка'
];

foreach ($testStrings as $string) {
    echo "$string => " . transliterateForUrl($string) . "<br>";
}
?>
