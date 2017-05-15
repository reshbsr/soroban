<?php
include("game_start.php");
$title="Прямое сложение и вычитание";
//1-й аргумент - заголовок
//2-й аргумент - ссылка для кнопки старт
//3-й аргумент - ссылка для кнопки выход
game_start_menu($title, "game_process_1.php","game_start_1.php");