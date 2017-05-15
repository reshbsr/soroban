<?php
function game_start_menu($title, $link_start, $link_exit="index.php"){
include "user_auth.php";
include "header.php";
?>
<div class="main_game_conteiner">
	<div class="game_conteiner">
		<div class="game_title">
			<?=$title?>
		</div>
			<form id="game_settings" action="<?=$link_start?>" method="GET" class="game_header">
				<input type="hidden" name="link_exit" value="<?=$link_exit?>">
				<div class="select_conteiner">
					<div class="select_level">
						Выберите&nbsp;число слагаемых
					</div>
					<div class="select">	
						<select size="1" name="summands" class="select_other">
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>
				</div>
				<div class="select_conteiner">
					<div class="select_level">
						Выберите&nbsp;сложность
					</div>
					<div class="select">	
						<select size="1" name="level" class="select_other">
							<option value="1"><div class="option">1</div></option>
							<option value="2">10</option>
						</select>
					</div>
				</div>
				<div class="select_conteiner">
					<div class="select_level">
						Выберите&nbsp;скорость
					</div>
					<div class="select">	
						<select size="1" name="speed" class="select_speed">
							<option value="0.2">0,2 секунды</option>
							<option value="0.3">0,3 секунды</option>
							<option value="0.4">0,4 секунды</option>
							<option value="0.5">0,5 секунды</option>
							<option value="0.6">0,6 секунды</option>
							<option value="0.7">0,7 секунды</option>
							<option value="0.8">0,8 секунды</option>
							<option value="0.9">0,9 секунды</option>
							<option value="1">1 секунда</option>
							<option value="1.5">1.5 секунды</option>
							<option value="2">2 секунды</option>
							<option value="2.5">2.5 секунды</option>
							<option value="3">3 секунды</option>
							<option value="3.5">3.5 секунды</option>
							<option value="4">4 секунды</option>
							<option value="4.5">4.5 секунды</option>
							<option value="5">5 секунд</option>
						</select>
					</div>
				</div>


				<div class="switch_sound">
            		<input type="checkbox" <?=$_SESSION[checked]?> name="sound" id="sound" value="1.0">
            		<label for="sound">Включить&nbsp;звук</label>
        		</div>
			</form>
		<div class="game_fild_conteiner game_start_menu_conteiner">
			
			<button form="game_settings" class="game_start_menu_button">
				<div class="game_start_menu_button_text">
					СТАРТ
				</div>
			</button>
			<a href="index.php" class="game_start_menu_button">
				<div class="game_start_menu_button_text">
					ВЫХОД
				</div>
			</a>
		</div>
	</div>
</div>
<?php
include "footer.php";
}