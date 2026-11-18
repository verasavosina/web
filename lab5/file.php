<?php
declare(strict_types=1);

define('DB_FILE', __DIR__ . '/db/messages.txt');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['fname'], $_POST['lname'])) {
		$fname = htmlspecialchars(trim(strip_tags($_POST['fname'])));
		$lname = htmlspecialchars(trim(strip_tags($_POST['lname'])));
		
		if (!empty($fname) && !empty($lname)) {
			$line = $fname . ' ' . $lname . "\n";
			
			file_put_contents(DB_FILE, $line, FILE_APPEND | LOCK_EX);
		}

		header('Location: ' . $_SERVER['PHP_SELF']);
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	Имя: <input type="text" name="fname"><br>
	Фамилия: <input type="text" name="lname"><br>
	<br>
	<input type="submit" value="Отправить!">
</form>

<?php

if (file_exists(DB_FILE)) {
	$lines = file(DB_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	
	echo "<hr>";
	foreach ($lines as $index => $line) {
		$num = $index + 1;
		echo "$num " . htmlspecialchars($line) . "<br>";
	}
	
	echo "<hr>";
	$size = filesize(DB_FILE);
	echo "Размер файла: $size байт";
}
?>
</body>
</html>