<?php
//Авторизация
include "user_auth.php";

//Уровень сложности, то есть максимальное количество цифр в числах:
$len=$_GET[level];
$summands=$_GET[summands];
include "rnd.php";
$rnd = new Tasks();
//Генерация случайных чисел:
$numbers = $rnd->family_add_sub($len, $summands);

//Подключение к базе данных
include "../mysqli_connect.php";
//Запись в базу данных события входа в игру 
$login=$_SESSION[login];
$event="Сложение и вычитание: семья, старт";
$mysqli->query("INSERT INTO event (`login`, `event`) VALUES ('$login', '$event')");
$mysqli->close();
include "game_process.php";
