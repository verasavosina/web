<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Галерея изображений</title>
	<style>
		.gallery {
			display: flex;
			flex-wrap: wrap;
			gap: 15px;
			margin-top: 20px;
		}
		.gallery img {
			border: 2px solid #ccc;
			border-radius: 8px;
			width: 200px;
			height: auto;
			object-fit: cover;
			transition: transform 0.2s;
		}
		.gallery img:hover {
			transform: scale(1.05);
			border-color: #2A4F6F;
		}
	</style>
</head>
<body>
	<h1>Галерея загруженных изображений</h1>
	
	<div class="gallery">
	<?php
	$files = scandir(__DIR__);
	
	foreach ($files as $file) {
		if ($file !== '.' && $file !== '..' && $file !== 'index.php') {
			$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
			if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
				echo "<a href='$file' target='_blank'><img src='$file' alt='$file'></a>";
			}
		}
	}
	?>
	</div>
</body>
</html>