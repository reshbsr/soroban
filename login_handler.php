<?php
session_start();
if(isset($_COOKIE[login])&&isset($_COOKIE[password])){
	$login=$_COOKIE[login];
	$pass_hesh=($_COOKIE[password]);
}
else{
	$login=$_POST[login];
	$pass_user=$_POST[pass];
	$remember=$_POST[remember];
	$pass_prefix="iDs7-_F4zK7n";
	$pass=$pass_prefix.$pass_user;
	$pass_hesh=sha1(md5(md5($pass)));
}
include "mysqli_connect.php";
$stmt = $mysqli->prepare('SELECT id, status FROM users WHERE login=? and password=?');
$stmt->bind_param('ss', $login, $pass_hesh);
$stmt->execute();
$stmt->bind_result($id, $status);
if($stmt->fetch())
{
	$flag=1;
}
else
{
	$flag=0;
}
$stmt->close();
$mysqli->close();
if($flag==1){
	if($remember==1){
		$time=0x7fffffff;
		setcookie('login', $login, $time, '/');
		setcookie('password', $pass_hesh, $time, '/');
	}
		$_SESSION['login']=$login;
		$_SESSION['id_user']=$id;
		$_SESSION['is_auth']=true;
		$_SESSION['status']=$status;
	
	header('Location: index.php');
}
else{
	$_SESSION['mess']="Неверная пара логин-пароль";
	header('Location: login.php');
}
?>