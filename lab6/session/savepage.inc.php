<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1
- Создайте в сессии либо 
	- массив для хранения всех посещенных страниц и сохраните в качестве его очередного элемента путь к текущей странице. 
	- строку с уникальным разделителем и последовательно её дополняйте
*/

if (!isset($_SESSION['visited_pages'])) {
	$_SESSION['visited_pages'] = [];
}
$currentPage = $_SERVER['REQUEST_URI'];

$_SESSION['visited_pages'][] = $currentPage;
?>