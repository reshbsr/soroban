<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Игры по математике</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="fonts/bebasneue/bebasneue.css">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
  <body>
    <div class="nav_conteiner">
      <div class="nav_conteiner1024">
        <div class="user">
          Пользователь: <?=$_SESSION[login]?>
        </div>
        <div class="exit">
            <a href="logout.php">Выход</a>
        </div>
      </div>
    </div>
    <div class="admin_body_conteiner">
    <?php
      include "menu_admin.php";
    ?>
