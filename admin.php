<?php
include 'control.php';
if (!isset($_SESSION))
	session_start();
if ($_SESSION['privilege'] != 'admin')
	header('Location:login.php');
get_my_appointments_as_admin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<title>Doktor Paneli</title>
</head>

<body>
	<div class="head">
		<div class="header">
			<center>
				<h3 class="index-header">ADMIN PANELINE HOSGELDINIZ</h3><br>
				<p>Sn. <?php echo ($_SESSION['user']) ?></p>
			</center>
		</div>
	</div>
	<div class="table-main admin-table">
		<div class="table-content">
			<?php
			if (isset($_SESSION['dr_app_count']) && $_SESSION['dr_app_count'] != 0) {
				echo ("<table class='dr_table'>");
				echo ("<tr>");
				echo ("<th>Hasta Adı</th>");
				echo ("<th>Doktor Adı</th>");
				echo ("<th>Poliklinik</th>");
				echo ("<th>Randevu Tarih/Saati</th>");
				echo ("</tr>");
				while ($app = $_SESSION['dr_appointments_arr']->fetch_assoc()) {
					$app_patient = $app["patient_name"];
					$app_doctor = $app["doctor_name"];
					$app_branch = $app["branch"];
					$app_date = $app["date"];
					$app_id = $app["id"];
					echo ("<tr>");
					echo ("<td>$app_patient</td>");
					echo ("<td>$app_doctor</td>");
					echo ("<td>$app_branch</td>");
					echo ("<td>$app_date</td>");
					echo ("<td style='border:none;color:red;padding:10px;cursor:pointer' onclick='del($app_id)' class='cancel_app'>X</td>");
					echo ("</tr>");
				}
			} else {
				echo ("<h3 class='no_app' style='margin-left:34%'>HENÜZ HİÇ RANDEVUNUZ YOK.</h3></i>");
			}
			?>
			</table>
		</div>
	</div>

	<div class="exit">
		<a href="login.php?pr=exit">Çıkış yap</a>
	</div>

	<script>
		function del(id) {
			$.get("control.php?del_app=" + id, function(data, status) {
				alert("Randevu başarıyla iptal edildi.");
				window.location.href = "admin.php";
			});
		}
	</script>
</body>

</html>
