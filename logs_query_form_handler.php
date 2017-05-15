<?php
include "admin_auth.php";
include "admin_header.php";
include "mysqli_connect.php";
$login=$_GET[login];
$date_start=$_GET[date_start]." 00-00-00";
$date_end=$_GET[date_end]." 23-59-59";
if(strlen($login)!=0){
$stmt = $mysqli->prepare('
	SELECT `date`, `login`, `event` FROM event WHERE ((login=?)AND((date>=?)AND(date<=?)))
');
$stmt->bind_param('sss', $login, $date_start, $date_end);
}
elseif(strlen($login)==0){
$stmt = $mysqli->prepare('
	SELECT `date`, `login`, `event` FROM event WHERE ((date>=?)AND(date<=?))
');
$stmt->bind_param('ss', $date_start, $date_end);

}

$stmt->execute();
$stmt->bind_result($date, $login, $event);
?>
<table align="center" border="1px">
	<tr>
		<td>Дата</td>
		<td>Логин</td>
		<td>Событие</td>
	</tr>
	<tr>
<?php
while ($stmt->fetch()) {
?>
<tr>
<td><?=$date?></td>
<td><?=$login?></td>
<td><?=$event?></td>
</tr>
<?php
}
?>
</table>
<?php




// var_dump($_GET);
// echo "<br>";
// echo "<br>";
// var_dump($_GET[date_start]);

