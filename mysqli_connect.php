<?php
$mysqli = new mysqli('localhost', 'root', '', 'game');
if (mysqli_connect_errno()) {
    printf("Error of connection: %s\n", mysqli_connect_error());
    exit();
}
$mysqli->set_charset("utf8");