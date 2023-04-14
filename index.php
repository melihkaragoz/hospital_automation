<?php
if (!isset($_SESSION))
	session_start();
if (!$_SESSION["login"] || ($_SESSION['privilege'] == 'admin'))
	header('Location: login.php');

require 'control.php';
get_doctors();

if (isset($_GET)) {
	if (isset($_GET['new_appt'])) {
		if (isset($_GET['doctor']) && isset($_GET['date'])) {
			if ($_GET['doctor'] != "none" && $_GET['date'] != '')
				new_appointment($_GET['name'], explode("-", $_GET['doctor'])[0], explode("-", $_GET['doctor'])[1], $_GET['date']);
			else alert("lütfen bilgileri eksiksiz doldurduğunuzdan emin olun.");
		} else alert("lütfen bilgileri eksiksiz doldurduğunuzdan emin olun.");
	} else if (isset($_GET['add_ap']) && $_GET['add_ap'] == 'ok') {
		alert("Randevunuz başarıyla oluşturuldu");
	}
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
		<button onclick="get_appointments('<?php get_my_appointments($_SESSION['user']);
											echo ($_SESSION['user']) ?>')" class="app_btn app_old">RANDEVULARIM</button>
	</div>

	<div class="index-new-app">
		<div class="new-app-form">
			<form method="GET">
				<input type="hidden" name="name" value="<?php echo ($_SESSION['user']) ?>">
				<select name="doctor" id="new-apt-select">
					<option value='none'>Doktor secin</option>
					<?php
					while ($user = $_SESSION['doctors_arr']->fetch_assoc()) {
						$dr_name = $user["name"];
						$dr_branch = $user["branch"];
						echo ("<option value='$dr_name-$dr_branch'>$dr_name - $dr_branch</option>");
					}
					?>
				</select>
				<input type="date" name="date" id="new-apt-date">
				<button name="new_appt" value="1" id="btn_appt">Randevu olustur</button>
			</form>
		</div>
	</div>

	<div class="index-my-apps">
		<?php
		if (isset($_SESSION['app_count']) && $_SESSION['app_count'] != 0) {
			echo ("<table>");
			echo ("<tr>");
			echo ("<th>Poliklinik</th>");
			echo ("<th>Doktor</th>");
			echo ("<th>Randevu Tarih/Saati</th>");
			echo ("<th class='no_border'></th>");
			echo ("</tr>");
			while ($app = $_SESSION['appointments_arr']->fetch_assoc()) {
				$app_branch = $app["doctor_name"];
				$app_doctor = $app["branch"];
				$app_date = $app["date"];
				$app_id = $app["id"];
				echo ("<tr>");
				echo ("<td>$app_branch</td>");
				echo ("<td>$app_doctor</td>");
				echo ("<td>$app_date</td>");
				echo ("</tr>");
			}
		} else {
			echo ("<h3 class='no_app'>HENÜZ HİÇ RANDEVUNUZ YOK.</h3></i>");
		}
		?>
		</table>
	</div>

	<div class="back">
		<button onclick="go_back();"><i class="fa-solid fa-chevron-down"></i>GERİ DÖN</button>
	</div>

	<div class="exit">
		<a href="login.php?pr=exit">Çıkış yap</a>
	</div>
</body>

</html>
