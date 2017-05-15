<?php
if(isset($_COOKIE[login])&&isset($_COOKIE[password])){
	header("Location: login_handler.php");
	exit;
	
}
session_start();
if(isset($_SESSION[login])){
	header("Location: index.php");
	exit;
	
}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Сложение и вычитание | Авторизация</title>
	<link href="game/css/reset.css" rel="stylesheet" type="text/css" />
	<link href="game/css/main.css" rel="stylesheet" type="text/css" />
	<link href="game/css/game.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="authorization.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
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
				
	</div>
	</div>
	<div class="motto_conteiner">
		<div class="motto">Считайте&nbsp;быстрее&nbsp;калькулятора!</div>
	</div>
	<div class="main-conteiner">
	<div class="form-conteiner">
		<div class="form-header">
			<div class="header">
				Войти&nbsp;в&nbsp;систему
			</div>
		</div>
		<form action="login_handler.php" method="POST" class="form">
			<div class="label-input-conteiner">
				<label for="login" class="form-label">
					<span class="iconlogin">
						<i class="fa fa-user" aria-hidden="true" ></i>
					</span>
				</label>
				<input id="login" type="text" name="login" required class="form-input">
			</div>
			<div class="label-input-conteiner">
				<label for="password" class="form-label">
					<span class="iconlogin">
						<i class="fa fa-lock" aria-hidden="true" ></i>
					</span>
				</label>
				<input id="password" type="password" name="pass" required class="form-input">
			</div>
			<div class="remember_logging_container">
			<div class="remember-conteiner">
				<input id="remember" type="checkbox" name="remember" value="1" class="remember">
				<label for="remember" class="remember-font">Запомнить меня</label>
			</div>
			<input type="submit" name="logging" value="Войти" class="logging">
			</div>
		</form>
	</div>
	<div class="img-login">
	</div>
	<div class="mess">
		<?=$_SESSION[mess]; unset($_SESSION[mess])?>
	</div>
	</div>
<?php
 include("game/footer.php");
