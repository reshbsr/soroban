<?php
include "admin_auth.php";
include "mysqli_connect.php";
$stmt=$mysqli->prepare("UPDATE users SET login =?, Name =?, Surname =? WHERE id = $_POST[id]");
$stmt->bind_param('sss', $_POST[login], $_POST[name], $_POST[surname]);
$stmt->execute();
$stmt->close();
$mysqli->close();
session_start();
$_SESSION[id]=$_POST[id];
$_SESSION[mess]="Данные пользователя изменены";
header("Location: user_edit.php");
?>