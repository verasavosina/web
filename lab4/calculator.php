<?php
declare(strict_types=1);

/**
 * Выполняет математическую операцию.
 * 
 * @param float $num1 Первое число
 * @param float $num2 Второе число
 * @param string $operator Оператор (+, -, *, /)
 * @return float|string Результат или сообщение об ошибке
 */
function calculate(float $num1, float $num2, string $operator): float|string {
	if ($operator === '+') return $num1 + $num2;
	if ($operator === '-') return $num1 - $num2;
	if ($operator === '*') return $num1 * $num2;
	if ($operator === '/') {
		if ($num2 == 0) return "На ноль делить нельзя!";
		return $num1 / $num2;
	}
	return "Неизвестный оператор";
}

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$num1 = isset($_POST['num1']) ? (float) $_POST['num1'] : 0;
	$num2 = isset($_POST['num2']) ? (float) $_POST['num2'] : 0;
	$operator = $_POST['operator'] ?? '+';
	
	$result = calculate($num1, $num2, $operator);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Калькулятор</title>
</head>
<body>

<h1>Калькулятор</h1>

<?php
if ($result !== null) {
	echo "<h2>Результат: " . htmlspecialchars((string)$result) . "</h2>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<p><label for="num1">Число 1</label><br>
<input type="text" name="num1" id="num1" required></p>

<p><label for="operator">Оператор</label><br>
<select name="operator" id="operator">
    <option value="+" selected >+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
</select></p>

<p><label for="num2">Число 2</label><br>
<input type="text" name="num2" id="num2" required></p>

<button type="submit">Считать!</button>

</form>

</body>
</html>