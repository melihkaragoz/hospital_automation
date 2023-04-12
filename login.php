<?php
include 'control.php';
$as = 'user';
if (!isset($_SESSION))
	session_start();
$_SESSION['login'] = 0;
// admin girisi eklenip, doktor kayit sayfasina admin kontrolu yapilacak.
if (isset($_POST)) {
	if (isset($_POST['admin']) && isset($_POST['password'])) {
		if (check_is_admin($_POST['password'])) {
			$_SESSION['login'] = 1;
			$_SESSION['privilege'] = 'admin';
			header('Location:add_doctor.php');
		} else
			echo ("<script>alert('[HATA] sifre yanlis')</script>");
	} else if (isset($_POST['tc']) && isset($_POST['password'])) {
		if (check_user_exist("", $_POST['tc'], $_POST['password'])) {
			$_SESSION['login'] = 1;
			header('Location:index.php');
		} else {
			echo ("<script>alert('[HATA] kullanici adi veya sifre yanlis')</script>");
			if (isset($_GET['reg']))
				$_GET['reg'] = '';
		}
	}
}
if (isset($_GET) && isset($_GET['reg']) && $_GET['reg'] == 'ok')
	echo ("<script>alert('[OK] kullanici basariyla kaydedildi.')</script>");
else if (isset($_GET) && isset($_GET['as']))
	if ($_GET['as'] == 'admin')
		$as = 'admin';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/index.js"></script>
	<title>Giris Yap</title>
</head>

<body>
	<center>
		<h3>HASTANE RANDEVU SISTEMI</h3>
	</center>
	<div class="login-form">
		<center><?php if ($as == 'admin') echo ("ADMIN OLARAK ") ?>GIRIS YAP</center>
		<form action="" method="post">
			<?php
			if ($as != 'admin')
				echo ("<input type='text' name='tc' class='login-item login-tc' placeholder='TC Kimlik No'>");
			?>
			<input type="password" name="password" class="login-item login-passwd" placeholder="Şifre">
			<p class="forgot-pass">sifremi unuttum</p>
			<button name='<?php echo ($as) ?>' class="login-btn">Giriş Yap</button>
		</form>
		<?php
		if ($as == 'admin')
			echo ("<br><a class='as-admin' href='login.php?as=user'>kullanici olarak giris yap</a>");
		else
			echo ("<form action='./register.php' method='post'>
			<button name='register' class='login-btn register-btn'>Kayıt Ol</button>
		</form><a class='as-admin' href='login.php?as=admin'>admin olarak giris yap</a>");
		?>
	</div>
</body>

</html>
