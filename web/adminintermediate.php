<?php
session_name("ticket");
session_start();
require "dbConnect.php";
$db = get_db();

$username = $_POST['username'];
$password = $_POST['password'];
$adminName = getenv('adminName');
$adminPassword = getenv('adminPassword');
echo $username;
echo $adminName;
echo $adminPassword;
if ($username === $adminName && $password === $adminPassword)
{
	header("Location: helpdesk.php");
}
else 
{
	echo'sorry';
}

?>