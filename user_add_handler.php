<?php
session_start();
$login=$_POST[login];
$password1=$_POST[password1];
$password2=$_POST[password2];
$name=$_POST[name];
$surname=$_POST[surname];
$status="User";
if($password1!=$password2){
	header("Location: user_add.php");
	$_SESSION[mess]="Пароли не совпадают, повторите ввод";
	$_SESSION[new_user]=$login;
}
else{
	include "mysqli_connect.php";
	$result=$mysqli->query('SELECT login FROM users');
	while ($row=$result->fetch_assoc()){
		// echo $row["login"];
		// echo "<br>";
		if($row["login"]==$login){
			$_SESSION[mess]="Пользователь с логином $login уже существует.";
			header("Location: user_add.php");
			exit;
		}
	}
	$pass_prefix="iDs7-_F4zK7n";
	$pass=$pass_prefix.$password1;
	$pass_hesh=sha1(md5(md5($pass)));
	$stmt = $mysqli->prepare('INSERT INTO users (login, password, status, name, surname) VALUES (?,?,?,?,?)');
	$stmt->bind_param('sssss', $login, $pass_hesh, $status, $name, $surname);
	$stmt->execute();
	header("Location: user_add.php");
	$_SESSION[mess]="Зарегистрирован новый пользователь с логином $login.";

}


echo '<meta charset="utf-8">';
echo "<pre>";
var_dump($_POST);
echo '<br>';
var_dump($_SESSION);