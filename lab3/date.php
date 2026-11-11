<?php
declare(strict_types=1);
	/*
	ЗАДАНИЕ 1
	*/
	$now = time();
	// Укажите ваш год, месяц и день рождения (например, 2005, 5, 15)
	$birthday = mktime(0, 0, 0, 5, 15, 2005); 
	
	$dateInfo = getdate();
	$hour = $dateInfo['hours'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
	<?php
	/*
	ЗАДАНИЕ 2
	*/
	// 1. Приветствие
	if ($hour >= 0 && $hour < 6) {
		$welcome = 'Доброй ночи';
	} elseif ($hour >= 6 && $hour < 12) {
		$welcome = 'Доброе утро';
	} elseif ($hour >= 12 && $hour < 18) {
		$welcome = 'Добрый день';
	} elseif ($hour >= 18 && $hour < 23) {
		$welcome = 'Добрый вечер';
	} else {
		$welcome = 'Доброй ночи';
	}
	echo $welcome . "<br>";

	// 2. Форматирование даты
	setlocale(LC_TIME, 'ru_RU.UTF-8');

	$fmt = datefmt_create(
		'ru_RU',
		IntlDateFormatter::FULL,
		IntlDateFormatter::FULL,
		'Europe/Moscow',
		IntlDateFormatter::GREGORIAN,
		"Сегодня d MMMM y 'года, 'EEEE HH:mm:ss"
	);
	echo datefmt_format($fmt, $now) . "<br>";

	// 3. Время до дня рождения
	$diff = $birthday - $now;
	
	// Если день рождения уже прошел в этом году, считаем до следующего
	if ($diff < 0) {
		$birthday = mktime(0, 0, 0, 5, 15, (int)date('Y') + 1);
		$diff = $birthday - $now;
	}

	$days = floor($diff / (60 * 60 * 24));
	$hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
	$minutes = floor(($diff % (60 * 60)) / 60);
	$seconds = $diff % 60;

	echo "До моего дня рождения осталось: <br>";
	echo "$days дней, $hours часов, $minutes минут, $seconds секунд";
	?>
</body>
</html>