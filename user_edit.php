<?php
include "admin_auth.php";
include "admin_header.php";
include "mysqli_connect.php";
if(isset($_GET[edit]))
	$_SESSION[id]=$_GET[edit];
	$id=$_SESSION[id];
$result=$mysqli->query("SELECT login, status, name, surname FROM users WHERE id=$id");
$row=$result->fetch_assoc();
$login=$row[login];
$name=$row[name];
$surname=$row[surname];
?>
		<div class="form-conteiner">
			<div class="form-header">
				<div class="header">
					Отредактировать&nbsp;профиль&nbsp;пользователя&nbsp;<?=$login?>
				</div>
			</div>
			<form action="user_edit_handler.php" method="POST" class="form">
				<input type="hidden" name="id" value="<?=$id?>">
				<div class="label-input-conteiner">
					<label for="login" class="form-label">
						<div class="iconlogin">
							<i class="fa fa-user" aria-hidden="true" ></i>
						</div>
						<div class="label-text">Логин</div>
					</label>
					<input id="login" type="text" name="login" required placeholder=" Логин  нового пользователя" value="<?=$login?>" class="form-input">
				</div>	
				<div class="label-input-conteiner">
					<label for="name" class="form-label">
						<div class="iconlogin">
							<!-- <i class="fa fa-lock" aria-hidden="true" ></i> -->
						</div>
						<div class="label-text">Имя</div>
					</label>
					<input id="name" type="text" name="name" value="<?=$name?>" placeholder=" Имя пользователя" class="form-input">
				</div>

				<div class="label-input-conteiner">
					<label for="surname" class="form-label">
						<div class="iconlogin">
							<!-- <i class="fa fa-lock" aria-hidden="true" ></i> -->
						</div>
						<div class="label-text">Фамилия</div>
					</label>
					<input id="surname" type="text" name="surname" value="<?=$surname?>" placeholder=" Фамилия пользователя" class="form-input">
				</div>


				<div class="remember_logging_container">
					<!-- <div class="remember-conteiner">
						<input id="remember" type="checkbox" name="remember" value="1" class="remember">
						<label for="remember" class="remember-font">Запомнить меня</label>
					</div> -->
				<input type="submit" name="save" value="Сохранить" class="logging">
				</div>
			</form>
		</div>
		<div class="mess">
			<?=$_SESSION[mess]; unset($_SESSION[mess])?>
		</div>
		<div class="user_edit_buttons_conteiner">
		<form action="password_edit.php" style="display: inline-block;">
			<button type="submit" name="password_edit" class="user_edit_button">
						Изменить пароль
			</button>
		</form>
		<?php
		if($id!=1){?>
		<form action="user_delete.php" style="display: inline-block;">
			<button type="submit" name="password_edit" class="user_edit_button">
						Удалить пользователя
			</button>
		</form>
		<?php
			}
		?>
		</div>


<?php
include "admin_footer.php";
