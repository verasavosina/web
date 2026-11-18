<?php
declare(strict_types=1);

/*
ЗАДАНИЕ (Загрузка файла)
*/
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fupload'])) {
	$file = $_FILES['fupload'];
	
	if ($file['error'] === UPLOAD_ERR_OK) {
		$fileName = $file['name'];
		$fileSize = $file['size'];
		$fileTmp  = $file['tmp_name'];
		$fileType = mime_content_type($fileTmp);
		$fileError = $file['error'];
		
		$message .= "<strong>Информация о файле:</strong><br>";
		$message .= "Имя: $fileName<br>";
		$message .= "Размер: $fileSize байт<br>";
		$message .= "Временный файл: $fileTmp<br>";
		$message .= "Тип: $fileType<br>";
		$message .= "Код ошибки: $fileError<br><br>";

		if ($fileType === 'image/jpeg') {
			$newName = hash('sha256', $fileName . time()) . '.jpg';
			$destination = __DIR__ . '/upload/' . $newName;
			
			if (move_uploaded_file($fileTmp, $destination)) {
				$message .= "<span style='color:green;'>Файл успешно загружен как $newName</span><br>";
			} else {
				$message .= "<span style='color:red;'>Ошибка при перемещении файла.</span><br>";
			}
		} else {
			$message .= "<span style='color:red;'>Разрешена загрузка только JPEG файлов.</span><br>";
		}
	} else {
		$message .= "<span style='color:red;'>Ошибка загрузки. Код: {$file['error']}</span><br>";
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Загрузка файла на сервер</title>
</head>
 <body>
  <div>
   <?= $message ?>
  </div>
  <form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <p>
      <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
      <input type="file" name="fupload"><br>
      <button type="submit">Загрузить</button>
    </p>
   </form>
 </body>
</html>