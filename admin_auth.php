<?php
session_start();

$flag=isset($_SESSION[status]);
if($flag==true){
    if($_SESSION[status]!="Администратор"){
      header("Location: main_admin.php");
      exit;
    }
}
else{
  header("Location: login.php");
      exit;
}
?>