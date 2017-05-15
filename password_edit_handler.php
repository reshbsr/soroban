<?php
include "admin_auth.php";
$id=$_SESSION[id];
$password1=$_POST[password1];
$password2=$_POST[password2];
if($password1!=$password2){
$_SESSION[mess]="Пароли не совпадают, повторите ввод";
header("Location: password_edit.php");
exit;
}
$pass_prefix="iDs7-_F4zK7n";
$pass=$pass_prefix.$password1;
$pass_hesh=sha1(md5(md5($pass)));
include "mysqli_connect.php";
$stmt=$mysqli->prepare("UPDATE users SET password=? WHERE id =$id");
$stmt->bind_param('s', $pass_hesh);
$stmt->execute();
$stmt->close();
$mysqli->close();
$_SESSION[mess]="Пароль пользователя изменён";
header("Location: user_edit.php");
?>