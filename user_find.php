<?php
include "admin_auth.php";
include "admin_header.php";

?>
		<div class="form-conteiner">
			<div class="form-header">
				<div class="header">
					Найти&nbsp;пользователя
				</div>
			</div>
			<form action="user_find_handler.php" method="GET" class="form">
				<div class="label-input-conteiner">
					<label for="login" class="form-label">
						<div class="iconlogin">
							<i class="fa fa-user" aria-hidden="true" ></i>
						</div>
						<div class="label-text">Логин</div>
					</label>
					<input id="login" type="text" name="login" placeholder=" Поиск по логину пользователя"  class="form-input">
				</div>	
				<!-- <i><p align="center">Формат ввода: ГГГГ-ММ-ДД</p></i> -->
				<div class="label-input-conteiner">
					<label for="name" class="form-label">
					<div class="iconlogin">
							<!-- <i class="fa fa-user" aria-hidden="true" ></i> -->
						</div>
						<div class="label-text">Имя</div>
					</label>
					<input id="name" type="text" name="name" placeholder=" Поиск по имени пользователя" class="form-input">
				</div>

				<div class="label-input-conteiner">
					<label for="surname" class="form-label">
					<div class="iconlogin">
						<!-- <i class="fa fa-user" aria-hidden="true" ></i> -->
					</div>
						<div class="label-text">Фамилия</div>
					</label>
					<input id="surname" type="text" name="surname" placeholder=" Поиск по фамилии пользователя" class="form-input">
				</div>


				<div class="remember_logging_container">
					<input type="submit" name="save" value="Найти" class="logging">
				</div>
			</form>
		</div>
		<div class="mess">
			<?=$_SESSION[mess]; unset($_SESSION[mess])?>
		</div>
		


<?php
include "admin_footer.php";
