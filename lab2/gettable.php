<?php
declare(strict_types=1);

/**
 * Функция для отрисовки таблицы умножения.
 * 
 * @param int $cols Количество столбцов
 * @param int $rows Количество строк
 * @param string $color Цвет фона заголовков
 * @return int Общее количество вызовов функции
 */
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int
{
	static $count = 0;
	$count++;
	
	echo "<table>";
	for ($r = 1; $r <= $rows; $r++) {
		echo "<tr>";
		for ($c = 1; $c <= $cols; $c++) {
			if ($r == 1 || $c == 1) {
				echo "<th style='background-color: $color;'>" . ($r * $c) . "</th>";
			} else {
				echo "<td>" . ($r * $c) . "</td>";
			}
		}
		echo "</tr>";
	}
	echo "</table><br>";
	
	return $count;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table { border: 2px solid black; border-collapse: collapse; }
		th, td { padding: 10px; border: 1px solid black; }
		th { text-align: center; font-weight: bold; }
	</style>
</head>
<body> 
	<h1>Таблица умножения</h1>
	<?php
	/*
	ЗАДАНИЕ 3
	- Отрисуйте таблицу умножения вызывая функцию getTable() с различными параметрами
	- Создайте локальную статическую переменную $count для подсчёта числа вызовов функции getTable()
	- Функция getTable() должна возвращать значение переменной $count
	*/
	/*
	ЗАДАНИЕ 4
	- Измените входящие параметры функции getTable() на параметры по умолчанию
	- Добавьте описание функции getTable() с помощью стандарта PHPDoc https://ru.wikipedia.org/wiki/PHPDoc
	*/
	/*
	ЗАДАНИЕ 5
	- Отрисуйте таблицу умножения вызывая функцию getTable() без параметров
	- Отрисуйте таблицу умножения вызывая функцию getTable() с одним параметром
	- Отрисуйте таблицу умножения вызывая функцию getTable() с двумя параметрами
	- Используя статическую переменную $count выведите общее число вызовов функции getTable()
	*/
	echo "<h3>Вызов с 3 параметрами (5x5, красный):</h3>";
	getTable(5, 5, 'lightcoral');

	echo "<h3>Вызов с 2 параметрами (3x3, желтый по умолчанию):</h3>";
	getTable(3, 3);

	echo "<h3>Вызов с 1 параметром (4x10 по умолчанию):</h3>";
	getTable(4);

	echo "<h3>Вызов без параметров (10x10):</h3>";
	$totalCalls = getTable();

	echo "<p><b>Общее число вызовов функции getTable(): $totalCalls</b></p>";
	?> 
</body>
</html>