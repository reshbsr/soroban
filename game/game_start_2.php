<?php
include("game_start.php");
$title="Сложение и вычитание: малые друзья";
//1-й аргумент - заголовок
//2-й аргумент - ссылка для кнопки старт
//3-й аргумент - ссылка для кнопки выход
game_start_menu($title, "game_process_2.php","game_start_2.php");