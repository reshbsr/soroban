<?php
session_start();
$flag=isset($_SESSION[status]);
if($flag){
	if($_SESSION[status]=="Администратор")
		header("Location: main_admin.php");
	else
		header("Location: game");
}
else{

	header("Location: login.php");	
}
?>
