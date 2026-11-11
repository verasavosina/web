<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Константы</title>
</head>
<body>
	<h1>Все константы PHP</h1>
	<?php
	$allConstants = get_defined_constants(true);
	
	foreach ($allConstants as $category => $constants) {
		echo "<h2>Категория: " . htmlspecialchars($category) . "</h2>";
		echo "<ul>";
		foreach ($constants as $name => $value) {
			$displayValue = is_scalar($value) ? (string)$value : gettype($value);
			echo "<li><strong>" . htmlspecialchars($name) . "</strong> = " . htmlspecialchars($displayValue) . "</li>";
		}
		echo "</ul>";
	}
	?>
</body>
</html>