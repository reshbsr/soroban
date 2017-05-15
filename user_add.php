<?php
include "admin_auth.php";
include "admin_header.php";
?>
		<div class="form-conteiner">
			<div class="form-header">
				<div class="header">
					Добавить&nbsp;пользователя
				</div>
			</div>
			<form action="user_add_handler.php" method="POST" class="form">
				
				<div class="label-input-conteiner">
					<label for="login" class="form-label">
						<div class="iconlogin">
							<i class="fa fa-user" aria-hidden="true" ></i>
						</div>
						<div class="label-text">Логин</div>
					</label>
					<input id="login" type="text" name="login" required placeholder=" Логин  нового пользователя" value="<?=$_SESSION[new_user]; unset($_SESSION[new_user])?>" class="form-input">
				</div>
				
				<div class="label-input-conteiner">
					<label for="password1" class="form-label">
						<div class="iconlogin">
							<i class="fa fa-lock" aria-hidden="true" ></i>
						</div>
							<div class="label-text">Пароль</div>
					</label>
					<input id="password1" type="password" name="password1" required placeholder=" Пароль нового пользователя" class="form-input">
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
				
				<div class="label-input-conteiner">
					<label for="name" class="form-label">
						<div class="iconlogin">
							<!-- <i class="fa fa-lock" aria-hidden="true" ></i> -->
						</div>
						<div class="label-text">Имя</div>
					</label>
					<input id="name" type="text" name="name" placeholder=" Имя пользователя" class="form-input">
				</div>

				<div class="label-input-conteiner">
					<label for="surname" class="form-label">
						<div class="iconlogin">
							<!-- <i class="fa fa-lock" aria-hidden="true" ></i> -->
						</div>
						<div class="label-text">Фамилия</div>
					</label>
					<input id="surname" type="text" name="surname" placeholder=" Фамилия пользователя" class="form-input">
				</div>


				<div class="remember_logging_container">
					<!-- <div class="remember-conteiner">
						<input id="remember" type="checkbox" name="remember" value="1" class="remember">
						<label for="remember" class="remember-font">Запомнить меня</label>
					</div> -->
				<input type="submit" name="logging" value="Зарегистрировать" class="logging">
				</div>
				
			</form>
		</div>
		<div class="mess">
					<?=$_SESSION[mess]; unset($_SESSION[mess])?>
					<?=$test?>	
				</div>
</div>

<?php
include "admin_footer.php";
