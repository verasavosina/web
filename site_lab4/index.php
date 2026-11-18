<?php
declare(strict_types=1);
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';

$hour = (int)date('H');
if ($hour >= 0 && $hour < 6) $welcome = 'Доброй ночи';
elseif ($hour >= 6 && $hour < 12) $welcome = 'Доброе утро';
elseif ($hour >= 12 && $hour < 18) $welcome = 'Добрый день';
elseif ($hour >= 18 && $hour < 23) $welcome = 'Добрый вечер';
else $welcome = 'Доброй ночи';

$title = 'Сайт нашей школы';
$header = "$welcome, Гость!";
$id = strtolower(strip_tags(trim($_GET['id'] ?? '')));

switch($id){ 
	case 'about':
		$title = 'О сайте';
		$header = 'О нашем сайте';
		break;
	case 'contact':
		$title = 'Контакты';
		$header = 'Обратная связь';
		break;
	case 'table':
		$title = 'Таблица умножения';
		$header = 'Таблица умножения';
		break;
	case 'calc':
		$title = 'Он-лайн калькулятор';
		$header = 'Калькулятор';
		break; 
}

$dateInfo = getdate();
$currentYear = $dateInfo['year'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php require_once 'inc/top.inc.php'; ?>

  <section>
    <h1><?=$header?></h1>
    <?php
    switch($id){
        case 'about': 
            include 'about.php';
            break;
        case 'contact':
            include 'contact.php';
            break;
        case 'table':
            include 'table.php';
            break;
        case 'calc':
            include 'calc.php';
            break;
        default:
            include 'inc/index.inc.php'; 
    }
    ?>
  </section>

  <?php require_once 'inc/menu.inc.php'; ?>

  <footer>
    &copy; Супер Мега Веб-мастер, 2000 &ndash; <?=$currentYear?>
  </footer>
</body>
</html>