<?php
include "admin_auth.php";
include "admin_header.php";
include "mysqli_connect.php";
$id=$_SESSION[id];
$result=$mysqli->query("SELECT login FROM users WHERE id=$id");
$row=$result->fetch_assoc();
$login=$row[login];
?>
		<div class="form-conteiner">
			<div class="form-header">
				<div class="header">
					Изменить&nbsp;пароль&nbsp;пользователя&nbsp;<?=$login?>
				</div>
			</div>
			<form id="user_edit" action="password_edit_handler.php" method="POST" class="form">
				<div class="label-input-conteiner">
					<label for="password1" class="form-label">
						<div class="iconlogin">
							<i class="fa fa-lock" aria-hidden="true" ></i>
						</div>
							<div class="label-text">Пароль</div>
					</label>
					<input id="password1" type="password" name="password1" required placeholder=" Новый пароль" class="form-input">
				</div>
				<div class="label-input-conteiner">
					<label for="password2" class="form-label">
						<div class="iconlogin">
							<i class="fa fa-lock" aria-hidden="true" ></i>
						</div>
						<div class="label-text">Пароль</div>
					</label>
					<input id="password2" type="password" name="password2" required placeholder=" Повторите ввод пароля" class="form-input">
				</div>

				<div class="remember_logging_container">
				<input form="user_edit" type="submit" name="save" value="Сохранить" class="logging">
				</form>
				<form action="user_edit.php">
				<button type="submit" name="back" class="logging">
						Отмена
				</button>
				</form>
				</div>
			</div>
		<div class="mess">
			<?=$_SESSION[mess]; unset($_SESSION[mess])?>
		</div>
</div>

<?php
include "admin_footer.php";
