<?php
declare(strict_types=1);

/**
 * Функция для отрисовки таблицы умножения.
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

/**
 * Функция для отрисовки навигационного меню.
 */
function getMenu(array $menu, bool $vertical = true): void
{
	$class = $vertical ? 'menu' : 'menu horizontal';
	echo "<ul class='" . $class . "'>";
	foreach ($menu as $item) {
		echo "<li><a href='" . $item['href'] . "'>" . $item['link'] . "</a></li>";
	}
	echo "</ul>";
}