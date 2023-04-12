<?php
if(!isset($_SESSION))
	session_start();
$connection = new mysqli("localhost", "test", "test", "otomasyon");
if ($connection->connect_errno > 0) {
	die("<b>Bağlantı Hatası:</b> " . $connection->connect_error);
}
$connection->set_charset("utf8");
$_SESSION['con'] = $connection;

?>
