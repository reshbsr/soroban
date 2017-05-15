<?php
session_start();
session_unset();
session_destroy();
setcookie('login', false);
setcookie('password', false);
header("Location: index.php");
?>
