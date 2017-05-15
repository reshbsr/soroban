<?php
include "admin_auth.php";
include "mysqli_connect.php";
$id=$_SESSION[id];
$result=$mysqli->query("DELETE FROM users WHERE id=$id");
$_SESSION[mess_del]="Пользователь ".$_POST[login]." удалён";
header("Location: user_delete_message.php");
