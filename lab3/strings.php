<?php
declare(strict_types=1);
	/*
	ЗАДАНИЕ 1
	*/
	$login = ' User ';
	$password = 'megaP@ssw0rd';
	$name = 'иван';
	$email = 'ivan@petrov.ru';
	$code = '<?=$login?>';
	
	/**
	 * Проверяет сложность пароля.
	 * 
	 * @param string $pass Пароль для проверки
	 * @return bool true, если пароль надежный
	 */
	function isStrongPassword(string $pass): bool {
		if (mb_strlen($pass) < 8) return false;
		if (!preg_match('/[A-Z]/', $pass)) return false;
		if (!preg_match('/[a-z]/', $pass)) return false;
		if (!preg_match('/[0-9]/', $pass)) return false;
		return true;
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>
<?php
	/*
	ЗАДАНИЕ 2
	*/
	// 1. Удаляем пробелы и приводим к нижнему регистру
	$login = mb_strtolower(trim($login));
	echo "Логин: '$login'<br>";

	// 2. Проверка пароля
	if (isStrongPassword($password)) {
		echo "Пароль надежный<br>";
	} else {
		echo "Пароль ненадежный<br>";
	}

	// 3. Первый символ имени — прописной
	$name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
	echo "Имя: $name<br>";

	// 4. Фильтрация email
	$filteredEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
	if ($filteredEmail !== false) {
		echo "Email корректный: $filteredEmail<br>";
	} else {
		echo "Email некорректный<br>";
	}

	// 5. Вывод $code в том же виде
	echo "Код: " . htmlspecialchars($code) . "<br>";
?>
</body>
</html>