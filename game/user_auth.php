<?php
session_start();
$flag=isset($_SESSION[id_user]);
if($flag==false){
	header("Location: ../login.php");
	exit;
	}