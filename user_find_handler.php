<?php
include "admin_auth.php";

$login=$_GET[login];
$name=$_GET[name];
$surname=$_GET[surname];
if( (strlen($login)==0) && (strlen($name)==0) && (strlen($surname)==0) ){
	header("Location: user_find_all.php");
	exit;
}
include "admin_header.php";
include "mysqli_connect.php";

if( (strlen($login)!=0) && (strlen($name)==0) && (strlen($surname)==0) ){
$stmt = $mysqli->prepare('
SELECT `id`, `login`, `name`, `surname` FROM users WHERE login=?
');
$stmt->bind_param('s', $login);
}

if( (strlen($login)==0) && (strlen($name)!=0) && (strlen($surname)==0) ){
$stmt = $mysqli->prepare('
SELECT `id`, `login`, `name`, `surname` FROM users WHERE name=?
');
$stmt->bind_param('s', $name);
}

if( (strlen($login)==0) && (strlen($name)==0) && (strlen($surname)!=0) ){
$stmt = $mysqli->prepare('
SELECT `id`, `login`, `name`, `surname` FROM users WHERE surname=?
');
$stmt->bind_param('s', $surname);
}

if( (strlen($login)==0) && (strlen($name)==0) && (strlen($surname)!=0) ){
$stmt = $mysqli->prepare('
SELECT `id`, `login`, `name`, `surname` FROM users WHERE surname=?
');
$stmt->bind_param('s', $surname);
}

if( (strlen($login)!=0) && (strlen($name)!=0) && (strlen($surname)!=0) ){
$stmt = $mysqli->prepare('
SELECT `id`, `login`, `name`, `surname` FROM users WHERE login=? AND name=? AND surname=?
');
$stmt->bind_param('sss', $login, $name, $surname);
}

if( (strlen($login)!=0) && (strlen($name)!=0) && (strlen($surname)==0) ){
$stmt = $mysqli->prepare('
SELECT `id`, `login`, `name`, `surname` FROM users WHERE login=? AND name=?
');
$stmt->bind_param('ss', $login, $name);
}

if( (strlen($login)==0) && (strlen($name)!=0) && (strlen($surname)!=0) ){
$stmt = $mysqli->prepare('
SELECT `id`, `login`, `name`, `surname` FROM users WHERE name=? AND surname=?
');
$stmt->bind_param('ss', $name, $surname);
}

if( (strlen($login)!=0) && (strlen($name)==0) && (strlen($surname)!=0) ){
$stmt = $mysqli->prepare('
SELECT `id`, `login`, `name`, `surname` FROM users WHERE login=? AND surname=?
');
$stmt->bind_param('ss', $login, $surname);
}

$stmt->execute();
$stmt->bind_result($id, $login, $name, $surname);
?>
<table align="center" border="1px">
	<tr>
		<td></td>
		<td>id</td>
		<td>Логин</td>
		<td>Имя</td>
		<td>Фамилия</td>
	</tr>
	<tr>
<?php
while ($stmt->fetch()) {
?>
<tr>
<td>
	<form action="user_edit.php" method="GET">
		<button type="submit" name="edit" value="<?=$id?>">
			Редактировать
		</button>
	</form>
</td>
<td><?=$id?></td>
<td><?=$login?></td>
<td><?=$name?></td>
<td><?=$surname?></td>
</tr>
<?php
}
$stmt->close();
$mysqli->close();
?>
</table>
<?php




// var_dump($_GET);
// echo "<br>";
// echo "<br>";
// var_dump($_GET[date_start]);

