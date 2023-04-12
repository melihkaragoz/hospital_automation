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

function get_name($tc, $password)
{
	global $con;
	$query = mysqli_query($con, "SELECT name as n FROM users WHERE tc = '$tc' AND password = '$password'");
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

function check_is_doctor($username, $password)
{
	global $con;
	if ($username && $password) {
		$query = mysqli_query($con, "SELECT COUNT(*) as n FROM doctors WHERE password = '$password' AND name = '$username'");
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

function new_appointment($patient, $branch, $doctor, $date)
{
	global $con;
	$query = mysqli_query($con, "INSERT INTO appointments (patient_name, doctor_name, branch, date) VALUES('$patient', '$doctor', '$branch', '$date')");
	header('Location: index.php?add_ap=ok');
	return ($con->errno);
}
