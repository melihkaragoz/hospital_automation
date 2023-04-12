<?php
if (!isset($_SESSION))
	session_start();
if (!$_SESSION["login"] || ($_SESSION['privilege'] == 'admin'))
	header('Location: login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/index.js"></script>
	<title>Anasayfa</title>
</head>

<body>

	<div class="head">
		<div class="header">
			<center>
				<h3 class="index-header">HASTANE RANDEVU SISTEMINE HOSGELDINIZ</h3><br>
				<p>Sn. <?php echo ($_SESSION['user']) ?></p>
			</center>
		</div>
	</div>

	<div class="index-main">
		<button onclick="new_appointment('<?php echo ($_SESSION['user']) ?>')" class="app_btn app_new">RANDEVU AL</button>
		<button class="app_btn app_old">RANDEVULARIM</button>
	</div>

	<div class="index-new-app">
		<div class="new-app-form">
			<form action="">
				<input type="hidden" name="name" value="<?php echo($_SESSION['user']) ?>">
				<select name="doctor" id="new-apt-select">
					<option value="none">Doktor secin</option>
					<option value="">Doktor1</option>
				</select>
				<input type="date" name="date" id="new-apt-date">
				<button id="btn_appt">Randevu olustur</button>
			</form>
		</div>
	</div>

	<div class="exit">
		<a href="login.php?pr=exit">Çıkış yap</a>
	</div>
</body>

</html>
