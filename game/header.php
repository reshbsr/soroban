<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Сложение и вычитание</title>
	<link href="css/reset.css" rel="stylesheet" type="text/css" />
	<link href="css/main.css" rel="stylesheet" type="text/css" />
	<link href="css/game.css" rel="stylesheet" type="text/css" />
</head>
<body>
	
	<div class="main_header_conteiner">
	<div class="header_conteiner">
		<a href="../"><img src="../images/logo.jpg" alt="" class="logo"></a>
		<div class="panda">
			PANDA
		</div>
		<div class="center_razvitiya_detey">
			Центр&nbsp;развития детей
		</div>
		<?php
		if($_SESSION[status]!=="Администратор")
			$link="../logout.php";
		elseif($_SESSION[status]=="Администратор")
			$link="../main_admin.php";
		?>
		<a href="<?=$link?>" class="cabinet" style="width: 100px;">
			Выход
		</a>
		
	</div>
	</div>
	<div class="motto_conteiner">
		<div class="motto">Считайте&nbsp;быстрее&nbsp;калькулятора!</div>
	</div>