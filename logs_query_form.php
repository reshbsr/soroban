<?php
include "admin_auth.php";
include "admin_header.php";

?>
		<div class="form-conteiner">
			<div class="form-header">
				<div class="header">
					История&nbsp;действий&nbsp;пользователей
				</div>
			</div>
			<form action="logs_query_form_handler.php" method="GET" class="form">
				<div class="label-input-conteiner">
					<label for="login" class="form-label">
						<div class="iconlogin">
							<i class="fa fa-user" aria-hidden="true" ></i>
						</div>
						<div class="label-text">Логин</div>
					</label>
					<input id="login" type="text" name="login" placeholder=" Искать по логину пользователя"  class="form-input">
				</div>	
				<b><p align="center">Выберите диапазон дат:</p></b>
				<!-- <i><p align="center">Формат ввода: ГГГГ-ММ-ДД</p></i> -->
				<div class="label-input-conteiner">
					<label for="date_start" class="form-label">
					<div class="iconlogin">
							<!-- <i class="fa fa-user" aria-hidden="true" ></i> -->
						</div>
						<div class="label-text">От даты</div>
					</label>
					<input id="date_start" type="date" name="date_start" required placeholder=" Формат ввода: ГГГГ-ММ-ДД" class="form-input">
				</div>

				<div class="label-input-conteiner">
					<label for="date_end" class="form-label">
					<div class="iconlogin">
						<!-- <i class="fa fa-user" aria-hidden="true" ></i> -->
					</div>
						<div class="label-text">До даты</div>
					</label>
					<input id="date_end" type="date" name="date_end" required placeholder=" Формат ввода: ГГГГ-ММ-ДД" class="form-input">
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
