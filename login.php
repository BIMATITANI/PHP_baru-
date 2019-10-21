<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>Login Page</title>
	</head>
		<br><br>
<?php

session_start();
include_once "fungsi.php";
$err="";
if (isset($_POST['login'])) {
	$user = isset($_POST['user']) ? $_POST['user'] : '';
	$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
	
	if ($user != "" && $pass != "") {
		if (cekLogin($user, $pass)) {
            $_SESSION['jeneng'] = $user;
            $_SESSION['data']=get_DataMahasiswa($user);
			
		} else {
			$err = '<div class="alert alert-danger"><b>'.$user.' TIDAK TERDAFTAR!!!</b></div>';
        }}}
	


if (isset($_SESSION['jeneng'])) {
	header("location:index.php");
	exit;
}

echo '
	<div class="container-fluid">
		'.$err.'
		<form method="post">
			<table>
				<tr>
					<th class="table-info" style="background-color:gray;">Username</th>
					<td><input class="form-control" type="text" name="user"></td>
				</tr>
				<tr>
					<th class="table-info" style="background-color:gray">Password</th>
					<td><input class="form-control" type="password" name="pass"></td>
				</tr>
				<tr>
					<td colspan="2">
					<input class="btn btn-success" type="submit" name="login" value="Login"></td>
				</tr>
			</table>
		</form>
	</div>
';

?>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>