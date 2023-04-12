<?php
include 'control.php';
if (!isset($_SESSION))
	session_start();
if ($_SESSION['privilege'] != 'doctor')
	header('Location:login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/index.js"></script>
	<title>Doktor Paneli</title>
</head>

<body>
	<center>
		<h2>DOKTOR PANELINE HOSGELDINIZ</h2>
	</center>
	<div class="table-main">
		<div class="table-content">
			<table>
				<tr>
					<th>Hasta Adı</th>
					<th>Poliklinik</th>
					<th>Doktor</th>
					<th>Randevu Tarih/Saati</th>
				</tr>
				<tr>
					<td>Melih Karagöz</td>
					<td>Nöroloji</td>
					<td>Merve Gördağ</td>
					<td>20/04/2023 16:30</td>
				</tr>
				<tr>
					<td>Melih Karagöz</td>
					<td>Nöroloji</td>
					<td>Merve Gördağ</td>
					<td>20/04/2023 16:30</td>
				</tr>				<tr>
					<td>Melih Karagöz</td>
					<td>Nöroloji</td>
					<td>Merve Gördağ</td>
					<td>20/04/2023 16:30</td>
				</tr>				<tr>
					<td>Melih Karagöz</td>
					<td>Nöroloji</td>
					<td>Merve Gördağ</td>
					<td>20/04/2023 16:30</td>
				</tr>
			</table>
		</div>
	</div>
</body>

</html>
