<?php
include 'connect.php';
include 'control.php';
$_SESSION['login'] = 0;
$con = $_SESSION['con'];
if ($_POST && isset($_POST["name"]) && isset($_POST["tc"]) && isset($_POST["password"])) {
	if (!check_user_exist($_POST["name"], $_POST['tc'], 0))
		add_user($_POST["name"], $_POST['tc'], $_POST["password"]);
	else
		echo ("<script>alert('[HATA] bu kullanici zaten kayitli')</script>");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/index.js"></script>
	<title>Kayit Ol</title>
</head>

<body>

	<center>
		<h3>HASTANE RANDEVU SISTEMI</h3>
	</center>

	<div class='login-form'>
		<center>KAYIT OL</center>
		<form action='' method='POST'>
			<input type='text' name='name' class='login-item login-tc' placeholder='Adınız'>
			<input type="text" name="tc" class="login-item login-tc" placeholder='TC Kimlik No'>
			<input type="password" name="password" class="login-item login-passwd" placeholder='Şifre'>
			<button class="login-btn register-btn" name="register">Kayit Ol</button>
		</form>
	</div>
</body>

</html>
