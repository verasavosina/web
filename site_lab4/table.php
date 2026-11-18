<?php
declare(strict_types=1);
require_once 'inc/lib.inc.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$cols = abs((int) $_POST['cols']);
	$rows = abs((int) $_POST['rows']);
	$color = trim(strip_tags($_POST['color']));
}
$cols = (isset($cols) && $cols > 0) ? $cols : 10;
$rows = (isset($rows) && $rows > 0) ? $rows : 10;
$color = (isset($color) && $color !== '') ? $color : '#ffff00';
?>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
	<label>Количество колонок: </label><br>
	<input name='cols' type='text' value='<?=$cols?>'><br>
	
	<label>Количество строк: </label><br>
	<input name='rows' type='text' value='<?=$rows?>'><br>
	
	<label>Цвет: </label><br>
	<input name='color' type='color' value='<?=$color?>' list="listColors">
	<datalist id="listColors">
		<option>#ff0000</option>
		<option>#00ff00</option>
		<option>#0000ff</option>
	</datalist>
	<br><br>
	<input type='submit' value='Создать'>
</form>
<br>

<?php drawTable($cols, $rows, $color); ?>
