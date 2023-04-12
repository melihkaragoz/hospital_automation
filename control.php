<?php
include "connect.php";
$con = $_SESSION['con'];

function check_user_exist($username, $tc, $password)
{
	global $con;
	if ($password)
		$query = mysqli_query($con, "SELECT COUNT(*) as n FROM users WHERE password = '$password' AND tc = '$tc'");
	else
		$query = mysqli_query($con, "SELECT COUNT(*) as n FROM users WHERE name = '$username' AND tc = '$tc'");
	$data = mysqli_fetch_array($query);
	return ($data['n']);
}

function check_doctor_exist($username, $branch)
{
	global $con;
	$query = mysqli_query($con, "SELECT COUNT(*) as n FROM doctors WHERE name = '$username' AND branch = '$branch'");
	$data = mysqli_fetch_array($query);
	return ($data['n']);
}

function check_is_admin($password)
{
	global $con;
	if ($password) {
		$query = mysqli_query($con, "SELECT COUNT(*) as n FROM users WHERE password = '$password' AND name = 'admin'");
		$data = mysqli_fetch_array($query);
		return ($data['n']);
	}
	return (0);
}

function add_user($username, $tc, $password)
{
	global $con;
	$query = mysqli_query($con, "INSERT INTO users (name, tc, password) VALUES('$username', '$tc', '$password')");
	header('Location: login.php?reg=ok');
	return ($con->errno);
}

function add_doctor($username, $password, $branch)
{
	global $con;
	$query = mysqli_query($con, "INSERT INTO doctors (name, password, branch, available) VALUES('$username', '$password', '$branch', '1')");
	header('Location: admin.php?add_dr=ok');
	return ($con->errno);
}
