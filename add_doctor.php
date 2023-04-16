<?php
include 'connect.php';
include 'control.php';
if (!isset($_SESSION))
	session_start();
// if ($_SESSION['privilege'] != 'admin')
// 	header('Location: login.php');
$con = $_SESSION['con'];
if ($_POST) {
	if (isset($_POST["name"]) && isset($_POST["tc"]) && isset($_POST["password"])) {
		if (!check_user_exist($_POST["name"], $_POST['tc'], 0))
			add_user($_POST["name"], $_POST['tc'], $_POST["password"]);
		else
			echo ("<script>alert('[HATA] bu doktor zaten kayitli')</script>");
	} else if ($_POST && isset($_POST["register"]) && isset($_POST["name"]) && isset($_POST["password"]) && isset($_POST["branch"])) {
		if (!check_doctor_exist($_POST["name"], $_POST['branch']))
			add_doctor($_POST["name"], $_POST["password"], $_POST['branch']);
		else
			echo ("<script>alert('[HATA] bu doktor zaten kayitli')</script>");
	} else
		echo ("<script>alert('[HATA] lutfen tum alanlari eksiksiz doldurun')</script>");
}
if ($_GET) {
	if (isset($_GET['add_dr']) && $_GET['add_dr'] == 'ok')
		alert("Doktor başarıyla eklendi.");
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
	<title>Doktor Kayıt</title>
</head>

<body>

	<center>
		<h3>DOKTOR KAYIT EKRANI</h3>
	</center>

	<div class='login-form'>
		<center> </center>
		<form action='' method='POST'>
			<input type='text' name='name' class='login-item login-tc' placeholder='Adınız'>
			<select name="branch" class="reg-branch">
				<option value="empty">Branşınız</option>
				<option value="Acil">ACİL</option>
				<option value="Nöroloji">Nöroloji</option>
				<option value="KBB">Kulak Burun Boğaz</option>
				<option value="Ortopedi">Ortopedi</option>
				<option value="Cildiye">Cildiye</option>
				<option value="Sinir Hastalıkları">Sinir hastalıkları</option>
				<option value="Admin">Admin</option>
				<option value="Diğer">Diğer</option>
			</select>
			<input type="password" name="password" class="login-item login-passwd" placeholder='Şifre'>
			<button class="login-btn register-btn" name="register">Doktor Ekle</button><br><br>
			<a class="return-admin-panel" href="admin.php">Randevuları Görüntüle</a>
		</form>
	</div>
</body>

</html>
