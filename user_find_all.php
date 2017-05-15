<?php
include "admin_auth.php";
include "admin_header.php";
include "mysqli_connect.php";
$result=$mysqli->query('SELECT id, login, status, name, surname FROM users');
?>
<table align="center" border="1px">
	<tr>
		<td></td>
		<td>Id</td>
		<td>Login</td>
		<td>Status</td>
		<td>Name</td>
		<td>Surname</td>
	</tr>
	<tr>
<?php
while ($row=$result->fetch_assoc()){
		?> 
			<td>
				<form action="user_edit.php" method="GET">
					<button type="submit" name="edit" value="<?=$row[id]?>">
						Редактировать
					</button>
				</form>
			</td>
		<?php
	foreach ($row as $key => $value) {
		?>
			<td><?=$value?></td>
		<?php
	}
?></tr><?php
}
$mysqli->close();
?>