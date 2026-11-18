<?php
declare(strict_types=1);

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['subject'], $_POST['body'])) {
		$subject = htmlspecialchars(trim(strip_tags($_POST['subject'])));
		$body = htmlspecialchars(trim(strip_tags($_POST['body'])));
		
		if (!empty($subject) && !empty($body)) {
			$to = 'savosinkina0110@gmail.com'; 
			$headers = "From: admin@center.ogu\r\n";
			$headers .= "Content-Type: text/plain; charset=utf-8\r\n";
			
			if (mail($to, $subject, $body, $headers)) {
				$message = "<p style='color:green;'>Письмо успешно отправлено!</p>";
			} else {
				$message = "<p style='color:red;'>Ошибка при отправке письма.</p>";
			}
		} else {
			$message = "<p style='color:red;'>Заполните все поля.</p>";
		}
	}
}
?>

<h3>Адрес</h3>
<address>123456 Москва, Малый Американский переулок 21</address>
<h3>Задайте вопрос</h3>
<?= $message ?>
<form method='post'>
  <label>Тема письма: </label>
  <br>
  <input name='subject' type='text' size="50" required>
  <br>
  <label>Содержание: </label>
  <br>
  <textarea name='body' cols="50" rows="10" required></textarea>
  <br>
  <br>
  <input type='submit' value='Отправить'>
</form>