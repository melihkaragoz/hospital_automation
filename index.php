<?php
if (!isset($_SESSION))
	session_start();
if (!$_SESSION["login"])
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
		<h3>HASTANE RANDEVU SISTEMINE HOSGELDINIZ</h3>
	</div>
</div>

</body>

</html>
