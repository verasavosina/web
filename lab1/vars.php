<?php
declare(strict_types=1);
$name = 'Вера';
$age = 20;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Переменные и вывод</title>
</head>
<body>
	<h1>Переменные и вывод</h1>
	<p>Меня зовут: <?= $name ?></p>
	<p>Мне <?=$age ?> лет</p> 
	<p>Тип $name: <?= gettype($name) ?></p>
	<p>Тип $age: <?= gettype($age) ?></p>
	<?php
	unset($name, $age);
	?>
</body>
</html>