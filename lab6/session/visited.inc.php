<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 2
- В случае сохранения данных 
	- в массив, проверьте, существует ли он в сессии
	- в строку, преобразуйте её в массив
- Выводите в цикле список всех посещённых пользователем страниц
*/

echo "<h3>Список посещённых страниц</h3>";

if (isset($_SESSION['visited_pages']) && is_array($_SESSION['visited_pages'])) {
	echo "<ol>";
	foreach ($_SESSION['visited_pages'] as $page) {
		echo "<li>" . htmlspecialchars($page) . "</li>";
	}
	echo "</ol>";
} else {
	echo "<p>Вы еще не посетили ни одной страницы.</p>";
}
?>