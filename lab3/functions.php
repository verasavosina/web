<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Загруженные модули и функции</title>
</head>
<body>
	<h1>Список функций по модулям</h1>
	<?php
	$totalFunctions = 0;
	$extensions = get_loaded_extensions();
	
	foreach ($extensions as $ext) {
		echo "<h2>Модуль: " . htmlspecialchars($ext) . "</h2>";
		$functions = get_extension_funcs($ext);
		
		if ($functions) {
			echo "<ul>";
			foreach ($functions as $func) {
				echo "<li>" . htmlspecialchars($func) . "</li>";
				$totalFunctions++;
			}
			echo "</ul>";
		} else {
			echo "<p>Нет доступных функций (или они встроены в ядро).</p>";
		}
	}
	
	echo "<h3>Общее количество функций: $totalFunctions</h3>";
	?>
</body>
</html>