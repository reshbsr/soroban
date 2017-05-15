<?php
include "admin_auth.php";
include "admin_header.php";
include "mysqli_connect.php";
$id=$_SESSION[id];
$result=$mysqli->query("SELECT login, Name, Surname FROM users WHERE id=$id");
$row=$result->fetch_assoc();
$login=$row[login];
$name=$row[Name];
$surname=$row[Surname];
?>
		<div class="form-conteiner">
			<div class="form-header">
				<div class="header">
					Удаление&nbsp;пользователя&nbsp;<?=$login?>
				</div>
			</div>
			<div class="delete_text">
			<p>Удалить пользователя <?=$login?> ?</p>
			<p align="center">Информация о пользователе:</p>
			<p>Логин: <?=$login?></p>
			<p>Имя: <?=$name?></p>
			<p>Фамилия: <?=$surname?></p>
			</div>
			<form action="user_delete_handler.php" method="POST" class="form">		
				<div class="remember_logging_container">
				<input type="hidden" name="login" value="<?=$login?>">
				<input type="submit" value="Удалить" class="logging">
				</form>
				<form action="user_edit.php">
				<button type="submit" name="back" class="logging">
						Отмена
				</button>
				</form>
				</div>
			</div>
		</div>

<?php
include "admin_footer.php";
