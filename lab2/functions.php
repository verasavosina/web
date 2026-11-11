<?php
declare(strict_types=1);

/**
 * Анонимная функция, которая меняет местами аргументы, переданные по ссылке.
 * 
 * @param mixed &$a Первая переменная
 * @param mixed &$b Вторая переменная
 * @return void
 */
$swap = function (&$a, &$b): void {
	$temp = $a;
	$a = $b;
	$b = $temp;
};

$a = 5;
$b = 8;
$swap($a, $b);
echo "a = $a, b = $b<br>"; // a = 8, b = 5

/**
 * Применяет коллбэк к каждому элементу массива.
 * 
 * @param array $arr Исходный массив
 * @param callable $callback Функция обратного вызова
 * @return array Измененный массив
 */
function map(array $arr, callable $callback): array
{
	$result = [];
	foreach ($arr as $item) {
		$result[] = $callback($item);
	}
	return $result;
}

$numbers = [1, 2, 3, 4, 5];
$squared = map($numbers, fn($n) => $n ** 2);
echo "Квадраты чисел: " . implode(', ', $squared) . "<br>";
?>